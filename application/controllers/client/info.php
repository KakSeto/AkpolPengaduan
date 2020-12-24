<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class info extends CI_Controller {

public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'client/home';
		$isi['label'] = 'BERANDA';
		$isi['cover']= $this->db->get('cover');
	
	$user = $this->session->userdata('username');
		$kode = $this->session->userdata('kode');	
	
		$isi['info']= $this->db->get('info_akpol');
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
	

		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		$this->load->view('client/client',$isi);
	}

public function view()
	{
		
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'client/info/view';
		$isi['vale']	= $this->db->get('profil_akpol');
		$isi['label'] = 'VIEW';
		$user = $this->session->userdata('username');	
		$kode = $this->session->userdata('kode');	
	
		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$this->db->where('id',$key);
		$query = $this->db->get('info_akpol');
	if($query->num_rows()== 0){
			
		echo "<script> alert('Maaf , Data tidak Tersedia'); </script>";
			redirect("client/info","refresh");
		}
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
		$this->load->view('client/client',$isi);
	
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */