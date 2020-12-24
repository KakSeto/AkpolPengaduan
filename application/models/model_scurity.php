<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_scurity extends CI_model {

	public function getscurity()
	{
		$username	=$this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect('authentication/auth/login');
	}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */