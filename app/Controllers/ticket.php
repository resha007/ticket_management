<?php

namespace App\Controllers;

use App\Models\TicketModel;
use CodeIgniter\Controller;

class Ticket extends Controller
{
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if($this->session->get('logged_in')){
            return view('ticket');
        }else{
            return view('login');
        }
    }

    function get(){ 
        $TicketModel = new TicketModel();

		//$data = $TicketModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $TicketModel->get_data();

        //set numbers to names
        for($i=0;$i<sizeof($data);$i++){
            // if($data[$i]["gender"] == 1){
            //     $data[$i]["gender"] = "Male";
            // }else{
            //     $data[$i]["gender"] = "Female";
            // }

            if($data[$i]["status_id"] == IN){
                $data[$i]["status_id"] = "IN";
            }else if($data[$i]["status_id"] == COMPLETED){
                $data[$i]["status_id"] = "COMPL";
            }else if($data[$i]["status_id"] == RECOMMENDATION){
                $data[$i]["status_id"] = "REC";
            }
        }
        

		echo json_encode($data);
	}

    function serial_check(){ 
        $TicketModel = new TicketModel();
        
        $serial_no = $this->request->getPost('serial_no');

        $data = $TicketModel->serial_check($serial_no);

        if($data != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
	}

    
	function save(){
        helper(['form', 'url']);
        
        $model = new TicketModel();
        
        $data = [
            'serial_no'	        =>	$this->request->getPost('serial_no'),
            'model_id'	        =>	$this->request->getPost('model'),
            'branch_id'         =>	$this->request->getPost('branch'),
            'category_id'	    =>	$this->request->getPost('category'),
            'date_time'	        =>	$this->request->getPost('date_time'),
            'comment'           =>	$this->request->getPost('comment'),
            'status_id'         =>	$this->request->getPost('status')

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
        
        $model = new TicketModel();

        $id = $this->request->getPost('id');
        
        $data = [
            'serial_no'	        =>	$this->request->getPost('serial_no'),
            'model_id'	        =>	$this->request->getPost('model'),
            'branch_id'         =>	$this->request->getPost('branch'),
            'category_id'	    =>	$this->request->getPost('category'),
            'date_time'	        =>	$this->request->getPost('date_time'),
            'comment'           =>	$this->request->getPost('comment'),
            'status_id'         =>	$this->request->getPost('status')
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
        
        $model = new TicketModel();

        $id = $this->request->getPost('id');
        
        $data = [
            'status_id'        =>	4
        ];

        $result = $model->delete_data($id, $data);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data)); //$id
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
        //echo json_encode($id); //$id
    }

    function by_id(){
        helper(['form', 'url']);
        
        $model = new TicketModel();

        $id = $this->request->getPost('id'); 
        
        $result = $model->get_data_by_id($id);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $result));
        }else{
            echo json_encode(array("status" => false , 'data' => $result));
        }
        
    }

    function Ticket_session(){
        helper(['form', 'url']);

        $id = $this->request->getPost('id'); 

        $cust_data = [
            'id'  => $id
        ];

        $this->session->set($cust_data); // setting session data

        echo json_encode(array("status" => true ));
        
    }

	
}
