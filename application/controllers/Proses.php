<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

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
		$data['content'] = 'proses';
		$get_alternatif = $this->db->query("SELECT SUM(result) as total, alternatif.* FROM nilai JOIN alternatif ON alternatif.id = nilai.id_alternatif GROUP BY id_alternatif ORDER BY total DESC")->result();
		foreach ($get_alternatif as $key => $value) {
			$value->nilaihasil = $this->Mglobal->detailnilai($value->id)->result();
			// $value->hasilakhir = $this->db->query("SELECT SUM(result) as total FROM nilai WHERE id_alternatif='$value->id'")->result();
		}
		$data['alternatif'] = $get_alternatif;
		$this->load->view('index', $data);	
		// print_r($get_alternatif);
	}

	public function update_result()
	{
		$get_alternatif = $this->db->get('alternatif')->result();

		foreach ($get_alternatif as $data_alternatif) {
			$get_nilai = $this->db->get_where('nilai', array('id_alternatif' => $data_alternatif->id))->result();

			foreach ($get_nilai as $data_nilai) {
				$get_parameter = $this->Mglobal->get_parameter_id($data_nilai->id_parameter)->row();

				$this->db->where('id', $data_nilai->id);
				$this->db->update('nilai', array(
					'nilai_bulat' => $get_parameter->nilai/100,
					'bobot_wj' => $get_parameter->normalisasi,
				));
			}

			//
			$get_nilai2 = $this->db->get_where('nilai', array('id_alternatif' => $data_alternatif->id))->result();

			$get_cmax = $this->db->query("SELECT MAX(nilai_bulat) as cmax FROM nilai WHERE id_alternatif='$data_alternatif->id'")->row();
			$get_cmin = $this->db->query("SELECT MIN(nilai_bulat) as cmin FROM nilai WHERE id_alternatif='$data_alternatif->id'")->row();
			foreach ($get_nilai2 as $data_nilai) {
				$param_a = $get_cmax->cmax - $data_nilai->bobot_wj;
				$param_b = $get_cmax->cmax - $get_cmin->cmin;
				if ($param_a == 0 || $param_b == 0) {
					$result = 0;
				}else{
					$result = $param_a / $param_b;
				}
				$this->db->where('id', $data_nilai->id);
				$this->db->update('nilai', array(
					'param_a' => $param_a,
					'param_b' => $param_b,
					'result' => $result,
				));	
			}

		}

		redirect('proses','refresh');
	}

}

/* End of file Proses.php */
/* Location: ./application/controllers/Proses.php */