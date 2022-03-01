<?php

namespace App\Controllers;

use App\Models\LoanApproveModel;
use App\Models\LoanModel;
use CodeIgniter\Controller;

class LoanApproval extends Controller
{
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $LoanApproveModel = new LoanApproveModel();


         //get guarntor names from the customer table
         $data['guarantordata'] = $LoanApproveModel->getguarntorlist();

		
		return view('loan_approve', $data);
        // return view('loan_approve');
    }

    function get(){ 
        $LoanApproveModel = new LoanApproveModel();

        $data = $LoanApproveModel->get_data();

        //approvals
        for($i=0;$i<sizeof($data);$i++){

            //status
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

            if($data[$i]["created_by"] == 1){
                $data[$i]["created_by"] = "Admin";
            }else{
                $data[$i]["created_by"] = "Rider";
            }

            if($data[$i]["approved_by"] == 1){
                $data[$i]["approved_by"] = "Admin";
            }else{
                $data[$i]["approved_by"] = "Rider";
            }



       }
        

		echo json_encode($data);
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
            // 'loan_period'        =>	$this->request->getVar('loan_period'),
            // 'loan_interest'	=>	$this->request->getVar('loan_interest'),

            'approved_date'	=>	$this->request->getVar('approved_date'),
            'approved_by'   =>	$this->session->get('id'),
            'effective_date'=>	$this->request->getVar('effective_date'),
             'created_by'	=>	$this->request->getVar('created_by'),
             'status'        =>	$this->request->getVar('status')
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
    


	
}


