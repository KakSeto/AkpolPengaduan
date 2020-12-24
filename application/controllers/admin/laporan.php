<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/pesan_masuk/view';
		$isi['label'] = 'LAPORAN MASUK';
		//$departemen = $this->session->userdata('Departemen');
		$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		$isi['result']	= $this->model_laporan->getdataheder();
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_laporan->getviewdata();
		
		$this->load->view('admin/admin',$isi);
	}
	function cetak()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/pesan_masuk/cetak';
		$isi['label'] = 'cetak';
		$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		$isi['result']	= $this->model_laporan->getdataheder();
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_laporan->getviewdata();
		$this->load->view('admin/beranda',$isi);
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
		$isi['content'] = 'admin/pesan_masuk/details';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		$user = $this->session->userdata('username');
		$isi['dataid']	= $this->model_laporan->data_id($user);
		// 

		$isi['result']	= $this->model_laporan->getdataheder();
		$isi['label'] = 'view';
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$this->db->where('id_laporan',$key);

		$this->load->model('admin/model_laporan');
		$isi['gedung'] = $this->model_laporan->getlokasigedung($key);

		$query = $this->db->get('laporan');


		if($query->num_rows()== 0){
			
		//echo "<script> alert('Maaf , Data tidak Tersedia'); </script>";
			redirect("admin/laporan","refresh");
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
				$isi['Jawaban']			=  $row->Jawaban;
				$isi['Teknisi']			=  $row->Teknisi;
				$isi['tanggal_lapor']			=  $row->tanggal_lapor;
			}
		} else{
			$isi['id_laporan']				= "";
				$isi['id_client']	=  "";
				$isi['Jenis_Laporan']			=  "";
				$isi['Subjek']			=  "";
				$isi['Laporan']			=  "";
						$isi['Jawaban']			=  $row->Jawaban;
		
		}
		$this->load->model('admin/model_teknisi');
		$isi['namateknisi']	= $this->model_teknisi->get();

	

		

		$this->load->view('admin/admin-textarea',$isi);
	
	}
	
		public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$jawab	= $this->input->post('Jawaban');
		$teknisi = $this->input->post('Teknisi');
		$id['id_admin']	= $this->input->post('dataid');
		// $data['Status']	= 'Sudah Dibaca';
		$isi['content'] = 'admin/view';
		$isi['label'] = 'view';
		
		$this->load->model('admin/model_jawab');
		$this->model_jawab->getdata($key);
		$query	= $this->db->get('laporan');
		 
		if($query->num_rows()>0)
		{
			$this->model_jawab->getupdate($key,$jawab,$teknisi);
			$this->model_jawab->getupdateid($key,$id);
		
	//	echo "<script> alert('Sukses'); </script>";
    redirect("admin/laporan","refresh",$isi);
  
    		}
		else
		{
			$this->model_jawab->getinsert($data);
			redirect('admin/admin');
	
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */