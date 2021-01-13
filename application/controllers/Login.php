<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->auth->is_logged_in() == false){          
        	$this->load->view('login');
        }else{
            redirect('home','refresh');
        }			
	}

	public function submit()
	{
		$username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $input = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->db->get_where('user',array('username' => $username, 'password' => $password));
        if (!empty($cek->num_rows())) {
           
            $get = $cek->result();
            foreach ($get as $key) {
            /*    $id = $key->id_akses
                $user = $key->username
                $level = $key->level
            */
                $ses_admin = array(
                    'username' => $key->username,
                    'password' => $key->password                 
                );
            }         
            $this->session->set_userdata($ses_admin);            
            redirect('home','refresh');
        }else{     
            $this->session->set_flashdata('msg','
                <div class="alert alert-danger text-center" role="alert">
                  Username atau Password Salah !
                </div>
                ');       
            redirect('login');
        }
	}

	public function logout()
	{
		$ses_admin = array(
            'username',
            'password'
        );
		$this->session->unset_userdata($ses_admin);			
		redirect(base_url());
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */