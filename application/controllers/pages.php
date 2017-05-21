<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}


	public function dashboard(){ 
		$this->load->view('dashboard');
	}


	public function items(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Items' );
		$this->load->view('items/items', $page_data);
	}

	public function add_items(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Add Items' );
		$this->load->view('items/add_items', $page_data);
	}

	public function edit_items(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Edit Items' );
		$this->load->view('items/edit_items', $page_data);
	}


	public function supplier(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Items' );
		$this->load->view('supplier/supplier', $page_data);
	}

	public function add_supplier(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Add Items' );
		$this->load->view('supplier/add_supplier', $page_data);
	}

	public function edit_supplier(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Edit Items' );
		$this->load->view('supplier/edit_supplier', $page_data);
	}


	public function category(){ 
		$page_data = array('page_name' => 'Items', 'breadcrumb' => 'Home > Items' );
		$this->load->view('category/category', $page_data);
	}




	 
}
