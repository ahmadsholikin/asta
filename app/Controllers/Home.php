<?php

namespace App\Controllers;

class Home extends BaseController
{
    public $path_view	= 'dashboard/';
    public $theme       = "theme/template";

    public function index(): string
    {
        $data['preload']    = null;
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
}