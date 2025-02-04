<?php

namespace App\Controllers\Backend\Aktivitas;
use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\Perjalanan_Dinas\PerjalananDinasAgendaModel;

class Perjalanan_Dinas extends BaseController
{
    public $path_view	= 'backend/aktivitas/perjalanan_dinas/';
    public $theme       = "theme/template";

    public function __construct()
    {
        $this->perjalananDinas = new PerjalananDinasAgendaModel();
    }

    public function index()
    {
        $data['path']       = $this->path_view;
        $data['preload']    = view($this->path_view . 'page-preload');
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function data()
    {
        $db         = db_connect();
        $builder    = $db->table("perjalanan_dinas_agenda")->where('deleted_at',NULL);
        return DataTable::of($builder)
                        ->add('action', function($row){
                            return '<div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a onclick="edit(\''.$row->id.'\')" data-bs-toggle="modal" data-bs-target="#modalId" class="dropdown-item" href="javascript:void(0);">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a onclick="confirmDelete(\''.$row->id.'\')" class="dropdown-item" href="javascript:void(0);">
                                                <i class="bx bx-trash me-1"></i> Hapus
                                            </a>
                                        </div>
                                    </div>';
                        })
                        // ->format('tanggal_mulai', function ($value) {
                        //     return tanggal_indo($value);
                        // })
                        // ->format('tanggal_selesai', function ($value) {
                        //     return tanggal_indo($value);
                        // })
                        ->addNumbering('no')
                        ->toJson(true);
    }

    public function simpan()
    {
        $param = $this->request->getPost();
        return json_encode($param,true);
    }

    public function hapus()
    {

    }

    public function infoASN()
    {
        $nip        = $this->request->getGet('id');
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
                    $data = json_encode($data,true);
                    return $data;
                }
            }
            //$NAMA_PPTK = $this->nama_gelar($res->data[0]->gelar_depan,$res->data[0]->nama,$res->data[0]->gelar_belakang);
        }
        else
        {
            return null;
        }
    }

    private function nama_gelar($depan, $nama, $belakang)
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
}