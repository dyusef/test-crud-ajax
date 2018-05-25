<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Crud_model','crud_model',TRUE);
	}

	public function index()
	{
		$this->load->view('vwTest');
	}

	public function tambah_data()
	{
		$data_in['nama'] = $this->input->post('entry_nama');
		$data_in['alamat'] = $this->input->post('entry_alamat');
		$entry = $this->crud_model->tambah_data($data_in);
		if ($entry)
			echo json_encode(array('status'=>true));
		else			
			echo json_encode(array('status'=>false)); 
	}

	public function lihat_data()
	{
		$result = $this->crud_model->lihat_data();
		echo json_encode($result);
	}

	public function ubah_data()
	{
		$result = $this->crud_model->ubah_data();
		echo json_encode($result);
	}

	public function perbarui_data()
	{
		$id = $this->input->post('update_id');
		$data['nama'] = $this->input->post('update_nama');
		$data['alamat'] = $this->input->post('update_alamat');
		$result = $this->crud_model->perbarui_data($id,$data);
		if ($result)
			echo json_encode(array('status'=>true));
		else			
			echo json_encode(array('status'=>false)); 
	}

	public function hapus_data()
	{
		$id = $this->input->post('id');
		$hapus = $this->crud_model->hapus_data($id);
		if($hapus)
			echo "1";
		else
			echo "0";
	}
}