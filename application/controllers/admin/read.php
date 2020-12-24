<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class read extends CI_Controller {
public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/pesan_keluar/view';
		$isi['label'] = 'LAPORAN KELUAR';
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
		$this->load->model('admin/model_jawab');
		$isi['data']	= $this->model_jawab->viewdata();
		
		
		
		$this->load->view('admin/admin',$isi);
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

	
	public function read_view()
	{
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
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'admin/pesan_keluar/details';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$isi['label'] = 'view';
		
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$this->db->where('id_laporan',$key);

		$this->load->model('admin/model_laporan');
		$isi['gedung'] = $this->model_laporan->getlokasigedung($key);

		$this->load->model('admin/model_laporan');
		$isi['teknisi'] = $this->model_laporan->getteknisi($key);

		$query = $this->db->get('laporan');

		$this->load->model('admin/model_jawab');
		$isi['Nama_Teknisi'] = $this->model_jawab->viewdata();


		if($query->num_rows()== 0){
			
		echo "<script> alert('Maaf , Data tidak Tersedia'); </script>";
			redirect("admin/read","refresh");
		}
		if($query->num_rows()>0)
		{
		foreach ($query->result() as $row) {
				$isi['id_laporan']				=  $row->id_laporan;
				$isi['id_client']	=  $row->id_client;
				$isi['Jenis_Laporan']			=  $row->Jenis_Laporan;
				$isi['Subjek']			=  $row->Subjek;
				$isi['Laporan']			=  $row->Laporan;
				$isi['Jawaban']			=  $row->Jawaban;
				$isi['Nama_Teknisi']			=  $row->Teknisi;
				$isi['Bukti']			=  $row->Bukti;
				$isi['Status']			=  $row->Status;
				$isi['tanggal_lapor']			=  $row->tanggal_lapor;
			}
		} else{
				$isi['id_laporan']				= "";
				$isi['Jawaban']			=  "";
				$isi['id_client']	=  "";
				$isi['Jenis_Laporan']			=  "";
				$isi['Subjek']			=  "";
				$isi['Laporan']			=  "";
		}

			$this->load->view('admin/admin-textarea',$isi);

	}

	
	public function cetak()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/pesan_keluar/cetak';
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
		$this->load->model('admin/model_jawab');
		$isi['data']	= $this->model_jawab->viewdata();
		
		$this->load->view('admin/beranda',$isi);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */