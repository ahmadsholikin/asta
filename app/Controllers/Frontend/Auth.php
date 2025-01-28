<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public $path_view	= 'frontend/auth/';

    public function index()
    {
        return view($this->path_view . 'page-login');
    }

    public function registrasi()
    {
        return view($this->path_view . 'page-registrasi');
    }
}