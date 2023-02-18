<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class BranchModel extends Model
{
    protected $table = 'branch';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id', 'name','description','status','code','contact_no','location'];

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('branch');
    }

    public function get_data($id = false) {//$id=1; 
        if($id === false) {
            $this->select('branch.*');
            $this->where('branch.status', 1);
            $this->orWhere('branch.status', 2);
            return $this->findAll();
        } else {
            return $this->where('branch.status', 1)->findAll();
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