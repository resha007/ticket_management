<?php

namespace App\Controllers;

// use App\Models\LoanModel;
use CodeIgniter\Controller;

class LoanApproval extends Controller
{
    

    public function index()
    {
        $LoanModel = new LoanModel();

		
		return view('loan_approve', $data);
    }

    function get(){ 
        $LoanModel = new LoanModel();

		//$data = $LoanModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
        $data = $LoanModel->get_data();

        //approvels
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


       }
        

		echo json_encode($data);
	}

	function save(){
        helper(['form', 'url']);
        
        $model = new LoanModel();
        
        $data = [
        
            'status'	    =>	$this->request->getVar('status'),
            'approved_date'	    =>	$this->request->getVar('approved_date'),
            'approved_by'   =>	$this->request->getVar('approved_by'),
            'effective_date'=>	$this->request->getVar('effective_date')
        ];

        $save_data = $model->insert_data($data);

        if($save_data != false){
            //$data = $model->where('id', $save_data)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }



    // function calculate total_amount_per_day(){
    //     $model = new LoanModel();
        
            // $loan_interest_rate=$this->request->getVar('loan_interest')/100
            // $total_interast_amount=$this->request->getPost('loan_amount')*$loan_interest_rate
            // $total_amount=$this->request->getPost('loan_amount') + $total_interast_amount
            // $repay_per_day=$total_amount/65
            /*loan_interest_rate = 30/100 = 0.3
            To get the interest to the principal amount(total_interast_amount)= principal amount*0.3
            Total payeble amount=principal amount + total_interast_amount
            Amount to pay in 65 days = total payable amount/65 */
    // }

	
}


