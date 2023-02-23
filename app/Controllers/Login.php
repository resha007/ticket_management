<?php

namespace App\Controllers;

use App\Models\LineModel;
use CodeIgniter\Controller;

class Login extends Controller
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

    function login(){
        
    }

    

	
}
