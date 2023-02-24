<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class TicketModel extends Model
{
    protected $table = 'ticket';

    protected $primaryKey = 'id';
    
    protected $allowedFields = ['id','serial_no', 'model_id','branch_id','category_id','date_time','comment','status_id'];

    public function __construct() { 
        parent::__construct();
    }

    public function get_data($id = false) {//$id=1;
        if($id === false) {
             $this->join('model', 'model.id = ticket.model_id', 'LEFT');
             $this->join('branch', 'branch.id = ticket.branch_id', 'LEFT');
             $this->join('category', 'category.id = ticket.category_id', 'LEFT');
             //$this->join('status', 'status.id = ticket.status_id', 'LEFT');
             $this->select('ticket.*');
             $this->select('model.name as model');
             $this->select('branch.description as branch');
             $this->select('category.name as category');
             //$this->select('status.name as status');
    
            return $this->where('status_id', 1)->orWhere('status_id', 2)->orWhere('status_id', 3)->findAll();
        } else {
            return $this->where('status', 1)->findAll();
        }
    }

    public function serial_check($serial_no) {
        $this->select('ticket.*');

        return $this->where('status_id', 1)->Where('serial_no', $serial_no)->findAll();
        
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

    public function search($data) {
        //return $this->where('status_id', $status)->orWhere('status_id', 2)->orWhere('status_id', 3)->findAll();
        return $this->where('status_id', $data['status_id'])->orWhere('serial_no', $data['serial_no'])->orWhere('model_id', $data['model_id'])->orWhere('category_id', $data['category_id'])->orWhere('branch_id', $data['branch_id'])->orWhere('date_time', $data['date_time'])->orWhere('comment', $data['comment'])->findAll();

    }

}

?>