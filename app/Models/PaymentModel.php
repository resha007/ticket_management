<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class PaymentModel extends Model
{
    protected $table = 'payment';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','repayment_id','loan_id','paid_date','paid_amount','rider_id','type','created_by','created_date','status'];

    public function __construct() {
        parent::__construct();
    }

    public function get_data($id = false) {//$id=1; //get_payment_data_by_customer_id
            
            $this->join('loan', 'loan.id = payment.loan_id', 'LEFT');
            $this->join('customer', 'customer.id = loan.customer_id', 'LEFT');
            $this->select('payment.*');

            $this->where('customer.id', $id);
            return $this->findAll();
   
    }

    public function insert_data($data) {
        if($this->insert($data)){
                return true;
            }
            else{
                return false;
            }
    }

    public function update_data($id,$data) {
        if($this->update($id,$data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_data($id,$data) {
        if($this->update($id,$data)){
            return true;
        }
        else{
            return false;
        }
    }


    public function get_data_by_id($id) {
        

    }

    //get_payment_data_by_loan_id
    public function get_payment_data_by_loan_id($id) {
        return $this->where('id', $id)->first();
     
        // $this->join('customer', 'customer.id = loan.customer_id', 'LEFT'); 
        // $this->join('customer cust', 'cust.id = loan.guarantor_1', 'LEFT');
        // $this->join('customer cust1', 'cust1.id = loan.guarantor_2', 'LEFT');
        // $this->join('employee', 'employee.id = loan.created_by', 'LEFT');
        // $this->select('loan.*');
        // $this->select('loan.reason as reason');
        // $this->select("CONCAT(customer.first_name, ' ', customer.last_name) as customer");
        //  $this->select('employee.username as username');
        // // $this->select('customer.*');
        // $this->select("CONCAT(cust.first_name, ' ', cust.last_name) as guarantor_1");
        // $this->select("CONCAT(cust1.first_name, ' ', cust1.last_name) as guarantor_2");
        
        // return $this->where('loan.id', $id)->first();
    }

}

?>