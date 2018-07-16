<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manufacturer extends CI_Controller {

	public function index()
	{
        // echo site_url();
        $data['results']=$this->manufacturer_model->getAll();
        $data['page']='viewManufacturer';
		$data[ 'title' ] = 'Manufacturers';
        $this->load->view( 'template', $data );
	}
	public function create()
	{
        $data['page']='createManufacturer';
		$data[ 'title' ] = 'Create Manufacturers';
        $this->load->view( 'template', $data );
	}
	public function createManufacturer()
	{
		$name=$this->input->post('name');
		$returnData=$this->manufacturer_model->createManufacturer($name);
		echo $returnData;
	}
	public function editManufacturer()
	{
		$data['before']=$this->manufacturer_model->beforeedit($this->input->get('id'));
		$data['page']='editManufacturer';
		$data['title']='Edit Manufacturer';
		$this->load->view('template',$data);
	}
	public function editManufacturerSubmit()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');

		$returnData=$this->manufacturer_model->editeManufacturerSubmit($id,$name);
		echo $id;
	}
	
	public function deletemanufacturer(){
		
		$id= $this->input->get_post('id');
		$data['manufacturer']  = $this->manufacturer_model->deletemanufacturer($id);
		// $this->load->view("backend/modal", $data);
		redirect(base_url().'index.php/manufacturer', 'refresh');
	}
}
