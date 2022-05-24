<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use CodeIgniter\Controller;

class Payment extends Controller
{

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $PaymentModel = new PaymentModel();

        $data['user_data'] = $PaymentModel->orderBy('id', 'DESC')->paginate(10);

        $data['pagination_link'] = $PaymentModel->pager;

        return view('payments', $data);
    }

    function get()
    {
        $PaymentModel = new PaymentModel();

        $customer_id = $this->session->get('id'); ;

        //$data = $CustomerModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $PaymentModel->get_data($customer_id);

        // //set numbers to names
        // for ($i = 0; $i < sizeof($data); $i++) {
        //     if ($data[$i]["gender"] == 1) {
        //         $data[$i]["gender"] = "Male";
        //     } else {
        //         $data[$i]["gender"] = "Female"; 
        //     }

        //     if ($data[$i]["status"] == 1) {
        //         $data[$i]["status"] = "Active";
        //     } else if ($data[$i]["status"] == 2) {
        //         $data[$i]["status"] = "Inactive";
        //     }
        // }


        echo json_encode($data);
    }


    //$data = $PaymentModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);

    //set numbers to names
    //for($i=0;$i<sizeof($data);$i++){
    //     if($data[$i]["gender"] == 1){
    //         $data[$i]["gender"] = "Male";
    //     }else{
    //         $data[$i]["gender"] = "Female";
    //     }

    //     if($data[$i]["type"] == 1){
    //         $data[$i]["type"] = "Employee";
    //     }else if($data[$i]["type"] == 2){
    //         $data[$i]["type"] = "Rider";
    //     }

    //     if($data[$i]["status"] == 1){
    //         $data[$i]["status"] = "Active";
    //     }else if($data[$i]["status"] == 2){
    //         $data[$i]["status"] = "Inactive";
    //     }
    // }




    // function getline(){
    //     $data['line'] = $this->PaymentModel->get_category()->result();
    //     $this->load->view('payments', $data);
    // }


    function save()
    {
        helper(['form', 'url']);

        $model = new PaymentModel();
        

        // $paid_amount = $this->request->getPost('pamount');
        // echo "Imal";
        // $paid_date = $this->request->getVar('pdate');
        // $type = $this->request->getVar('ptype');
        $count = $this->request->getVar('count');
        //echo "";
        $save_data = "";
        for ($i = 0; $i < $count; $i++) {
            # code...
            //echo $count+$i;
            $data = [
                'paid_amount' =>    $this->request->getVar("pamount".$i),
                'paid_date'   =>    $this->request->getVar("pdate".$i),
                'type'        =>    $this->request->getVar("ptype".$i),
                'loan_id'     =>    $this->request->getVar("ploan".$i),
            ];

            // $result = $this->db->insert_batch('payment', $data);
            $save_data = $model->insert_data($data);
            //$save_data = $this->request->getVar("ploan".$i);

        }
        // if ($save_data != false) {
        //     //$data = $model->where('id', $save_data)->first();
        //     echo json_encode(array("status" => true, 'data' => $data));
        // } else {
        //     echo json_encode(array("status" => false, 'data' => $data));
        // }
        echo json_encode($save_data);


        // $data = [
        //     'paid_amount'    =>    $this->request->getPost('pamount'),
        //     'paid_date'        =>    $this->request->getVar('pdate'),
        //     'type'        =>    $this->request->getVar('ptype'),
        //     // 'last_name'	=>	$this->request->getVar('rider_id'),
        //     // 'loan_amount'	    =>	$this->request->getVar('paid_amount'),
        //     // 'nic'        =>	$this->request->getVar('nic'),
        //     // 'gender'	=>	$this->request->getVar('gender'),
        //     // 'contact_no'	    =>	$this->request->getVar('contact_no'),
        //     // 'email'        =>	$this->request->getVar('email'),
        //     // 'username'	=>	$this->request->getVar('username'),
        //     // 'type'	    =>	$this->request->getVar('type'),
        //     // 'status'        =>	$this->request->getVar('status')
        // ];



        // $save_data = $model->insert_data($main_arr);
        // echo ($main_arr);

        // if ($save_data != false) {
        //     //$data = $model->where('id', $save_data)->first();
        //     echo json_encode(array("status" => true, 'data' => $data));
        // } else {
        //     echo json_encode(array("status" => false, 'data' => $data));
        // }
        //echo json_encode($count);
    }

    function by_id()
    {
        helper(['form', 'url']);

        $model = new PaymentModel();

        $id = $this->request->getPost('id');

        $result = $model->get_data_by_id($id);

        if ($result != false) {
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true, 'data' => $result));
        } else {
            echo json_encode(array("status" => false, 'data' => $result));
        }
    }
}
