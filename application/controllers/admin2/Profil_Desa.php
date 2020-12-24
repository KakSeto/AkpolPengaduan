<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil_akpol extends CI_Controller {

	public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('username');
		$data['Nama_instansi']	= $this->input->post('Nama_instansi');
		$data['Visi_misi']	= $this->input->post('Visi_misi');
		$data['No_hp']	= $this->input->post('No_hp');
		$data['website']	= $this->input->post('website');
 
		$this->load->model('admin/model_desa');
		$this->model_desa->getdata($key);
		$query	= $this->db->get('profil_akpol');
		 
		if($query->num_rows()>0)
		{
			$this->model_desa->getupdate($key,$data);
							echo "<script> alert('Sukses'); </script>";

	redirect("admin/info","refresh");		
		}
		else
		{
			$this->model_desa->getinsert($data);
					echo "<script> alert('Sukses'); </script>";
	redirect("admin/info","refresh");	
		}
		
redirect('admin/admin');
	
	}

	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */