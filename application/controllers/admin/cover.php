<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cover extends CI_Controller {

	public function edit()
	{	
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['content'] = 'admin/cover/edit';
		$isi['label'] = 'Edit-info';
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		
		$this->db->where('id',$key);
		$query = $this->db->get('cover');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) {
				$isi['id']				=  $row->id;
				$isi['cover']	=  $row->cover;
				$isi['waktu']			=  $row->waktu;
		
			}
		} else{
			$isi['id']				=  "";
				$isi['cover']	=  "";
				$isi['waktu']			=  "";
		
		}
		$this->load->view('admin/beranda',$isi);
		
	}
public function simpan()
	{
		$this->model_scurity->getscurity();
		$user = $this->session->userdata('username');
		
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
			$this->form_validation->set_rules('id_cover', 'id_cover', 'required');
error_reporting(0);
			//jika validasi ok
			if ($this->form_validation->run()== true) {
				echo "<script> alert('Sukses'); </script>";

			// FORM OK
			$data = array(
				'id_cover' =>time() ,
				 'cover' => $gbr['file_name'],
		 'tittle' => $this->input->post('tittle'),
				'waktu'	=> date('Y-m-d'),

				 );
				$this->db->update('cover',$data);
				 $this->db->where('id_cover',$key);
				$this->session->set_flashdata("SUCCESS");
				redirect("admin/info","refresh");
			}
		}
				redirect("admin/info","refresh");
}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */