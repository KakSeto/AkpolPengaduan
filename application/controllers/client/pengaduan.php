<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaduan extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$this->load->model('model_pengaduan');
		$user = $this->session->userdata('username');
		$kode = $this->session->userdata('kode');	
	
		$isi['valu']	= $this->model_pengaduan->getviewdataid($user);
		$isi['data']	= $this->model_pengaduan->getviewdata($user);
		$isi['content'] = 'client/pesan_masuk/view';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$isi['jenis']	= $this->model_pengaduan->getdatajenis();
		$isi['gedung']	= $this->model_pengaduan->getdatagedung();
		$isi['tujuan']	= $this->model_pengaduan->getdatadepartemen();	
		
		$this->load->model('admin/model_laporan');
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masukclient($user)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluarclient($user)->num_rows();
		$isi['histori']	= $this->model_laporan->historyclient($kode)->num_rows();

		
		
		$isi['label'] = 'PENGADUAN KU';
	
		$this->load->view('client/client',$isi);
		
	}

public function tambah()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'client/compose';
		$isi['label'] = 'PENGADUAN BARU';
		$user = $this->session->userdata('username');
		$this->load->model('model_compose');
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$isi['data']	= $this->model_compose->getviewdata($user);
		$isi['jenis']	= $this->model_compose->getdatajenis();
		$isi['gedung']	= $this->model_compose->getdatagedung();
		$isi['tujuan']	= $this->model_compose->getdatadepartemen();	

	
		
//		
		$nmfile = $user.time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = './uploads/';
		$config['file_name'] = $nmfile; //nama yang terupload nantinya
		$config['allowed_types'] = 'gif|jpg|png|docx|zip|rar';
		$config['max_size']	= '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
				$key = $this->uri->segment(4);
		
		$this->load->library('upload', $config);
// 

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			// $this->load->view('upload_form', $error);
		} 
		else
		{
	
			$data = array('upload_data' => $this->upload->data());
	$gbr = $this->upload->data();
		
			// $this->load->view('upload_success', $data);
		}
			

if(isset($_POST ['simpan'])) {
			$this->form_validation->set_rules('id_laporan', 'id_laporan', 'required');
error_reporting(0);
			//jika validasi ok
			if ($this->form_validation->run()== true) {
			//echo "<script> alert('Suksessssss'); </script>";

			// FORM OK
			$data = array(
				'id_laporan' =>$_POST['id_laporan'] ,
				'id_client' =>$_POST['id_client'] ,
				'Jenis_laporan' =>$_POST['Jenis'] ,


				//subjek = lokasi
				'Subjek' =>$_POST['Lokasi'] ,
				'Tujuan' =>$_POST['Tujuan'] ,
				'laporan' =>$_POST['Laporan'] ,
				'tanggal_lapor' =>date('Y-m-d') ,
				'Status' =>'Belum Dibaca' ,
				'status_keadaan' => '1',
				 'bukti' => $gbr['file_name'],

				 );
				$this->db->insert('laporan',$data);
				$this->session->set_flashdata("SUCCESS","Akun ada berhasil di buat");
				redirect("client/pengaduan","refresh");
			}
		}
				$this->load->view('client/client',$isi);
}

public function cetak()
	{
		$this->model_scurity->getscurity();
		$this->load->model('model_pengaduan');
		$user = $this->session->userdata('username');
		$kode = $this->session->userdata('kode');	
	
		$isi['valu']	= $this->model_pengaduan->getviewdataid($user);
		$isi['data']	= $this->model_pengaduan->getviewdata($user);
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
public function view()
	{
		
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'client/pesan_masuk/details';
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

		$queri = $this->model_laporan->getlokasigedung($key);
		$isi['gedung'] = $queri;

		$isi['tujuan']	= $this->model_laporan->getdatadepartemen($key);	


		$this->db->where('id_laporan',$key);
		$query = $this->db->get('laporan');
		if($query->num_rows()== 0){
			
		echo "<script> alert('Maaf , Data tidak Tersedia'); </script>";
			redirect("client/pengaduan","refresh");
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
				$isi['Status']			=  $row->Status;
				$isi['tanggal_lapor']			=  $row->tanggal_lapor;
			}
		} else{
			$isi['id_laporan']				= "";
				$isi['id_client']	=  "";
				$isi['Jenis_Laporan']			=  "";
				$isi['Subjek']			=  "";
				$isi['Laporan']			=  "";
		}
		$this->load->view('client/client',$isi);
	
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */