<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if($this->session->get('logged_in')){
            return view('user');
        }else{
            return view('login');
        }
        
    }

    function get(){ 
        $UserModel = new UserModel();

		//$data = $UserModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $UserModel->get_data();

        //set numbers to names
        for($i=0;$i<sizeof($data);$i++){
            if($data[$i]["gender"] == 1){
                $data[$i]["gender"] = "Male";
            }else{
                $data[$i]["gender"] = "Female";
            }

            // if($data[$i]["type"] == 1){
            //     $data[$i]["type"] = "Employee";
            // }else if($data[$i]["type"] == 2){
            //     $data[$i]["type"] = "Rider";
            // }

            if($data[$i]["status"] == 1){
                $data[$i]["status"] = "Active";
            }else if($data[$i]["status"] == 2){
                $data[$i]["status"] = "Inactive";
            }
        }
        

		echo json_encode($data);
	}

    function get_by_type(){ 
        $UserModel = new UserModel(); 

        $type = $this->request->getPost('type');

        if($type == 1){
            $data = $UserModel->get_data_by_type(1);
        }else if($type == 2){
            $data = $UserModel->get_data_by_type(2);
        }

        //set numbers to names
        for($i=0;$i<sizeof($data);$i++){
            
            if($data[$i]["status"] == 1){
                $data[$i]["status"] = "Active";
            }else if($data[$i]["status"] == 2){
                $data[$i]["status"] = "Inactive";
            }
        }
        

		echo json_encode($data);
	}


	function save(){
        helper(['form', 'url']);
        
        $model = new UserModel();
        
        $data = [
            'first_name'	=>	$this->request->getPost('first_name'),
            'last_name'	    =>	$this->request->getPost('last_name'),
            'dob'	    =>	$this->request->getVar('dob'),
            'nic'        =>	$this->request->getVar('nic'),
            'gender'	=>	$this->request->getVar('gender'),
            'contact_no'	    =>	$this->request->getVar('contact_no'),
            'email'        =>	$this->request->getVar('email'),
            'username'	=>	$this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
            'status'        =>	$this->request->getVar('status')
        ];

        $save_data = $model->insert_data($data);

        if($save_data != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }

    function update(){
        helper(['form', 'url']);
        
        $model = new UserModel();

        $id = $this->request->getPost('id');
        
        $data = [
            'first_name'	=>	$this->request->getPost('first_name'),
            'last_name'	    =>	$this->request->getPost('last_name'),
            'dob'	    =>	$this->request->getVar('dob'),
            'nic'        =>	$this->request->getVar('nic'),
            'gender'	=>	$this->request->getVar('gender'),
            'contact_no'	    =>	$this->request->getVar('contact_no'),
            'email'        =>	$this->request->getVar('email'),
            'username'	=>	$this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
            'status'        =>	$this->request->getVar('status')
        ];

        $result = $model->update_data($id, $data);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
        
    }

    function delete(){
        helper(['form', 'url']);
        
        $model = new UserModel();

        $id = $this->request->getPost('id');
        
        $data = [
            'status'        =>	3
        ];

        $result = $model->delete_data($id, $data);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
        
    }

    function by_id(){
        helper(['form', 'url']);
        
        $model = new UserModel();

        $id = $this->request->getPost('id');

        $result = $model->get_data_by_id($id);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $result));
        }else{
            echo json_encode(array("status" => false , 'data' => $result));
        }
        
    }

    function auth(){
        helper(['form', 'url']);
        $this->session = \Config\Services::session(); 
        
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);

        $result = $model->auth($username);
        
        if(password_verify($this->request->getPost('password'), $result[0]["password"])){
            //$data = $model->where('id', $save_data)->first();
            $newdata = [
                'id'        => $result[0]["id"],
                'username'  => $result[0]["username"],
                'email'     => $result[0]["email"],
                'logged_in' => TRUE
            ];
            //echo json_encode($result[0]['first_name']);
            $this->session->set($newdata); // setting session data

             echo json_encode(array("status" => true));
        }else{
            echo json_encode(array("status" => false));
        }
    }

    function logout(){
        $this->session->destroy();

        echo json_encode(array("status" => true));
    }

	
}
