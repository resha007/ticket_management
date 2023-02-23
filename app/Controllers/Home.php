<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if($this->session->get('logged_in')){
            return view('home');
        }else{
            return view('login');
        }
        
    }
}
