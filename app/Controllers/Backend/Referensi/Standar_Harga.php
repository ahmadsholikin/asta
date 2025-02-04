<?php

namespace App\Controllers\Backend\Referensi;
use App\Controllers\BaseController;

class Standar_Harga extends BaseController
{
    public $path_view	= 'backend/referensi/standar_harga/';
    public $theme       = "theme/template";

    public function index()
    {
        $data['path']       = $this->path_view;
        $data['preload']    = null;
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
}