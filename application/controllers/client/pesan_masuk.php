<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pesan_masuk extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$this->load->model('model_pengaduan');
		$user = $this->session->userdata('username');
			$kode = $this->session->userdata('kode');	
	
		$isi['data']	= $this->model_pengaduan->getdatareadbox($user);
		$isi['content'] = 'client/pesan_keluar/view';
		$isi['vale'] = $this->db->get('profil_akpol');
	
		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		$isi['label'] = 'PESAN MASUK';
		$this->load->view('client/client',$isi);
	}
		public function struck()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/print';
		$isi['label'] = 'BERANDA';
		$isi['vale']	= $this->db->get('profil_akpol');
	
		//  
		$cari = $this->uri->segment(4);
			$this->load->model('post_model');
	
		$isi['hapus_lapor'] = $this->post_model->carihapuslapor($cari);	
		$isi['cari'] = $this->post_model->cariOrang($cari);
		$this->load->view('admin/beranda',$isi);
	}
	public function cetak()
	{
		$this->model_scurity->getscurity();
		$this->load->model('model_pengaduan');
		$user = $this->session->userdata('username');
		$kode = $this->session->userdata('kode');	
	
		$isi['valu']	= $this->model_pengaduan->getviewdataid($user);
		$isi['data']	= $this->model_pengaduan->getdatareadbox($user);
		$isi['content'] = 'client/cetak';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$isi['jenis']	= $this->model_pengaduan->getdatajenis();	
		
	$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		
		
		$isi['label'] = 'PENGADUAN KU';
	
		$this->load->view('client/client',$isi);
		
	}	
	public function view()
	{
		$user = $this->session->userdata('username');	
		$kode = $this->session->userdata('kode');	
	
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'client/pesan_keluar/details';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$isi['label'] = 'view';
		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();
		

		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$this->db->where('id_laporan',$key);
// Read

		$this->load->model('admin/model_jawab');
		$queri = $this->model_jawab->getdataview($key);
		$isi['jawab'] = $queri;
		$query = $this->db->get('laporan');
		if($query->num_rows()== 0){
			
		echo "<script> alert('Maaf , Data tidak Tersedia'); </script>";
			redirect("client/pesan_masuk","refresh");
		}
		if($query->num_rows()>0)
		{
		foreach ($query->result() as $row) {
				$isi['id_laporan']				=  $row->id_laporan;
				$isi['id_client']	=  $row->id_client;
				$isi['Jenis_Laporan']			=  $row->Jenis_Laporan;
				$isi['Subjek']			=  $row->Subjek;
				$isi['Laporan']			=  $row->Laporan;
				$isi['Bukti']			=  $row->Bukti;
				$isi['Jawaban']			=  $row->Jawaban;
				$isi['Teknisi']			=  $row->Teknisi;
				$isi['Status']			=  $row->Status;

				$isi['tanggal_lapor']			=  $row->tanggal_lapor;
			}
		} else{
					echo "<script> alert('Maaf , Data Tidak Tersedia'); </script>";

				redirect("client/pesan_masuk","refresh");
 
		}


		$this->load->view('client/beranda',$isi);
	
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */