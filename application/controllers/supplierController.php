<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->model('commonQueryModel'); 
	}

    public function getSuppliers(){
        $data["results"] = $this->commonQueryModel->selectAllData('supplier'); 
        return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
    }

    public function getSingleSupplier(){

    	$search_index = array(
			'columns' => '*' ,   
			'table' => 'supplier',
			'data' => 'sup_id= "'.$this->input->post('sup_id').'"',
		);

        $data["results"] = $this->commonQueryModel->selectCustomData($search_index); 
        return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
    }


    public function getSupplierList(){

    	$search_index = array(
			'columns' => '`sup_id`, `sup_name`' ,   
			'table' => 'supplier',
			'data' => '1',
		);

        $data["results"] = $this->commonQueryModel->selectCustomData($search_index); 
        return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
    } 


    public function getLastIndex(){
 

		$search_index = array(
			'table' => 'supplier' ,   
			'search_index' => 'sup_id',
		);

        $data["results"] = $this->commonQueryModel->selectLastIndex($search_index); 
        return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
    }


    public function addSupplier(){

		$dataset = $this->input->post();

		$insert_vals = array(
			'table' => 'supplier' , 
			'columns' => "`sup_id`, `sup_name`, `dealer`,`nic`, `address`, `tel`,`fax`, `email`",
			'values' =>  "'".$dataset['sup_id']."', '".$dataset['sup_name']."', '".$dataset['dealer']."','".$dataset['nic']."', '".$dataset['address']."', '".$dataset['tel']."','".$dataset['fax']."', '".$dataset['email']."' ",
		); 

		$data["results"] = $this->commonQueryModel->insertData($insert_vals);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

		
	}
 
	  
    
    public function deleteSupplier(){

		$dataset = $this->input->post(); 

		$delete_val = array(
			'table' => 'supplier' ,  
			'data' =>  " sup_id =".$dataset['sup_id'],
		);

		$data["results"] = $this->commonQueryModel->deleteData($delete_val);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

	}



	public function updateSupplier(){ 

		$dataset = $this->input->post(); 

		$update_val = array(
			'table' => 'supplier',  
			'values' => $dataset['values'],
			'data' =>  " sup_id =".$dataset['id'],
		);

 
		$data["results"] = $this->commonQueryModel->updateData($update_val);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

		//print_r($dataset);

	}
	
 

}