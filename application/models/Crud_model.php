<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function tambah_data($data)
	{
		$this->db->insert('entry', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function lihat_data()
	{
		$query = $this->db->get('entry');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function ubah_data()
	{
		$id = $this->input->get('id');
		$this->db->where('id',$id);
		$query = $this->db->get('entry');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function perbarui_data($id,$data)
	{
		$this->db->where('id', $id);
		return $this->db->update('entry', $data);
	}

	public function hapus_data($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('entry');

	}
}
?>