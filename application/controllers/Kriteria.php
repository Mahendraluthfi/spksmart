<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false)
	    {	     
	        redirect('login');
	    }

	    $this->load->model('Mglobal');
	}

	public function index()
	{
		$data['content'] = 'kriteria';
		$data['get'] = $this->db->get('kriteria')->result();
		$data['sum'] = $this->db->query("SELECT SUM(bobot) as total from kriteria")->row();
		$this->load->view('index', $data);	
	}

	public function get($id)
	{
		$data = $this->db->get_where('kriteria', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function edit()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('kriteria', array(
			'nama_kriteria' => $this->input->post('nama_kriteria'),
			'bobot' => $this->input->post('bobot'),
		));

		$sum = $this->db->query("SELECT SUM(bobot) as total from kriteria")->row();
		$get = $this->db->get('kriteria')->result();
		foreach ($get as $data) {
			$this->db->where('id', $data->id);
			$this->db->update('kriteria', array(
				'normalisasi' => $data->bobot / $sum->total
			));
		}
		redirect('kriteria','refresh');
	}

	public function parameter($id)
	{
		$data['kriteria'] = $this->db->get_where('kriteria', array('id' => $id))->row();
		$data['get'] = $this->Mglobal->show_parameter($id)->result();
		$data['content'] = 'parameter';
		$this->load->view('index', $data);
	}

	public function parameter_get($id)
	{
		$data = $this->db->get_where('parameter', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function parameter_simpan($id)
	{
		$this->db->insert('parameter', array(
			'id_kriteria' => $id,
			'nama_parameter' => $this->input->post('nama_parameter'),
			'nilai' => $this->input->post('nilai'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function parameter_edit($id)
	{
		$this->db->where('id', $id);
		$this->db->update('parameter', array(
			'nama_parameter' => $this->input->post('nama_parameter'),
			'nilai' => $this->input->post('nilai'),
		));
		echo json_encode(array('status' => TRUE));

	}

	public function parameter_hapus($id,$id_kriteria)
	{
		$this->db->where('id', $id);
		$this->db->delete('parameter');

		redirect('kriteria/parameter/'.$id_kriteria,'refresh');
	}

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */