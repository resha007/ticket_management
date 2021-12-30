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
 
    public function insert_data($data) {
        if($this->db->table($this->table)->insert($data)){
                return true;
            }
            else{
                return false;
            }
    }

}

?>