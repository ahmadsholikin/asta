<?php

namespace App\Controllers\Backend\Aktivitas;
use App\Controllers\BaseController;

use App\Models\Perjalanan_Dinas\PerjalananDinasAgendaModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasKategoriModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasOrangModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasLokasiModel;
use App\Models\PelakuUsahaModel;
use App\Models\KecamatanModel;

use \Hermawan\DataTables\DataTable;
use PhpOffice\PhpWord\TemplateProcessor;
use phpoffice\PhpWord\Settings;
use phpoffice\phpword\IOFactory;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class Perjalanan_Dinas extends BaseController
{
    public $path_view	= 'backend/aktivitas/perjalanan_dinas/';
    public $theme       = "theme/template";

    public function __construct()
    {
        $this->PerjalananDinasAgendaModel   = new PerjalananDinasAgendaModel();
        $this->PerjalananDinasKategoriModel = new PerjalananDinasKategoriModel(); 
        $this->PerjalananDinasOrangModel    = new PerjalananDinasOrangModel();
        $this->KecamatanModel               = new KecamatanModel();
        $this->PerjalananDinasLokasiModel   = new PerjalananDinasLokasiModel();
        $this->PelakuUsahaModel             = new PelakuUsahaModel();
    }

    public function index()
    {
        $data['path']       = $this->path_view;
        $data['preload']    = view($this->path_view . 'page-preload');
        $data['kategori']   = $this->PerjalananDinasKategoriModel->tampilkanSemua();
        $data['kecataman']  = $this->KecamatanModel->tampilkanSemua();
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function data()
    {
        $db         = db_connect();
        $builder    = $db->table("perjalanan_dinas_agenda")
                        ->select("perjalanan_dinas_agenda.*,kegiatan,progress,perjalanan_dinas_kategori.nama as kategori_nama")
                        ->join('perjalanan_dinas_kategori', 'perjalanan_dinas_kategori.id = perjalanan_dinas_agenda.kategori_id')
                        ->where('perjalanan_dinas_agenda.deleted_at',NULL)
                        ->orderBy("perjalanan_dinas_agenda.tanggal_berangkat","DESC");
        return DataTable::of($builder)
                        ->add('action', function($row){
                            return '<div class="dropdown">
                                        <button type="button" class="btn btn-sm p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" style="min-height:0px !important" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i> Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                            <a onclick="setIdReferensiAgenda(\''.$row->id.'\');setTanggal(\''.tanggal_siasn($row->tanggal_berangkat).'\');clearLokasi()" data-bs-toggle="modal" data-bs-target="#lokasiModal" class="dropdown-item" href="javascript:void(0);">
                                                <i class="fi fi-rr-marker me-1"></i> Lokasi
                                            </a>
                                            <a onclick="setIdReferensiAgenda(\''.$row->id.'\')" data-bs-toggle="modal" data-bs-target="#orangModal" class="dropdown-item" href="javascript:void(0);">
                                                <i class="fi fi-rr-user-add me-1"></i> Orang
                                            </a>
                                            <div class="divider"><hr class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="'.base_url('aktivitas/perjalanan-dinas/unduh-sppd?id='.$row->id).'">
                                                <i class="fi fi-rr-file-pdf me-1"></i> Unduh WORD SPT dan SPPD
                                            </a>
                                            <div class="divider"><hr class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="'.base_url('aktivitas/perjalanan-dinas/unduh-spt-pdf?id='.$row->id).'">
                                                <i class="fi fi-rr-file-pdf me-1"></i> Unduh PDF SPT
                                            </a>
                                            <a class="dropdown-item" href="'.base_url('aktivitas/perjalanan-dinas/unduh-sppd-pdf?id='.$row->id).'">
                                                <i class="fi fi-rr-file-pdf me-1"></i> Unduh PDF SPPD
                                            </a>
                                            <div class="divider"><hr class="dropdown-divider"></div>
                                            <a onclick="edit(\''.$row->id.'\')" data-bs-toggle="modal" data-bs-target="#tambahModal" class="dropdown-item" href="javascript:void(0);">
                                                <i class="fi fi-rr-edit me-1"></i> Edit
                                            </a>
                                            <a onclick="hapus(\''.$row->id.'\')" class="dropdown-item" href="javascript:void(0);">
                                                <i class="fi fi-rr-trash me-1"></i> Hapus
                                            </a>
                                        </div>
                                    </div>';
                        })
                        ->add('tujuan', function($row){
                            $lokasi  = $this->PerjalananDinasLokasiModel->where("referensi_agenda",$row->id)->findAll();
                            $list   = "";
                            foreach($lokasi as $key):
                                $list.=$key['lokasi']." dan ";
                            endforeach;
                            
                            $output = rtrim($list," dan ");
                            if($row->kategori_id=='DD-PM'){
                                return $row->kegiatan." ".$output;
                            }
                            else {
                                return $row->kegiatan;
                            }
                        })
                        ->add('tanggal', function($row){
                            if($row->tanggal_berangkat==$row->tanggal_pulang)
                            {
                                return '<i class=\'fi fi-rr-calendar me-1\'></i> '.tanggal_indo($row->tanggal_berangkat);
                            }
                            else
                            {
                                return '<i class=\'fi fi-rr-play me-1\'></i> '.tanggal_indo($row->tanggal_berangkat).'<br><i class=\'fi fi-rr-stop\'></i> '.tanggal_indo($row->tanggal_pulang);
                            }
                        })
                        ->add('orang', function($row){
                            $orang  = $this->PerjalananDinasOrangModel->where("referensi_agenda",$row->id)->findAll();
                            $list   = "";
                            foreach($orang as $key):
                                $list.='<li><a onclick="setIdReferensiAgendaDanPersonId(\''.$key['referensi_agenda'].'\',\''.$key['id'].'\')" data-bs-toggle="modal" data-bs-target="#orangModal" class="dropdown-item" href="javascript:void(0);">'.$key['nama'].'</a></li>';
                            endforeach;
                            
                            if(count($orang)>=1)
                            {
                                $var    = "<div class='dropdwon'>
                                                <button type='button' class='btn btn-sm p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown' style='min-height:0px !important' aria-expanded='false'>
                                                    <i class='bx bx-dots-vertical-rounded'></i> ".count($orang)." Orang
                                                </button>
                                                <ul class='dropdown-menu'>".$list."</ul>
                                            </div>";
                                return $var;
                            } else { 
                                return "Belum Ada";
                            }
                        })
                        ->add('lokasi', function($row){
                            $lokasi  = $this->PerjalananDinasLokasiModel->where("referensi_agenda",$row->id)->findAll();
                            $list   = "";
                            foreach($lokasi as $key):
                                $list.='<li><a onclick="setIdReferensiAgendaDanLokasiId(\''.$key['referensi_agenda'].'\',\''.$key['id'].'\')" data-bs-toggle="modal" data-bs-target="#lokasiModal" class="dropdown-item" href="javascript:void(0);">'.$key['lokasi'].'</a></li>';
                            endforeach;
                            if(count($lokasi)>=1)
                            {
                                $var    = "<div class='dropdwon'>
                                                <button type='button' class='btn btn-sm p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown' style='min-height:0px !important' aria-expanded='false'>
                                                    <i class='bx bx-dots-vertical-rounded'></i> ".count($lokasi)." Lokasi
                                                </button>
                                                <ul class='dropdown-menu'>".$list."</ul>
                                            </div>";
                                return $var;
                            } else { 
                                return "Belum Ada";
                            }
                        })
                        ->addNumbering('no')
                        ->toJson(true);
    }

    public function simpan()
    {
        $pptk       = $this->request->getPost("pptk_id");
        $pptk       = explode(" - ",$pptk);
        $data_pptk  = $this->_dataASN($pptk[0]);

        $param['id']    = null;
        if(!empty($this->request->getPost("id")))
        {
            $param['id']    = $this->request->getPost("id");
        }

        $param["kategori_id"]       = $this->request->getPost("kategori_id");
        $param["tanggal_berangkat"] = tanggal_Ymd($this->request->getPost("tanggal_berangkat"));
        $param["tanggal_pulang"]    = tanggal_Ymd($this->request->getPost("tanggal_pulang"));
        $param["tanggal_surat"]     = tanggal_Ymd($this->request->getPost("tanggal_surat"));
        $param["nomor_surat"]       = $this->request->getPost("nomor_surat");
        $param["kegiatan"]          = $this->request->getPost("kegiatan");
        $param["pptk_id"]           = $pptk[0];
        $param["pptk_nama"]         = "";
        $param["pptk_jabatan"]      = "";
        $param["pptk_gol"]          = "";
        $param["pptk_pangkat"]      = "";
        
        if(!empty($data_pptk))
        {
            $param["pptk_nama"]         = $this->_nama_gelar($data_pptk['gelar_depan'],$data_pptk['nama'],$data_pptk['gelar_belakang']);
            $param["pptk_jabatan"]      = $data_pptk['jabatan_nm'];
            $param["pptk_gol"]          = $data_pptk['gol'];
            $param["pptk_pangkat"]      = $data_pptk['pangkat'];
        }
        
        $param["progress"]         = "BELUM";
        $eksekusi = $this->PerjalananDinasAgendaModel->simpan($param);
        return redirect()->route('aktivitas/perjalanan-dinas');
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            //post data
            $id      = $this->request->getPost('id');
            //send to database
            echo $this->PerjalananDinasAgendaModel->hapus($id);
        } else { 
            echo '0';
        }
    }

    public function ambilData()
    {
        if ($this->request->isAJAX()) {
            $id     = $this->request->getPost('id');
            $data   = $this->PerjalananDinasAgendaModel->tampilkanBerdasarkanId($id);
            echo json_encode($data,true);
        } else { 
            echo 'Akses Ditolak';
        }
    }
    
    public function ambilDataOrang()
    {
        if ($this->request->isAJAX()) {
            $id     = $this->request->getPost('id');
            $data   = $this->PerjalananDinasOrangModel->tampilkanBerdasarkanId($id);
            echo json_encode($data,true);
        } else { 
            echo 'Akses Ditolak';
        }
    }

    public function infoASN()
    {
        $nip    = $this->request->getGet('id');
        $data   = $this->_dataASN($nip);
        $data['nama_gelar'] = $this->_nama_gelar($data['gelar_depan'],$data['nama'],$data['gelar_belakang']);
        $data   = json_encode($data,true);
        return $data;
    }

    public function tambahOrang()
    {
        if ($this->request->isAJAX()) {
            $param['id']               = null;          
            $param["nip"]              = $this->request->getPost("nip");
            $param["nama"]             = $this->request->getPost("nama");
            $param["nama_gelar"]       = $this->request->getPost("nama_gelar");
            $param["pangkat"]          = $this->request->getPost("pangkat");
            $param["golru"]            = $this->request->getPost("golru");
            $param["opd"]              = $this->request->getPost("opd");
            $param["eselon"]           = $this->request->getPost("eselon");
            $param["jabatan"]          = $this->request->getPost("jabatan");
            $param["tingkat"]          = $this->request->getPost("tingkat");
            $param["referensi_agenda"] = $this->request->getPost("referensi_agenda");
            $param["bank"]             = $this->request->getPost("bank");
            $param["rekening"]         = $this->request->getPost("rekening");
            
            $exist = $this->PerjalananDinasOrangModel
                    ->where("referensi_agenda",$this->request->getPost("referensi_agenda"))
                    ->where("nip",$this->request->getPost("nip"))
                    ->findAll();
                    
            if(!empty($exist))
            {
                $param['id'] = $exist[0]['id'];
            }
            elseif(!empty($this->request->getPost("personId")))
            {
                $param['id'] = $this->request->getPost("personId");
            }
            
            $this->PerjalananDinasOrangModel->simpan($param);
            
        }
        else {
            echo "illegal Access :P";
        }
    }
    
    
    public function hapusOrang()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            echo $this->PerjalananDinasOrangModel->hapus($id);
        }
        else {
            echo "illegal Access :P";
        }
    }

    private function _dataASN($nip)
    {
        $url        = "https://sipgan.magelangkab.go.id/sipgan/api/restpns/id?nip=".$nip."&TOKEN=378dea469fcaeab303d2f0ec9d1c2898989oi";
        $client     = \Config\Services::curlrequest();
        $response   = $client->request('GET', $url);
        
        if($response->getStatusCode()==200)
        {
            $result = $response->getBody();
            $res    = json_decode($result);
            if(!empty($res))
            {
                if($res->status==true)
                {
                    $data = (array)$res->data[0];
                    return $data;
                }
            }
        }
        else
        {
            return null;
        }
    }

    private function _nama_gelar($depan, $nama, $belakang)
    {
        $depan      = trim($depan);
        $belakang   = trim($belakang);

        if (($depan <> '') || (!empty($depan))) {
            $depan = $depan . '. ';
        }

        if (($belakang <> '') || (!empty($belakang))) {
            $belakang = ', ' . $belakang;
        }

        return $depan . $nama . $belakang;
    }
    
    
    public function tambahLokasi()
    {
        if ($this->request->isAJAX()) {
            $param['id']               = null;
            $param["referensi_agenda"] = $this->request->getPost("referensi_agenda");
            $param["lokasi"]           = $this->request->getPost("lokasi");
            $param["kbli"]             = $this->request->getPost("kbli");
            $param["risiko"]           = $this->request->getPost("risiko");
            $param["deskripsi_kbli"]   = $this->request->getPost("deskripsi_kbli");
            $param["sektor_usaha"]     = $this->request->getPost("sektor_usaha");
            $param["alamat"]           = $this->request->getPost("alamat");
            $param["wilayah"]          = $this->request->getPost("wilayah");
            $param["longitude"]        = $this->request->getPost("longitude");
            $param["latitude"]         = $this->request->getPost("latitude");
            $param["id_proyek"]        = $this->request->getPost("id_proyek");
            $param["tanggal"]          = tanggal_Ymd($this->request->getPost("tanggal"));
            
            $exist = $this->PerjalananDinasLokasiModel
                    ->where("referensi_agenda",$this->request->getPost("referensi_agenda"))
                    ->where("id_proyek",$this->request->getPost("id_proyek"))
                    ->findAll();
                    
            if(!empty($exist))
            {
                $param['id'] = $exist[0]['id'];
            }
            elseif(!empty($this->request->getPost("id_lokasi")))
            {
                $param['id'] = $this->request->getPost("id_lokasi");
            }
            
            $this->PerjalananDinasLokasiModel->simpan($param);
        }
        else {
            echo "illegal Access :P";
        }
    }
    
    public function ambilDataLokasi()
    {
        if ($this->request->isAJAX()) {
            $id     = $this->request->getPost('id');
            $data   = $this->PerjalananDinasLokasiModel->tampilkanBerdasarkanId($id);
            echo json_encode($data,true);
        } else { 
            echo 'Akses Ditolak';
        }
    }
    
    public function detailPerusahaan()
    {
        if ($this->request->isAJAX()) {
            $id     = $this->request->getGet('id');
            $data   = $this->PelakuUsahaModel->tampilkanBerdasarkanId($id);
            echo json_encode($data,true);
        } else { 
            echo 'Akses Ditolak';
        }
    }
    
    public function unduhSppd()
    {
        $filename = "SPPD-".date('Y-m-d-His');
        $templateProcessor = new TemplateProcessor(FCPATH."template/temp_sppd.docx");
        
        $id = $this->request->getGet('id');
        //orang yang melaksanakan
        $pengikut      = $this->PerjalananDinasOrangModel->where('referensi_agenda',$id)->get()->getResultArray();
        $data_pengikut = array();
        $i             = 1;
        foreach($pengikut as $row)
        {
            $dump               = array();
            $dump['id']         = $i;
            $dump['nama']       = $row['nama_gelar'];
            $dump['nip']        = substr($row['nip'],0,1)>=2?'':$row['nip'];
            $dump['pangkat']    = $row['pangkat'];
            $dump['golru']      = $row['golru'];
            $dump['jabatan']    = $row['jabatan'];
            $dump['opd']        = $row['opd'];
            $dump['eselon']     = $row['eselon'];
            $dump['tingkat']    = $row['tingkat'];
            array_push($data_pengikut, $dump);
            $i++;
        }
        
        //lokasi
        $lokasi         = $this->PerjalananDinasLokasiModel->where('referensi_agenda',$id)->get()->getResultArray();
        $data_lokasi    = array();
        $j              = 1;
        foreach ($lokasi as $row)
        {
            $dump               = array();
            $dump['id']         = $i;
            $dump['lokasi']     = $row['lokasi'];
            $dump['wilayah']    = $row['wilayah'];
            $dump['alamat']     = $row['alamat'];
            $dump['tanggal']    = $row['tanggal'];
            array_push($data_lokasi, $dump);
            $i++;
        }
        
        $tujuan    = "";
        $tujuan_1  = "";
        $tujuan_2  = "";
        $tujuan_3  = "";
        $tanggal_1 = "";
        $tanggal_2 = "";
        $tanggal_3 = "";
        
        if(!empty($data_lokasi))
        {
            if(count($data_lokasi)==1)
            {
                $tujuan     = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                $tujuan_1   = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                //tanggal
                $tanggal_1  = tanggal_indo($data_lokasi[0]['tanggal']);
            }
            else if(count($data_lokasi)==2)
            {
                $tujuan     = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].") dan ".$data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].")";
                $tujuan_1   = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                $tujuan_2   = $data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].")";
                //tanggal
                $tanggal_1  = tanggal_indo($data_lokasi[0]['tanggal']);
                $tanggal_2  = tanggal_indo($data_lokasi[1]['tanggal']);
            }
            else
            {
                $tujuan     = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].") dan ".$data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].") dan ".$data_lokasi[2]['lokasi']." (Kec. ".$data_lokasi[2]['wilayah'].")";
                $tujuan_1   = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                $tujuan_2   = $data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].")";
                $tujuan_3   = $data_lokasi[2]['lokasi']." (Kec. ".$data_lokasi[2]['wilayah'].")";
                //tanggal
                $tanggal_1  = tanggal_indo($data_lokasi[0]['tanggal']);
                $tanggal_2  = tanggal_indo($data_lokasi[1]['tanggal']);
                $tanggal_3  = tanggal_indo($data_lokasi[2]['tanggal']);
            }
        }
        
        //agenda
        $agenda            = $this->PerjalananDinasAgendaModel->where('id',$id)->get()->getResultArray();
        $tanggal_berangkat = tanggal_indo($agenda[0]['tanggal_berangkat']);
        $tanggal_pulang    = tanggal_indo($agenda[0]['tanggal_pulang']);
        $tanggal_surat     = tanggal_indo($agenda[0]['tanggal_surat']);
        $nomor_surat       = $agenda[0]['nomor_surat'];
        
        $date1    = $agenda[0]['tanggal_berangkat'];
        $date2    = $agenda[0]['tanggal_pulang'];
        $diff     = abs(strtotime($date2) - strtotime($date1));
        $years    = floor($diff / (365*60*60*24));
        $months   = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days     = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $days    += 1;
        $penyebut = penyebut($days);
        
        //tanggal
        $tanggal = "";
        if($date1<>$date2)
        {
            $tanggal = $tanggal_berangkat. " sampai ".$tanggal_pulang;
            $hari    = hari($tanggal_berangkat). " sampai ".hari($tanggal_pulang);
        }
        else
        {
            $tanggal    = $tanggal_berangkat;
            $hari       = hari($tanggal_berangkat);
        }
        //info agenda
        $templateProcessor->setValue('tanggal',$tanggal);
        $templateProcessor->setValue('hari',$hari);
        $templateProcessor->setValue('tanggal_naskah',$tanggal_surat);
        $templateProcessor->setValue('nomor_naskah',$nomor_surat);
        $templateProcessor->setValue('tanggal_berangkat',$tanggal_berangkat);
        $templateProcessor->setValue('tanggal_pulang',$tanggal_pulang);
        $templateProcessor->setValue('kegiatan',$agenda[0]['kegiatan']);
        $templateProcessor->setValue('jumlah_hari', $days);
        $templateProcessor->setValue('penyebut', $penyebut);
        $templateProcessor->setValue('bulan_tahun',tanggal_indo($agenda[0]['tanggal_surat']));
        //tujuan dan tanggal tujuan
        $templateProcessor->setValue('tujuan_1', $tujuan_1);
        $templateProcessor->setValue('tujuan_2', $tujuan_2);
        $templateProcessor->setValue('tujuan_3', $tujuan_3);
        $templateProcessor->setValue('tanggal_1', $tanggal_1);
        $templateProcessor->setValue('tanggal_2', $tanggal_2);
        $templateProcessor->setValue('tanggal_3', $tanggal_3);
        //PPTK
        $templateProcessor->setValue('pptk_id',$agenda[0]['pptk_id']);
        $templateProcessor->setValue('pptk_nama',$agenda[0]['pptk_nama']);
        $templateProcessor->setValue('pptk_jabatan',$agenda[0]['pptk_jabatan']);
        $templateProcessor->setValue('pptk_gol',$agenda[0]['pptk_gol']);
        $templateProcessor->setValue('pptk_pangkat',$agenda[0]['pptk_pangkat']);

        $templateProcessor->cloneBlock('loop', 0, true, false, $data_pengikut);
        $templateProcessor->cloneRowAndSetValues('id', $data_pengikut);
        $templateProcessor->setValue("tujuan",$tujuan);
        
        header("Content-Description: File Transfer");
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        header("Content-Disposition: attachment; filename=".$filename.".docx");
        $templateProcessor->saveAs('php://output');
    }
    
    //pdf
    public function unduhSptPdf()
    {
        $id         = $this->request->getGet('id');
        //data
        //orang yang melaksanakan
        $pengikut      = $this->PerjalananDinasOrangModel->where('referensi_agenda',$id)->get()->getResultArray();
        $data_pengikut = array();
        $i             = 1;
        foreach($pengikut as $row)
        {
            $dump               = array();
            $dump['id']         = $i;
            $dump['nama']       = $row['nama'];
            $dump['nama_gelar'] = $row['nama_gelar'];
            $dump['nip']        = substr($row['nip'],0,1)>=2?'':$row['nip'];
            $dump['pangkat']    = $row['pangkat'];
            $dump['golru']      = $row['golru'];
            $dump['jabatan']    = $row['jabatan'];
            $dump['opd']        = $row['opd'];
            $dump['eselon']     = $row['eselon'];
            $dump['tingkat']    = $row['tingkat'];
            array_push($data_pengikut, $dump);
            $i++;
        }
        
        //lokasi
        $lokasi      = $this->PerjalananDinasLokasiModel->where('referensi_agenda',$id)->get()->getResultArray();
        //hari tanggal
        //agenda
        $agenda            = $this->PerjalananDinasAgendaModel->where('id',$id)->get()->getResultArray();
        $tanggal_berangkat = tanggal_indo($agenda[0]['tanggal_berangkat']);
        $tanggal_pulang    = tanggal_indo($agenda[0]['tanggal_pulang']);
        
        $tujuan  = $agenda[0]['kegiatan'];
        $date1   = $agenda[0]['tanggal_berangkat'];
        $date2   = $agenda[0]['tanggal_pulang'];
        $tanggal = "";
        $hari    = "";
        
        if($date1<>$date2)
        {
            $tanggal = $tanggal_berangkat. " sampai ".$tanggal_pulang;
            $hari    = hari($tanggal_berangkat). " sampai ".hari($tanggal_pulang);
        }
        else
        {
            $tanggal    = $tanggal_berangkat;
            $hari       = hari($tanggal_berangkat);
        }
        
        //end of data
        $filename   = "SPT-DD-".$id."-".date('Y-m-d-His');
        
        $parser['pengikut'] = $data_pengikut;
        $parser['hari']     = $hari;
        $parser['tujuan']   = $tujuan;
        $parser['lokasi']   = $lokasi;
        $parser['tanggal']  = $tanggal;
        $view               = view($this->path_view . 'pdf-spt',$parser);
        //proses generate pdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($view);
        $dompdf->setPaper('folio', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename.'.pdf');
        //file_put_contents($direktori.$filename, $dompdf->output());
    }
    
    public function unduhSppdpdf()
    {
        $id         = $this->request->getGet('id');
        //data
        //orang yang melaksanakan
        $pengikut      = $this->PerjalananDinasOrangModel->where('referensi_agenda',$id)->get()->getResultArray();
        $data_pengikut = array();
        $i             = 1;
        foreach($pengikut as $row)
        {
            $dump               = array();
            $dump['id']         = $i;
            $dump['nama']       = $row['nama'];
            $dump['nama_gelar'] = $row['nama_gelar'];
            $dump['nip']        = substr($row['nip'],0,1)>=2?'':$row['nip'];
            $dump['pangkat']    = $row['pangkat'];
            $dump['golru']      = $row['golru'];
            $dump['jabatan']    = $row['jabatan'];
            $dump['opd']        = $row['opd'];
            $dump['eselon']     = $row['eselon'];
            $dump['tingkat']    = $row['tingkat'];
            array_push($data_pengikut, $dump);
            $i++;
        }
        
        //lokasi
        $lokasi      = $this->PerjalananDinasLokasiModel->where('referensi_agenda',$id)->get()->getResultArray();
        //hari tanggal
        //agenda
        $agenda            = $this->PerjalananDinasAgendaModel->where('id',$id)->get()->getResultArray();
        $tanggal_berangkat = tanggal_indo($agenda[0]['tanggal_berangkat']);
        $tanggal_pulang    = tanggal_indo($agenda[0]['tanggal_pulang']);
        
        $tujuan  = $agenda[0]['kegiatan'];
        $date1   = $agenda[0]['tanggal_berangkat'];
        $date2   = $agenda[0]['tanggal_pulang'];
        $tanggal = "";
        $hari    = "";
        
        if($date1<>$date2)
        {
            $tanggal = $tanggal_berangkat. " sampai ".$tanggal_pulang;
            $hari    = hari($tanggal_berangkat). " sampai ".hari($tanggal_pulang);
        }
        else
        {
            $tanggal    = $tanggal_berangkat;
            $hari       = hari($tanggal_berangkat);
        }
        
        //info detail lokasi
        //lokasi
        $lokasi         = $this->PerjalananDinasLokasiModel->where('referensi_agenda',$id)->get()->getResultArray();
        $data_lokasi    = array();
        $j              = 1;
        foreach ($lokasi as $row)
        {
            $dump               = array();
            $dump['id']         = $i;
            $dump['lokasi']     = $row['lokasi'];
            $dump['wilayah']    = $row['wilayah'];
            $dump['alamat']     = $row['alamat'];
            $dump['tanggal']    = $row['tanggal'];
            array_push($data_lokasi, $dump);
            $i++;
        }
        
        $tujuan    = "";
        $tujuan_1  = "";
        $tujuan_2  = "";
        $tujuan_3  = "";
        $tanggal_1 = "";
        $tanggal_2 = "";
        $tanggal_3 = "";
        
        if(!empty($data_lokasi))
        {
            if(count($data_lokasi)==1)
            {
                $tujuan     = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                $tujuan_1   = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                //tanggal
                $tanggal_1  = tanggal_indo($data_lokasi[0]['tanggal']);
            }
            else if(count($data_lokasi)==2)
            {
                $tujuan     = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].") dan ".$data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].")";
                $tujuan_1   = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                $tujuan_2   = $data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].")";
                //tanggal
                $tanggal_1  = tanggal_indo($data_lokasi[0]['tanggal']);
                $tanggal_2  = tanggal_indo($data_lokasi[1]['tanggal']);
            }
            else
            {
                $tujuan     = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].") dan ".$data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].") dan ".$data_lokasi[2]['lokasi']." (Kec. ".$data_lokasi[2]['wilayah'].")";
                $tujuan_1   = $data_lokasi[0]['lokasi']." (Kec. ".$data_lokasi[0]['wilayah'].")";
                $tujuan_2   = $data_lokasi[1]['lokasi']." (Kec. ".$data_lokasi[1]['wilayah'].")";
                $tujuan_3   = $data_lokasi[2]['lokasi']." (Kec. ".$data_lokasi[2]['wilayah'].")";
                //tanggal
                $tanggal_1  = tanggal_indo($data_lokasi[0]['tanggal']);
                $tanggal_2  = tanggal_indo($data_lokasi[1]['tanggal']);
                $tanggal_3  = tanggal_indo($data_lokasi[2]['tanggal']);
            }
        }
        
        //agenda
        $agenda            = $this->PerjalananDinasAgendaModel->where('id',$id)->get()->getResultArray();
        $tanggal_berangkat = tanggal_indo($agenda[0]['tanggal_berangkat']);
        $tanggal_pulang    = tanggal_indo($agenda[0]['tanggal_pulang']);
        $tanggal_surat     = tanggal_indo($agenda[0]['tanggal_surat']);
        $nomor_surat       = $agenda[0]['nomor_surat'];
        
        $date1    = $agenda[0]['tanggal_berangkat'];
        $date2    = $agenda[0]['tanggal_pulang'];
        $diff     = abs(strtotime($date2) - strtotime($date1));
        $years    = floor($diff / (365*60*60*24));
        $months   = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days     = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $days    += 1;
        $penyebut = penyebut($days);
        
        //tanggal
        $tanggal = "";
        if($date1<>$date2)
        {
            $tanggal = $tanggal_berangkat. " sampai ".$tanggal_pulang;
            $hari    = hari($tanggal_berangkat). " sampai ".hari($tanggal_pulang);
        }
        else
        {
            $tanggal    = $tanggal_berangkat;
            $hari       = hari($tanggal_berangkat);
        }
        //info agenda
        $parser['tanggal']           = $tanggal;
        $parser['hari']              = $hari;
        $parser['tanggal_naskah']    = $tanggal_surat;
        $parser['nomor_naskah']      = $nomor_surat;
        $parser['tanggal_berangkat'] = $tanggal_berangkat;
        $parser['tanggal_pulang']    = $tanggal_pulang;
        $parser['kegiatan']          = $agenda[0]['kegiatan'];
        $parser['jumlah_hari']       = $days;
        $parser['penyebut']          = $penyebut;
        $parser['bulan_tahun']       = tanggal_indo($agenda[0]['tanggal_surat']);
          //tujuan dan tanggal tujuan
        $parser['tujuan_1']  = $tujuan_1;
        $parser['tujuan_2']  = $tujuan_2;
        $parser['tujuan_3']  = $tujuan_3;
        $parser['tanggal_1'] = $tanggal_1;
        $parser['tanggal_2'] = $tanggal_2;
        $parser['tanggal_3'] = $tanggal_3;
        //PPTK
        $parser['pptk_id']      = $agenda[0]['pptk_id'];
        $parser['pptk_nama']    = $agenda[0]['pptk_nama'];
        $parser['pptk_jabatan'] = $agenda[0]['pptk_jabatan'];
        $parser['pptk_gol']     = $agenda[0]['pptk_gol'];
        $parser['pptk_pangkat'] = $agenda[0]['pptk_pangkat'];

        
        //end of data
        $filename   = "SPPD-DD-".$id."-".date('Y-m-d-His');
        
        $parser['pengikut'] = $data_pengikut;
        $parser['hari']     = $hari;
        $parser['tujuan']   = $tujuan;
        $parser['lokasi']   = $lokasi;
        $parser['tanggal']  = $tanggal;
        $view               = view($this->path_view . 'pdf-sppd',$parser);
        //proses generate pdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($view);
        $dompdf->setPaper('folio', 'portrait');
        $dompdf->render();
        $dompdf->stream($filename.'.pdf');
        //file_put_contents($direktori.$filename, $dompdf->output());
    }
}