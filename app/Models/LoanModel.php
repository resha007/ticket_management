<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class LoanModel extends Model
{
    protected $table = 'loan';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','customer_id','reason','guarantor_1','guarantor_2','loan_amount','loan_period','loan_interest','created_date','created_by','status','approved_date','approved_by','effective_date'];

    public function __construct() {
        parent::__construct();
        
        $db = \Config\Database::connect();
        $builder = $db->table('loan');
    }
    
    // function get_customername(){
    //     $db = \Config\Database::connect();
    //     $query = $db->query("SELECT id, CONCAT((first_name),(' '),(last_name)) as name from customer where  ");
    //      return $query->getresult(); 
    // }

    //get gautnters in the db
    function getguarntorlist() {

        // $query = $db->query('YOUR QUERY HERE');

        $db = \Config\Database::connect();
        $query = $db->query("SELECT id, CONCAT((first_name),(' '),(last_name)) as name from customer");
         return $query->getresult();


    }

    public function insert_data($data) {
        if($this->db->table($this->table)->insert($data)){
                return true;
            }
            else{
                return false;
            }
    }
    
    //get the customer id for the current customer to display the name
    // public function get_data_by_id($id) {
    //     return $this->where('id', $id)->first();

    // }

    //Imal- For Payment Implementation 
    public function get_data_by_line($id) {
        $this->join('customer', 'customer.id = loan.customer_id', 'LEFT');
        $this->join('line', 'line.id = customer.line_id', 'LEFT');
        $this->select("CONCAT(line.code, ' ', line.name) as line");
        $this->select("CONCAT(customer.first_name, ' ', customer.last_name) as customer");
        $this->select("CONCAT(loan.id) as loanid");
        $this->select("CONCAT(loan.loan_amount) as loanamount");
        $this->where('customer.line_id', $id);
        return $this->findAll();
    }

    // public function get_data_by_line($lineid) {
    //     // $this->join('line', 'line.id = customer.line_id', 'LEFT');
    //     $this->join('loan', 'customer.id = loan.customer_id', 'LEFT');
    //     return $this->where('customer.line_id', $lineid)->first();

    // }


}
