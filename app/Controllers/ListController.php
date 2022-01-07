<?php

namespace App\Controllers;

use App\Models\LoanModel;
use CodeIgniter\Controller;

class ListController extends Controller
{
    
    public function index()
    {
        $LoanModel = new LoanModel();

		// $data['user_data'] = $LoanModel->orderBy('id', 'DESC')->paginate(10);

		// $data['pagination_link'] = $LoanModel->pager;

		 return view('loan_list', $data);
    }


    function get(){ 
        $LoanModel = new LoanModel();

		$data = $LoanModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);

		echo json_encode($data);
	}

	// 
    // function calculate total_amount_per_day(){
    //     $model = new LoanModel();
        
    //     // $data = $LoanModel->where("status='1' OR status='2'")->orderBy('id', 'ASC')->paginate(10);
    // }

	
}


