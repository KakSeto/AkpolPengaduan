<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class error extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('404.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */