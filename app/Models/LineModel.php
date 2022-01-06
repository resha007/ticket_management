<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class LineModel extends Model
{
    protected $table = 'line';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','code', 'name','rider_id','opt_rider_id','status'];

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('line');
    }

    public function get_data($id = false) {//$id=1;
        if($id === false) {
            $this->join('employee', 'employee.id = line.rider_id', 'LEFT');
            $this->join('employee emp', 'emp.id = line.opt_rider_id', 'LEFT');
            //$this->where('status', 1);
            $this->select('line.*');
            $this->select("CONCAT(employee.first_name, ' ', employee.last_name) as rider");
            $this->select("CONCAT(emp.first_name, ' ', emp.last_name) as opt_rider");
            //$this->where('status', 1);
            return $this->findAll();
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