<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model');
		$this->load->library('session');
	}





	public function index()
	{

		$data['acoount'] = $this->account_model->get_login();
	
		$this->load->view('templates/header', $data);
		$this->load->view('piypa', $data);
		$this->load->view('templates/footer', $data);
	}


public function login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		print_r($email);
		
		if($email != ""){
		$data['account'] = $this->account_model->get_login($email,$password);

		
		if(isset($data['account'][0]['username'])){
			$username = $data['account'][0]['username'];
			$id = $data['account'][0]['id'];
			
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('id', $id);

		}
		}

		$this->load->view('templates/header');
		
		$session_pete = $this->session->userdata('username');
		$data['username'] = $session_pete;

		if($session_pete == ""){
		$this->load->view('login' );
		}
		else{
			$this->load->view('dashboard', $data );
		}

		$this->load->view('templates/footer');
	}

public function out(){

		$gone = $this->session->sess_destroy();

		$data['sorry'] = "sorry, you had left. See you later.";
		
		$this->load->view('templates/header');
		$this->load->view('dashboard', $data );
		$this->load->view('templates/footer');
	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */