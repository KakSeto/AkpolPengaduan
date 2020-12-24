<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jenis extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/jenis/view';
		$isi['label'] = 'JENIS LAPORAN';
		$this->load->model('admin/model_client');
		// Count
		$isi['pesan_masuk']	= $this->model_client->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_client->pesan_keluar()->num_rows();
		$this->load->model('admin/model_laporan');
		$isi['history']	= $this->model_laporan->history()->num_rows();
	
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		$isi['result']	= $this->model_client->getdataheder();
		$user = $this->session->userdata('username');

		$this->load->model('admin/model_jenis');
		$isi['data']	= $this->model_jenis->getdata();
		$this->load->view('admin/admin',$isi);
	}

	public function hapus()
	{	
		
$level = $this->session->userdata('level');
		if($level== 'Admin'){
			$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
			$isi['history']	= $this->model_laporan->history()->num_rows();
	
		// end
		$isi['result']	= $this->model_laporan->getdataheder();
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['content'] = 'admin/info';
		$isi['label'] = 'Edit-info';
	
$this->model_scurity->getscurity();
	
		$key = $this->uri->segment(4);
				
		$this->db->where('id_jenis',$key);
		$this->db->delete('jenis_laporan');

echo "<script> alert('Sukses'); </script>";

redirect("admin/jenis","refresh");


		}else{

		echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/jenis","refresh");

		}	
	}
		public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('id_jenis');
		$data['id_jenis']	= $this->input->post('id_jenis');
		$data['jenis']	= $this->input->post('jenis');
		
		$this->load->model('admin/model_jenis');
		$this->model_jenis->getdata();
		$this->db->where('id_jenis',$key);
		$query	= $this->db->get('jenis_laporan');
		 
			
			$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);

	


		if($query->num_rows()>0)
		{
			$this->model_jenis->getupdate($key,$data);
							echo "<script> alert('Sukses'); </script>";

			redirect("admin/jenis","refresh");		
		}
		else
		{

			$this->model_jenis->getinsert($data);
					echo "<script> alert('Sukses'); </script>";
	redirect("admin/jenis","refresh");	
		}
		
redirect('admin/admin');
	
	}

		public function edit()
	{
		
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'admin/edit-jenis';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('profil_akpol');
		$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		// end
		$user = $this->session->userdata('username');
		$isi['dataid']	= $this->model_laporan->data_id($user);
		// 

		$isi['result']	= $this->model_laporan->getdataheder();
		$isi['label'] = 'view';
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$this->db->where('id_laporan',$key);
		$query = $this->db->get('laporan');
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
		$this->load->view('admin/admin',$isi);
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */