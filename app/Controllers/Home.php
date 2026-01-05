<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function landing(): string
    {
        return view('landing/index');
    }

    public function pengembangan(): string
    {
        return view('landing/pengembangan');
    }

    public function psb(): string
    {
        return view('landing/psb');
    }
}
