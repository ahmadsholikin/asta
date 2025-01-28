<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;

class Agenda extends BaseController
{
    public $path_view	= 'backend/agenda/';
    public $theme       = "theme/template";

    public function index(): string
    {
        $data['path']       = $this->path_view;
        $data['preload']    = view($this->path_view . 'page-preload');
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
}