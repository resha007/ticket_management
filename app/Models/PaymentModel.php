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
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('payment');
    }

    public function insert_data($data) {
        if($this->db->table($this->table)->insert($data)){
                return true;
            }
            else{
                return false;
            }
    }

}
