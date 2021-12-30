<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class Employee extends Controller
{
    

    public function index()
    {
        $EmployeeModel = new EmployeeModel();

		$data['user_data'] = $EmployeeModel->orderBy('id', 'DESC')->paginate(10);

		$data['pagination_link'] = $EmployeeModel->pager;

		return view('employee', $data);
    }

    function get(){ 
        $EmployeeModel = new EmployeeModel();

		$data = $EmployeeModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);

        //set numbers to names
        for($i=0;$i<sizeof($data);$i++){
            if($data[$i]["gender"] == 1){
                $data[$i]["gender"] = "Male";
            }else{
                $data[$i]["gender"] = "Female";
            }

            if($data[$i]["type"] == 1){
                $data[$i]["type"] = "Employee";
            }else if($data[$i]["type"] == 2){
                $data[$i]["type"] = "Rider";
            }

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
        
        $model = new EmployeeModel();
        
        $data = [
            'first_name'	=>	$this->request->getPost('first_name'),
            // 'last_name'	    =>	$this->request->getPost('last_name'),
            // 'address'        =>	$this->request->getPost('address'),
            // 'city'	=>	$this->request->getVar('city'),
            // 'dob'	    =>	$this->request->getVar('dob'),
            // 'nic'        =>	$this->request->getVar('nic'),
            // 'gender'	=>	$this->request->getVar('gender'),
            // 'contact_no'	    =>	$this->request->getVar('contact_no'),
            // 'email'        =>	$this->request->getVar('email'),
            // 'username'	=>	$this->request->getVar('username'),
            // 'type'	    =>	$this->request->getVar('type'),
            // 'status'        =>	$this->request->getVar('status')
        ];

        $save_data = $model->insert_data($data);

        if($save_data != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }

	
}
