<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class info extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
			$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		$isi['result']	= $this->model_laporan->getdataheder();
		$isi['hitung']	= $this->model_laporan->gethitung()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		$this->load->model('admin/model_info');
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_info->getdatainfo($user);
		// modelSELECT COUNT(*) AS JUMLAH FROM profil_akpol;
		$isi['cover']	= $this->db->get('cover');
		$isi['profil']	= $this->model_laporan->gethitung();
		// 
		$isi['content'] = 'admin/info/view';
		$isi['vale']= $this->db->get('info_akpol');
		$isi['label'] = 'INFO DESA';
		$this->load->view('admin/admin-textarea',$isi);
	}

public function view()
	{
		
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'client/info/view';
		$isi['vale']	= $this->db->get('profil_akpol');
		$isi['label'] = 'VIEW';
		$user = $this->session->userdata('username');	
		$kode = $this->session->userdata('kode');	
		$this->model_scurity->getscurity();
			$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		$isi['result']	= $this->model_laporan->getdataheder();
		$isi['hitung']	= $this->model_laporan->gethitung()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		
		$key = $this->uri->segment(4);
		$this->db->where('id',$key);
		$query = $this->db->get('info_akpol');
if($query->num_rows()==0){
			
		echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/info","refresh");
		}
		if($query->num_rows()>0)
		{
		foreach ($query->result() as $row) {
				$isi['id']				=  $row->id;
				$isi['tema']	=  $row->tema;
				$isi['info']	=  $row->info;
				$isi['tanggal_info']	=  $row->tanggal_info;
				$isi['gambar']	=  $row->gambar;
			}
		} else{
				$isi['id']				=  "";
				$isi['tema']	=  "";
				$isi['info']	=  "";
				$isi['tanggal_info']	=  "";
				$isi['gambar']	=  "";
		}
		$this->load->view('admin/admin',$isi);
	
	}
	
	public function edit()
	{	
			$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
	
		// end
		$isi['result']	= $this->model_laporan->getdataheder();
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
		// end
		$isi['result']	= $this->model_laporan->getdataheder();
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['content'] = 'admin/info';
		$isi['label'] = 'Edit-info';
			
			$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);

		$this->db->where('id',$key);		
		$this->db->delete('info_akpol');
		$query = $this->db->get('info_akpol');
echo "<script> alert('Sukses'); </script>";

redirect("admin/info","refresh");


		}else{

		// echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/info","refresh");
		}


		
	}

	public function simpan()
	{
		$this->model_scurity->getscurity();
		$key = $this->input->post('kode');
		$data['tema']	= $this->input->post('tema');
		$data['info']	= $this->input->post('info');
		
		$this->load->model('admin/model_info');
		$this->model_info->getdata($key);
		$query	= $this->db->get('info_akpol');
		 
		if($key== NUll){
			
		echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin/info","refresh");
		}

		if($query->num_rows()>0)
		{
			$this->model_info->getupdate($key,$data);
			echo "<script> alert('Bagus'); </script>";

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

	
	public function tambah()
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

			

if(isset($_POST ['register'])) {
			$this->form_validation->set_rules('tema', 'tema', 'required');
error_reporting(0);
			//jika validasi ok
			if ($this->form_validation->run()== true) {
				echo "<script> alert('Sukses'); </script>";

			// FORM OK
			$data = array(
				'id' =>time() ,
				'tema' =>$_POST['tema'] ,
				'info' =>$_POST['info'] ,
				'link' =>$_POST['link'] ,
				 'gambar' => $gbr['file_name'],

				 );
				$this->db->insert('info_akpol',$data);
				$this->session->set_flashdata("SUCCESS","Akun ada berhasil di buat");
				redirect("admin/info","refresh");
			}
		}
		echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
				redirect("admin/info","refresh");
}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */