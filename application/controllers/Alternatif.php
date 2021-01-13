<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

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
		$data['content'] = 'alternatif';
		$data['get'] = $this->db->get('alternatif')->result();
		$data['ipk'] = $this->db->get_where('parameter', array('id_kriteria' => 1))->result();
		$data['pot'] = $this->db->get_where('parameter', array('id_kriteria' => 2))->result();
		$data['tot'] = $this->db->get_where('parameter', array('id_kriteria' => 3))->result();
		$this->load->view('index', $data);
	}

	public function alternatif_get($id)
	{
		$data = $this->db->get_where('alternatif', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function alternatif_simpan()
	{
		$this->db->insert('alternatif', array(
			'nama' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'jurusan' => $this->input->post('jurusan'),
		));

		echo json_encode(array('status' => TRUE));
	}

	public function alternatif_edit($id)
	{
		$this->db->where('id', $id);
		$this->db->update('alternatif', array(
			'nama' => $this->input->post('nama'),
			'nim' => $this->input->post('nim'),
			'jurusan' => $this->input->post('jurusan'),
		));
		echo json_encode(array('status' => TRUE));

	}

	public function alternatif_hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('alternatif');

		redirect('alternatif','refresh');
	}

	public function nilai_get($id)
	{
		$cek = $this->db->get_where('nilai', array('id_alternatif' => $id))->num_rows();
		if ($cek > 0) {
			$ipk = $this->db->query("SELECT * FROM nilai WHERE id_alternatif = '$id' LIMIT 0, 1")->row();
			$pot = $this->db->query("SELECT * FROM nilai WHERE id_alternatif = '$id' LIMIT 1, 1")->row();
			$tot = $this->db->query("SELECT * FROM nilai WHERE id_alternatif = '$id' LIMIT 2, 1")->row();
			echo json_encode(array(
				'ipk_value' => $ipk->id_parameter,
				'pot_value' => $pot->id_parameter,
				'tot_value' => $tot->id_parameter,
			));		
		}else{
			echo json_encode(array(
				'ipk_value' => 0,
				'pot_value' => 0,
				'tot_value' => 0,
			));
		}
	}
	public function nilai_save()
	{
		$id_alternatif = $this->input->post('id_alter');
		$cek = $this->db->get_where('nilai', array('id_alternatif' => $id_alternatif))->num_rows();
		if ($cek > 0) {
			$this->db->where('id_alternatif', $id_alternatif);
			$this->db->delete('nilai');

			$this->db->insert('nilai', array(
				'id_alternatif' => $id_alternatif,
				'id_parameter' => $this->input->post('ipk'),
			));
			$this->db->insert('nilai', array(
				'id_alternatif' => $id_alternatif,
				'id_parameter' => $this->input->post('pot'),
			));
			$this->db->insert('nilai', array(
				'id_alternatif' => $id_alternatif,
				'id_parameter' => $this->input->post('tot'),
			));
		}else{
			$this->db->insert('nilai', array(
				'id_alternatif' => $id_alternatif,
				'id_parameter' => $this->input->post('ipk'),
			));
			$this->db->insert('nilai', array(
				'id_alternatif' => $id_alternatif,
				'id_parameter' => $this->input->post('pot'),
			));
			$this->db->insert('nilai', array(
				'id_alternatif' => $id_alternatif,
				'id_parameter' => $this->input->post('tot'),
			));
		}

		echo json_encode(array('status' => TRUE));		
	}

	public function detailnilai_get($id)
	{
		$data = $this->Mglobal->detailnilai($id)->result();
		echo json_encode($data); 
	}
}

/* End of file Alternatif.php */
/* Location: ./application/controllers/Alternatif.php */