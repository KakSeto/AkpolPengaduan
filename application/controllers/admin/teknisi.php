<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teknisi extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/teknisi/view';
		$isi['label'] = 'TEKNISI';
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

	

		$this->load->model('admin/model_teknisi');
		$isi['data']=$this->model_teknisi->getdata();
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
				
		$this->db->where('id_teknisi',$key);
		$this->db->delete('teknisi');

		//echo "<script> alert('Sukses'); </script>";
		redirect("admin/teknisi","refresh");


		}else{

		//echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/teknisi","refresh");

		}	
	}


		public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('id_teknisi');
		$data['id_teknisi']	= $this->input->post('id_teknisi');
		$data['NRP']	= $this->input->post('NRP');
		$data['Nama_Teknisi']	= $this->input->post('Nama_Teknisi');
		$data['status_teknisi']	= 'Aktif';
		
		$this->load->model('admin/model_teknisi');
		$this->model_teknisi->getdata();
		$this->db->where('id_teknisi',$key);
		$query	= $this->db->get('teknisi');
		 
			
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);


		if($query->num_rows()>0)
		{
			$this->model_teknisi->getupdate($key,$data);
			//echo "<script>alert('Sukses');</script>";
			redirect("admin/teknisi","refresh");		
		}
		else
		{
			$this->model_teknisi->getinsert($data);
			//echo "<script>alert('Sukses');</script>";
			redirect("admin/teknisi","refresh");	
		}
		
		redirect('admin/admin');
	
	}

		
		public function edit()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('edtid_teknisi');
		$data['NRP']	= ($this->input->post('edtNRP'));
		$data['Nama_Teknisi']	= ($this->input->post('edtNama_Teknisi'));
		$data['status_teknisi']	= ($this->input->post('edtstatus_teknisi'));
		
		$this->load->model('admin/model_teknisi');
		$this->db->where('id_teknisi',$key);
		$query	= $this->db->get('teknisi');
		 
		if($query->num_rows()>0)
		{
			$this->model_teknisi->getupdate($key,$data);
			//echo "<script> alert('Sukses Edit Teknisi'); </script>";
			redirect("admin/teknisi","refresh");	
		}
		else
		{
			$this->model_teknisi->getinsert($data);
		   //	echo "<script> alert('Sukses'); </script>";
			redirect("admin/teknisi","refresh");	
		}
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */