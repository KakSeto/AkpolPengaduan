<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tambah extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$this->load->model('admin/model_info');
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_info->getdatainfo($user);
		$isi['content'] = 'admin/tambah_info_akpol';
		$isi['vale'] = 	$isi['vale']	= $this->db->get('info_akpol');
	
		$isi['label'] = 'TAMBAH';
		$this->load->view('admin/admin',$isi);
	}
	public function edit()
	{	
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['content'] = 'admin/info';
		$isi['label'] = 'Edit-info';
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		
		$this->db->where('id',$key);
		$query = $this->db->get('info_akpol');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) {
				$isi['id']				=  $row->id;
				$isi['tema']	=  $row->tema;
				$isi['ino']			=  $row->info;
				$isi['tanggal_info']			=  $row->tanggal_info;
		
			}
		} else{
			$isi['id']				= "";
				$isi['tema']	=  "";
				$isi['info']			=  "";
				$isi['tanggal_info']			=  "";
		
		}
		$this->load->view('admin/beranda',$isi);
		
	}

	public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$data['tema']	= $this->input->post('tema');
		$data['info']	= $this->input->post('info');
		
		$this->load->model('admin/model_info');
		$this->model_info->getdata($key);
		$query	= $this->db->get('info_akpol');
		 
		if($query->num_rows()>0)
		{
			$this->model_info->getupdate($key,$data);
							echo "<script> alert('Sukses'); </script>";

redirect("admin/info","refresh");

	
		}
		else
		{
			$this->model_info->getinsert($data);
					echo "<script> alert('Sukses'); </script>";
redirect('admin/info');
	
		}
		
redirect('admin/info');
	
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */