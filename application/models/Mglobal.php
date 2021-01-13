<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mglobal extends CI_Model {

	public function show_parameter($id)
	{
		$this->db->select('parameter.*, kriteria.*, parameter.id as id_param');
		$this->db->from('parameter');
		$this->db->join('kriteria', 'kriteria.id = parameter.id_kriteria');
		$this->db->where('parameter.id_kriteria', $id);
		$db = $this->db->get();
		return $db;
	}	

	public function detailnilai($id)
	{
		$this->db->from('nilai');
		$this->db->join('parameter', 'parameter.id = nilai.id_parameter');
		$this->db->join('kriteria', 'kriteria.id = parameter.id_kriteria');
		$this->db->where('nilai.id_alternatif', $id);
		$db = $this->db->get();
		return $db;
	}

	public function get_parameter_id($id)
	{		
		$this->db->from('parameter');
		$this->db->join('kriteria', 'kriteria.id = parameter.id_kriteria');
		$this->db->where('parameter.id', $id);
		$db = $this->db->get();
		return $db;
	}	

	public function rank_alternatif()
	{
		$this->db->select('SELECT SUM(result) as total, alternatif.*');
		$this->db->from('nilai');
		$this->db->join('alternatif', 'alternatif.id = nilai.id_alternatif');
		$this->db->group_by('id_alternatif');
		$this->db->order_by('total', 'desc');
		$db = $this->db->get();
		return $db;
	}

}

/* End of file Mglobal.php */
/* Location: ./application/models/Mglobal.php */