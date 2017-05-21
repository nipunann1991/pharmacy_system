<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->model('commonQueryModel'); 
	}

	public function getCategories(){
		
		$data["results"] = $this->commonQueryModel->selectAllData('categories'); 
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
		
	}


	public function addCategories(){

		$dataset = $this->input->post();

		$insert_vals = array(
			'table' => 'categories' , 
			'columns' => "`id`, `cat_name`, `cat_desc`",
			'values' =>  "'".$dataset['id']."', '".$dataset['cat_name']."', '".$dataset['cat_name']."'",
		);

		$data["results"] = $this->commonQueryModel->insertData($insert_vals);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

		
	}


	public function deleteCategories(){

		$dataset = $this->input->post();

		$delete_val = array(
			'table' => 'categories' ,  
			'data' =>  " id =".$dataset['id'],
		);

		$data["results"] = $this->commonQueryModel->deleteData($delete_val);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

	}


	public function updateCategories(){

		$dataset = $this->input->post();

		$delete_val = array(
			'table' => 'categories' ,  
			'values' =>  " `id` = '".$dataset['id']."', `cat_name` = '".$dataset['cat_name']."', `cat_desc` = '".$dataset['cat_desc']."'",
			'data' =>  " id =".$dataset['id'],
		);

		$data["results"] = $this->commonQueryModel->updateData($delete_val);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

	}


	public function searchCategories(){

		$dataset = $this->input->post();

		$search_vals = array(
			'table' => 'categories', 
			'columns' => '*', 
			'data' =>  " id =".$dataset['id'],
		);



		$data["results"] = $this->commonQueryModel->selectCustomData($search_vals);
		return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));

	}


	

	 

}

