<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gedung extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/gedung/view';
		$isi['label'] = 'GEDUNG';
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

		$this->load->model('admin/model_gedung');
		$isi['data']	= $this->model_gedung->getdata();
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
				
		$this->db->where('id_gedung',$key);
		$this->db->delete('gedung');

//echo "<script> alert('Sukses'); </script>";

redirect("admin/gedung","refresh");


		}else{

		//echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/gedung","refresh");

		}	
	}
		public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('id_gedung');
		$data['id_gedung']	= $this->input->post('id_gedung');
		$data['nama_gedung']	= $this->input->post('nama_gedung');
		$data['alamat_gedung']	= $this->input->post('alamat_gedung');
		
		$this->load->model('admin/model_gedung');
		$this->model_gedung->getdata();
		$this->db->where('id_gedung',$key);
		$query	= $this->db->get('gedung');
		 
			
			$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);

	


		if($query->num_rows()>0)
		{
			$this->model_gedung->getupdate($key,$data);
							//echo "<script> alert('Sukses'); </script>";

			redirect("admin/gedung","refresh");		
		}
		else
		{

			$this->model_gedung->getinsert($data);
					//echo "<script> alert('Sukses'); </script>";
	redirect("admin/gedung","refresh");	
		}
		
redirect('admin/admin');
	
	}

	public function edit()
	{
		
		$this->model_scurity->getscurity();
		$key = $this->input->post('edtid_gedung');
		$data['nama_gedung']	= ($this->input->post('edtnama_gedung'));
		$data['status_gedung']	= ($this->input->post('edtstatus_gedung'));
		
		$this->load->model('admin/model_gedung');
		$this->db->where('id_gedung',$key);
		$query	= $this->db->get('gedung');
		 
		if($query->num_rows()>0)
		{
			$this->model_gedung->getupdate($key,$data);
			//echo "<script> alert('Sukses Edit Info Gedung'); </script>";
			redirect("admin/gedung","refresh");	
		}
		else
		{
			$this->model_gedung->getinsert($data);
			//echo "<script> alert('Sukses'); </script>";
			redirect("admin/gedung","refresh");	
		}
	
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */