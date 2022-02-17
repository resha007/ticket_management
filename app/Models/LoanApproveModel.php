<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class LoanApproveModel extends Model
{
    protected $table = 'repayment_schedule';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','loan_id','date','amount','status'];

    public function __construct() {
        parent::__construct();
        
        $db = \Config\Database::connect();
        $builder = $db->table('repayment_schedule');
    }
    

    //get guartntors in the db
    function getguarntorlist() {

        $db = \Config\Database::connect();
        $query = $db->query("SELECT id, CONCAT((first_name),(' '),(last_name)) as name from customer");
         return $query->getresult();


    }


    //get customer loans by loan id
    public function get_repayment_data($id = false) {//$id=1;
        if($id === false) {
            return $this->join('loan', 'loan.id = repayment_schedule.loan_id', 'LEFT')->select('repayment_schedule.*')->select('date')->where('repayment_schedule.status', 1)->findAll();
        } else {
            return $this->where('repayment_schedule.status', 2)->findAll();
        }
    }
    

    // public function get_amount($id = false) {//$id=1;
    //     if($id === false) {
    //         // $this->join('line', 'line.id = customer.line_id', 'LEFT');
    //         // $this->select('customer.*');
    //         // $this->select("CONCAT(line.code, ' - ', line.name) as line");
    //         // //$this->where('status', 1);
    //         // return $this->findAll();
    //         return $this->join('customer', 'customer.id = loan.customer_id', 'LEFT')->select('loan.*')->select("CONCAT(customer.first_name, ' ', customer.last_name) as customer_id")->where('loan.status', 1)->orWhere('loan.status',2)->findAll();
    //         //return $this->where('status', 1)->orWhere('status', 2)->findAll();
    //     } else {
    //         return $this->where('status', 1)->findAll();
    //     }
    // }

    public function insert_repayment_data($data) {
        if($this->db->table($this->table)->insert($data)){
                return true;
            }
            else{
                return false;
            }
    }

    //Imal- For Payment Implementation 
    // public function get_data_by_line($id) {
    //     $this->join('customer', 'customer.id = loan.customer_id', 'LEFT');
    //     $this->join('line', 'line.id = customer.line_id', 'LEFT');
    //     $this->select("CONCAT(line.code, ' ', line.name) as line");
    //     $this->select("CONCAT(customer.first_name, ' ', customer.last_name) as customer");
    //     $this->select("CONCAT(loan.id) as loanid");
    //     $this->select("CONCAT(loan.loan_amount) as loanamount");
    //     $this->where('customer.line_id', $id);
    //     return $this->findAll();
    // }


}
?>
