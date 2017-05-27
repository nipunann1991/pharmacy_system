<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemsController extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		$this->load->model('commonQueryModel'); 
	}

    public function getItems(){
        $data["results"] = $this->commonQueryModel->selectAllData('item'); 
        return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
    }


    public function getCategoryList(){

    	$search_index = array(
			'columns' => '`id`, `cat_name`' ,   
			'table' => 'categories',
			'data' => '1',
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
			'table' => 'item' ,   
			'search_index' => 'item_id',
		);

        $data["results"] = $this->commonQueryModel->selectLastIndex($search_index); 
        return $this->output->set_output(json_encode($data["results"], JSON_PRETTY_PRINT));
    }
}