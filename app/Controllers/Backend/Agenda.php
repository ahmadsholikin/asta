<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\Perjalanan_Dinas\PerjalananDinasAgendaModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasLokasiModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasKategoriModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasOrangModel;
class Agenda extends BaseController
{
    public $path_view	= 'backend/agenda/';
    public $theme       = "theme/template";
    
    public function __construct()
    {
        $this->PerjalananDinasAgendaModel   = new PerjalananDinasAgendaModel();
        $this->PerjalananDinasLokasiModel   = new PerjalananDinasLokasiModel();
        $this->PerjalananDinasKategoriModel = new PerjalananDinasKategoriModel();
        $this->PerjalananDinasOrangModel    = new PerjalananDinasOrangModel();
    }

    public function index()
    {
        $data['path']     = $this->path_view;
        $data_agenda      = $this->PerjalananDinasAgendaModel->orderBy('tanggal_berangkat','DESC')->tampilkanSemua();
        $agenda           = $this->data($data_agenda);
        $reload['agenda'] = $agenda;
        $data['preload']  = view($this->path_view . 'page-preload',$reload);
        $param['page']    = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
    
    
    private function data($agenda)
    {
        $dump   = array();
        $quotes = array('“', '”', '‘', '’', '"', "'");
        foreach($agenda as $row):
            $set['id']                = $row['id'];
            $set['tanggal_berangkat'] = $row['tanggal_berangkat'];
            $set['tanggal_pulang']    = $row['tanggal_pulang'];
            $set['kategori_id']       = $row['kategori_id'];
            $set['kegiatan']          = str_replace($quotes, '', $row['kegiatan']);
            //kategori
            $kategori           = $this->PerjalananDinasKategoriModel->where('id',$row['kategori_id'])->findAll();
            $set['kategori']    = $kategori[0]['nama'];
            //lokasi
            $lokasi  = $this->PerjalananDinasLokasiModel->where("referensi_agenda",$row['id'])->findAll();
            $list    = "";
            foreach($lokasi as $key):
                $list.=$key['lokasi']." dan ";
            endforeach;
            
            $output = rtrim($list," dan ");
            $set['lokasi'] = $output;
            //
            $orang      = $this->PerjalananDinasOrangModel->where("referensi_agenda",$row['id'])->findAll();
            $list_orang = "";
            foreach($orang as $net):
                $list_orang.=$net['nama']."<br>";
            endforeach;
            $set['orang'] = $list_orang;
            
            array_push($dump,$set);
            
        endforeach;
        
        return $dump;
    }
    
    public function listJadwal()
    {
        if ($this->request->isAJAX()) {
            $bulan          = $this->request->getPost('bulan');
            $tahun          = $this->request->getPost('tahun');
            
            if(empty($bulan))
            {
                $bulan = date('m');
            }
            
            if(empty($tahun))
            {
                $tahun = date('Y');
            }
            
            $where  = "MONTH(tanggal_berangkat)='".$bulan."' AND YEAR(tanggal_berangkat)='".$tahun."'";
            $agenda = $this->PerjalananDinasAgendaModel->where($where)->orderBy('tanggal_berangkat','DESC')->tampilkanSemua();
            $data['agenda'] = $this->data($agenda);
            echo view($this->path_view . 'page-list-jadwal',$data);
        } else { 
            echo 'Akses Ditolak';
        }
    }
}