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
    

   //insert data
    public function insert_repayment_data($data) {
        if($this->db->table($this->table)->insert($data)){
                return true;
            }
            else{
                return false;
            }
    }


}
?>
