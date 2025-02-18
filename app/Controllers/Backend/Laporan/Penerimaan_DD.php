<?php

namespace App\Controllers\Backend\Laporan;
use App\Controllers\BaseController;

use App\Models\Perjalanan_Dinas\PerjalananDinasAgendaModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasKategoriModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasOrangModel;
use App\Models\Perjalanan_Dinas\PerjalananDinasLokasiModel;

use \Hermawan\DataTables\DataTable;

class Penerimaan_DD extends BaseController
{
    public $path_view	= 'backend/laporan/penerimaan_dd/';
    public $theme       = "theme/template";

    public function __construct()
    {
        $this->PerjalananDinasAgendaModel   = new PerjalananDinasAgendaModel();
        $this->PerjalananDinasOrangModel    = new PerjalananDinasOrangModel();
        $this->PerjalananDinasLokasiModel   = new PerjalananDinasLokasiModel();
    }

    public function index()
    {
        $data['path']       = $this->path_view;
        $data['preload']    = null;
        $data['data']       = $this->tampilData();
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
    
    private function tampilData()
    {
        $agenda = $this->PerjalananDinasAgendaModel->where('id IN ("4","5","6")')->get()->getResultArray();
        $data   = array();
        foreach ($agenda as $row)
        {
            $dump               = array();
            $dump['agenda']     = $row;
            $dump['orang']      = $this->PerjalananDinasOrangModel->where('referensi_agenda',$row['id'])->get()->getResultArray();
            $dump['jml_orang']  = count($dump['orang']);
            $dump['lokasi']     = $this->PerjalananDinasLokasiModel->where('referensi_agenda',$row['id'])->get()->getResultArray();
            $dump['jml_lokasi'] = count($dump['lokasi']);
            array_push($data,$dump);
        }
        return $data;
    }
    
}