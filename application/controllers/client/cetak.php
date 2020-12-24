<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cetak extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('post_model');
	}
	public function cari() 
	{
			$cari = $this->input->POST('cari');
		$isi['data'] = 	$isi['data']	= $this->db->get('profil_akpol');
		$this->load->view('client/client',$isi);
	}

	public function hasil()
	{



		$this->model_scurity->getscurity();
		$isi['content'] = 'client/cari';
		$isi['label'] = 'BERANDA';
		$isi['vale']	= $this->db->get('profil_akpol');

		$user = $this->session->userdata('username');
		$kode = $this->session->userdata('kode');	

	
		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		//  
		$cari = $this->input->GET('search');
		$isi['hapus_lapor'] = $this->post_model->carihapuslapor($cari);
		
		$isi['cari'] = $this->post_model->cariOrang($cari);
		$this->load->view('client/client', $isi);
	}

public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'client/print';
		$isi['label'] = 'CETAK';
		$isi['vale']	= $this->db->get('profil_akpol');
	
		//  
		$cari = $this->input->GET('search');
		$isi['cari'] = $this->post_model->cariOrang($cari);
		$isi['hapus_lapor'] = $this->post_model->carihapuslapor($cari);
		
		$this->load->view('client/beranda', $isi);
	}
	public function logout()
	{
		$this->session->sess_destroy ();
		redirect('authentication/auth/login');
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */