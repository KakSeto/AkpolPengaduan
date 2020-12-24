<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class departemen extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/departemen/view';
		$isi['label'] = 'DEPARTEMEN';
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

	

		$this->load->model('admin/model_departemen');
		$isi['data']=$this->model_departemen->getdata();
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
				
		$this->db->where('id_departemen',$key);
		$this->db->delete('departemen');

		//echo "<script> alert('Sukses'); </script>";
		redirect("admin/departemen","refresh");


		}else{

		//echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/departemen","refresh");

		}	
	}


		public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('id_departemen');
		$data['id_departemen']	= $this->input->post('id_departemen');
		$data['Nama_Departemen']	= $this->input->post('Nama_Departemen');
		$data['status_departemen']	= 'Aktif';
		
		$this->load->model('admin/model_departemen');
		$this->model_departemen->getdata();
		$this->db->where('id_departemen',$key);
		$query	= $this->db->get('departemen');
		 
			
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);


		if($query->num_rows()>0)
		{
			$this->model_departemen->getupdate($key,$data);
			//echo "<script> alert('Sukses'); </script>";
			redirect("admin/departemen","refresh");		
		}
		else
		{

			$this->model_departemen->getinsert($data);
					//echo "<script> alert('Sukses'); </script>";
					redirect("admin/departemen","refresh");	
		}
		
		redirect('admin/admin');
	
	}
	

	public function edit()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('edtid_departemen');
		$data['Nama_Departemen']	= ($this->input->post('edtNama_Departemen'));
		$data['status_departemen']	= ($this->input->post('edtstatus_departemen'));
		
		$this->load->model('admin/model_departemen');
		$this->db->where('id_departemen',$key);
		$query	= $this->db->get('departemen');
		 
		if($query->num_rows()>0)
		{
			$this->model_departemen->getupdate($key,$data);
		//	echo "<script> alert('Sukses Edit Departemen'); </script>";
			redirect("admin/departemen","refresh");	
		}
		else
		{
			$this->model_departemen->getinsert($data);
			//echo "<script> alert('Sukses'); </script>";
			redirect("admin/departemen","refresh");	
		}
	
	}

		

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */