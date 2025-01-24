<?php

namespace App\Controllers;

class Agenda extends BaseController
{
    public $path_view	= 'agenda/';
    public $theme       = "theme/template";

    public function index(): string
    {
        $data['preload']    = view($this->path_view . 'page-preload');
        $param['page']      = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
}