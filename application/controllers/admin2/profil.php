<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/profil';
		$isi['label'] = 'CLIENT';
		$this->load->model('admin/model_client');
		// Count
		$isi['pesan_masuk']	= $this->model_client->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_client->pesan_keluar()->num_rows();
		$this->load->model('admin/model_laporan');
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
	$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
			// end
		$isi['result']	= $this->model_client->getdataheder();
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_client->getviewdata();
		
		$this->load->view('admin/admin',$isi);
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */