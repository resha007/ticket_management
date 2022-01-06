<?php

namespace App\Controllers;

use App\Models\LineModel;
use CodeIgniter\Controller;

class Line extends Controller
{

    public function index()
    {
        return view('line');
    }

    function get(){ 
        $LineModel = new LineModel();

		//$data = $LineModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $LineModel->get_data();

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
        
        $model = new LineModel();
        
        $data = [
            'code'	=>	$this->request->getPost('code'),
            'name'	    =>	$this->request->getPost('name'),
            'rider_id'        =>	$this->request->getPost('rider'),
            'opt_rider_id'	=>	$this->request->getVar('opt_rider'),
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
        
        $model = new LineModel();

        $id = $this->request->getPost('id');
        
        $data = [
            'code'	=>	$this->request->getPost('code'),
            'name'	    =>	$this->request->getPost('name'),
            'rider_id'        =>	$this->request->getPost('rider'),
            'opt_rider_id'	=>	$this->request->getVar('opt_rider'),
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
        
        $model = new LineModel();

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
        
        $model = new LineModel();

        $id = $this->request->getPost('id');

        $result = $model->get_data_by_id($id);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $result));
        }else{
            echo json_encode(array("status" => false , 'data' => $result));
        }
        
    }

	
}
