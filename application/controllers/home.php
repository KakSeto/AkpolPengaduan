<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class home extends CI_Controller {

	public function index()
	{
		$isi['content'] = 'home';
		$isi['label'] = 'home';
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['vale']= $this->db->get('info_akpol');
		$isi['cover']= $this->db->get('cover');
		$this->load->model('admin/model_client');
		$isi['info']= $this->model_client->info();
		$this->load->model('model_users');
		$isi['status']	= $this->model_users->aktif();	
	
	
		$this->load->view('beranda',$isi);
	}

public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('post_model');
	}

	public function cari() 
	{
		$isi['content'] = 'cari';
		$cari = $this->input->GET('search');
		$isi['label'] = 'Cari';
		$isi['data'] = 	$isi['data']	= $this->db->get('profil_akpol');
		$this->load->view('beranda',$isi);
	}

	public function hasil()
	{
		$isi['content'] = 'cari';
		$isi['label'] = 'Cari';
		$isi['data'] = 	$isi['data']	= $this->db->get('profil_akpol');
		$cari = $this->input->GET('search');
		$isi['cari'] = $this->post_model->cariOrang($cari);
		$isi['hapus_lapor'] = $this->post_model->carihapuslapor($cari);
		
		$this->load->view('beranda', $isi);
	}
public function cetak()
	{
		$isi['content'] = 'print';
		$isi['label'] = 'Cetak';
		$isi['data']	= $this->db->get('profil_akpol');
		$cari = $this->input->GET('search');
		$isi['cari'] = $this->post_model->cariOrang($cari);
		$isi['hapus_lapor'] = $this->post_model->carihapuslapor($cari);
		
		$this->load->view('tampilan_depan', $isi);
	}
	public function view()
	{
		
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['content'] = 'info';
		$isi['vale']	= $this->db->get('profil_akpol');
		$isi['label'] = 'VIEW';
		$user = $this->session->userdata('username');	
		$kode = $this->session->userdata('kode');	
	
		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		
		$key = $this->uri->segment(3);
		$this->db->where('id',$key);
		$query = $this->db->get('info_akpol');
		if($query->num_rows()>0)
		{
		foreach ($query->result() as $row) {
				$isi['id']				=  $row->id;
				$isi['tema']	=  $row->tema;
				$isi['info']	=  $row->info;
				$isi['tanggal_info']	=  $row->tanggal_info;
				$isi['gambar']	=  $row->gambar;
			}
		} else{
				$isi['id']				=  "";
				$isi['tema']	=  "";
				$isi['info']	=  "";
				$isi['tanggal_info']	=  "";
				$isi['gambar']	=  "";
		}
		$this->load->view('beranda',$isi);
	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */