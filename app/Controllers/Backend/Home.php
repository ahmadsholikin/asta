<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public $path_view	= 'backend/dashboard/';
    public $theme       = "theme/template";

    public function index()
    {
        $data['path']       = $this->path_view;
        $data['preload']    = null;
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
}