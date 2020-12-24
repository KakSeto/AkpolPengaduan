<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'client/home';
		$isi['label'] = 'BERANDA';
		$isi['cover']= $this->db->get('cover');
	
		$user = $this->session->userdata('username');
		$kode = $this->session->userdata('kode');	
		$this->load->model('admin/model_client');
		$isi['info']= $this->model_client->info();
		$isi['vale']	= $this->db->get('profil_akpol');
		$this->load->model('model_users');
		$isi['status']	= $this->model_users->aktif();	

		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		$this->load->view('client/client',$isi);
	}

public function update ()
 {
		$this->model_scurity->getscurity();
		$key = $this->session->userdata('kode');
		$data['username']	= $this->input->post('username');
		$data['Nama']	= $this->input->post('Nama');
		$data['Email']	= $this->input->post('Email');
		$data['Nohp']	= $this->input->post('Nohp');
		$data['password']	= md5($this->input->post('password'));
		$data['sandi']	= $this->input->post('password');
		
		
		$this->load->model('admin/model_client');
		$this->db->where('id',$key);
		$query	= $this->db->get('users');
		 
		if($query->num_rows()>0)
		{
			$this->model_client->getupdate($key,$data);
			echo "<script> alert('Sukses , Harap Login Kembali'); </script>";
			redirect('authentication/auth/login','refresh');
	
		}
		else
		{
			$this->model_client->getinsert($data);
					echo "<script> alert('Sukses'); </script>";
	redirect("client/home","refresh");	
		}
	}
	

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
	
		//  
		$cari = $this->input->GET('search');
		$isi['cari'] = $this->post_model->cariOrang($cari);
		$isi['hapus_lapor'] = $this->post_model->carihapuslapor($cari);
		
		$this->load->view('client/client', $isi);
	}
public function cetak()
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