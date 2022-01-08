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

    public function get_data($id = false) {//$id=1;
        if($id === false) {
            // $this->join('line', 'line.id = customer.line_id', 'LEFT');
            // $this->select('customer.*');
            // $this->select("CONCAT(line.code, ' - ', line.name) as line");
            // //$this->where('status', 1);
            // return $this->findAll();
            return $this->join('line', 'line.id = customer.line_id', 'LEFT')->select('customer.*')->select("CONCAT(line.code, ' - ', line.name) as line")->where('customer.status', 1)->orWhere('customer.status', 2)->findAll();
            //return $this->where('status', 1)->orWhere('status', 2)->findAll();
        } else {
            return $this->where('status', 1)->findAll();
        }
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
        return $this->where('id', $id)->first();

    }

}

?>