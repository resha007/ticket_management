<?php

namespace App\Controllers;

use App\Models\LoanApproveModel;
use App\Models\LoanModel;
use CodeIgniter\Controller;

class LoanApproval extends Controller
{
    

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


    


	
}


