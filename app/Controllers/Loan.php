<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\LoanApproveModel;
use CodeIgniter\Controller;

class Loan extends Controller
{
    function __construct()
    {
        //$this->session = \Config\Services::session();
        //$this->session->start();
    }

    public function index()
    {
        $LoanModel = new LoanModel();


        //get guarntor names from the customer table
        $data['guarantordata'] = $LoanModel->getguarntorlist();


		return view('loan_new', $data);
    }


    function get(){ 
        $LoanModel = new LoanModel();

		//$data = $CustomerModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $LoanModel->get_data();

        //set numbers to names
        for($i=0;$i<sizeof($data);$i++){
            // if($data[$i]["created_by"] == 1){
            //     $data[$i]["created_by"] = "Admin";
            // }else{
            //     $data[$i]["created_by"] = "Rider";
            // }

            if($data[$i]["status"] == 1){
                $data[$i]["status"] = "Pending";
            }else if($data[$i]["status"] == 3){
                $data[$i]["status"] = "Refused";
            }else if($data[$i]["status"] == 4){
                $data[$i]["status"] = "Abandoned";
            }else if($data[$i]["status"] == 5){
                $data[$i]["status"] = "Cleared";
            }else{
                $data[$i]["status"] = "Approved";
            }
        }
        

		echo json_encode($data);
	}

    function get_approved(){ 
        $LoanModel = new LoanModel();

		//$data = $CustomerModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $LoanModel->get_approved();

        //set numbers to names
        for($i=0;$i<sizeof($data);$i++){
            // if($data[$i]["created_by"] == 1){
            //     $data[$i]["created_by"] = "Admin";
            // }else{
            //     $data[$i]["created_by"] = "Rider";
            // }

            if($data[$i]["status"] == 1){
                $data[$i]["status"] = "Pending";
            }else if($data[$i]["status"] == 3){
                $data[$i]["status"] = "Refused";
            }else if($data[$i]["status"] == 4){
                $data[$i]["status"] = "Abandoned";
            }else if($data[$i]["status"] == 5){
                $data[$i]["status"] = "Cleared";
            }else{
                $data[$i]["status"] = "Approved";
            }
        }
        

		echo json_encode($data);
	}

	function save(){
        helper(['form', 'url']);
        
        $model = new LoanModel();
        
        $data = [
            'customer_id'	=>	$this->request->getVar('customer_id'),
            'reason'	    =>	$this->request->getPost('reason'),
            'guarantor_1'   =>	$this->request->getVar('guarantor_1'),
            'guarantor_2'	=>	$this->request->getVar('guarantor_2'),
            'loan_amount'	=>	$this->request->getPost('loan_amount'),
            'loan_period'   =>	$this->request->getVar('loan_period'),
            'loan_interest'	=>	$this->request->getVar('loan_interest'),
            'created_by'    =>	$this->session->get('id'),
            'status'	    =>	'1'
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
        
        $model = new LoanModel();

        $id = $this->request->getPost('id');
        
        $data = [
            'customer_id'	=>	$this->request->getVar('customer_id'),
            'reason'	    =>	$this->request->getPost('reason'),
            'guarantor_1'   =>	$this->request->getVar('guarantor_1'),
            'guarantor_2'	=>	$this->request->getVar('guarantor_2'),
            'loan_amount'	=>	$this->request->getPost('loan_amount'),
            'loan_period'   =>	$this->request->getVar('loan_period'),
            'loan_interest'	=>	$this->request->getVar('loan_interest'),
            //'created_by'    =>	$this->session->get('id'),
            'status'	    =>	'1'
        ];

        $result = $model->update_data($id, $data);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
        //echo json_encode("tttttt");
    }

    function delete(){
        helper(['form', 'url']);
        
        $model = new LoanModel();

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

    //get the customer id for current customer
    function loan_by_id(){
        helper(['form', 'url']);
        
        $model = new LoanModel();

        $id = $this->request->getPost('id');

        $result = $model->get_loan_data_by_loan_id($id);

        if($result != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $result));
        }else{
            echo json_encode(array("status" => false , 'data' => $result));
        }
        
    }

    //save data with calculation-repayment
    function save_repayment_data(){
        helper(['form', 'url']);
        
        $model = new LoanApproveModel();
            
        $loan_amount	=	$this->request->getPost('loan_amount');
        $loan_period    =	$this->request->getVar('loan_period');
        $loan_interest	=	$this->request->getVar('loan_interest');
        $effective_date  =  $this->request->getVar('effective_date');

        $loan_interest_rate=$loan_interest/100;
        $total_interast_amount=$loan_amount*$loan_interest_rate;
        $total_amount=$loan_amount + $total_interast_amount;
        $repay_per_day=$total_amount/$loan_period; 
        $newDate = $effective_date;  

        /*loan_interest_rate = 30/100 = 0.3
            To get the interest to the principal amount(total_interast_amount)= principal amount*0.3
            Total payeble amount=principal amount + total_interast_amount
            Amount to pay in 65 days = total payable amount/65 */

            $data = [
                'loan_id'	=>	$this->request->getVar('id'),
            //  'date'      =>	$this->request->getVar('effective_date'),
                'date'      =>	"",
                'amount'	=>	$repay_per_day,
                'status'	=>	$this->request->getVar('status')
            ];
          

        for($x = 0; $x < $loan_period; $x++){
            $newDatein = date('Y-m-d',strtotime($newDate. '+1 day'));
            $newDate = $newDatein; 
            $data['date'] =  $newDatein;
            $save_data = $model->insert_repayment_data($data);
        }
        
    

        if($save_data != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    //echo json_encode($newDate);
    }


	//Imal - for Payment Implementation
    function byline(){
        helper(['form', 'url']);
        
        
        $model = new LoanModel();

        $id = $this->request->getPost('line_id');

        $result = $model->get_data_by_line($id);

        if($result != false){
            //$data = $model->where('id', $id->first();
            echo json_encode(array("status" => true , 'data' => $result));
        }else{
            echo json_encode(array("status" => false , 'data' => "empty"));
        }
        
    }
}

?>

