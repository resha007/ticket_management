<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class EmployeeModel extends Model
{
    protected $table = 'employee';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','first_name', 'last_name','address','city','dob','nic','gender','contact_no','email','username','password','type','status'];

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('employee');
    }

    public function get_data($id = false) {//$id=1;
        if($id === false) {
            return $this->where('status', 1)->orWhere('status', 2)->findAll();
        } else {
            return $this->where('status', 1)->findAll();
        }
    }

    public function auth($username) {
        $data = $this->where('username', $username)->where('status', 1)->findAll();


        if(!empty($data)) {
            return $data;
        } else {
            return false;
        }
    }

    public function get_data_by_type($type = false) {//$id=1;
        if($type === false) {
            return $this->where('type', 1)->orWhere('type', 2)->findAll();
        } else if($type === 1) {
            return $this->where('type', 1)->Where('status', 1)->findAll();
        } else if($type === 2) {
            return $this->where('type', 2)->findAll();
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