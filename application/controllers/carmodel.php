<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carmodel extends CI_Controller {

	public function index()
	{
        // echo site_url();
        $data['results']=$this->carmodel_model->getAll();
        $data['page']='viewcarmodel';
		$data[ 'title' ] = 'carmodels';
        $this->load->view( 'template', $data );
	}
	public function create()
	{
		$data['page']='createcarmodel';
		$data['manufacturer']=$this->manufacturer_model->getdropdown();
		$data[ 'title' ] = 'Create carmodels';
        $this->load->view( 'template', $data );
	}
	public function createcarmodel()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$filename="image1";
		$image1="";
		if (  $this->upload->do_upload($filename))
		{
            $uploaddata = $this->upload->data();
			$image1=$uploaddata['file_name'];
		}else{
			$error = array('error' => $this->upload->display_errors());
			return $error2;
		}
		
		$filename2="image2";
		$image2="";
		if (  $this->upload->do_upload($filename2))
		{
            $uploaddata2 = $this->upload->data();
            $image2=$uploaddata2['file_name'];
		}else{
			$error2 = array('error' => $this->upload->display_errors());
			return $error2;
		}
		$name=$this->input->post('name');
		$manufacturer=$this->input->post('manufacturer');
		$color=$this->input->post('color');
		$year=$this->input->post('year');
		$regnum=$this->input->post('regnum');
		$note=$this->input->post('note');
		$data['message']=$this->carmodel_model->createModel($name,$manufacturer,$color,$year,$regnum,$note,$image1,$image2);
		$this->load->view('json', $data);
	}
	public function edit()
	{
		$data['before']=$this->carmodel_model->beforeedit($this->input->get('id'));
		$data['manufacturer']=$this->manufacturer_model->getdropdown();
		$data['page']='editCarModel';
		$data['title']='Edit Car Model';
		$this->load->view('template',$data);
	}
	public function editcarmodel()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$filename="image1";
		$image1="";
		$id=$this->input->post("id");
		if (  $this->upload->do_upload($filename))
		{
            $uploaddata = $this->upload->data();
			$image1=$uploaddata['file_name'];
		}else{
			$error = array('error' => $this->upload->display_errors());
			// return $error;
		}
		if($image1=="")
        {
            $image1=$this->carmodel_model->getcarmodelimage1byid($id);
            $image1=$image1->image1;
        }
		$filename2="image2";
		$image2="";
		if (  $this->upload->do_upload($filename2))
		{
            $uploaddata2 = $this->upload->data();
            $image2=$uploaddata2['file_name'];
		}else{
			$error2 = array('error' => $this->upload->display_errors());
			// return $error2;
		}
		if($image2=="")
        {
            $image2=$this->carmodel_model->getcarmodelimage2byid($id);
            $image2=$image2->image2;
		}
		

		$name=$this->input->post('name');
		$manufacturer=$this->input->post('manufacturer');
		$color=$this->input->post('color');
		$year=$this->input->post('year');
		$regnum=$this->input->post('regnum');
		$note=$this->input->post('note');
		$data['message']=$this->carmodel_model->editModel($id,$name,$manufacturer,$color,$year,$regnum,$note,$image1,$image2);
		$this->load->view('json', $data);
	}

	public function editcarmodelSubmit()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');

		$returnData=$this->carmodel_model->editecarmodelSubmit($id,$name);
		echo $id;
	}

	public function getsingle()
    {
		$id= $this->input->get_post('id');
		$data['carmodel']  = $this->carmodel_model->getsingle($id);
        $this->load->view("backend/modal", $data);
	}
	
	public function soldcarmodel()
    {
		$id= $this->input->get_post('id');
		$data['carmodel']  = $this->carmodel_model->soldcarmodel($id);
		// $this->load->view("backend/modal", $data);
		redirect(base_url().'index.php/carmodel', 'refresh');
	}
	
	public function deletecarmodel(){
		
		$id= $this->input->get_post('id');
		$data['carmodel']  = $this->carmodel_model->deletecarmodel($id);
		// $this->load->view("backend/modal", $data);
		redirect(base_url().'index.php/carmodel', 'refresh');
	}
}
