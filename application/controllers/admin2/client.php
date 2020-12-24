<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class client extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin2/client/view';
		$isi['label'] = 'CLIENT';
		$departemen = $this->session->userdata('Departemen');
		$this->load->model('admin2/model_client');

		// Count
		$isi['pesan_masuk']	= $this->model_client->pesan_masuk($departemen)->num_rows();
		$isi['pesan_keluar']	= $this->model_client->pesan_keluar($departemen)->num_rows();
		$this->load->model('admin2/model_laporan');
		$isi['admin']	= $this->model_laporan->admin($departemen)->num_rows();
		$isi['client']	= $this->model_laporan->client($departemen)->num_rows();
		$isi['history']	= $this->model_laporan->history($departemen)->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan($departemen)->num_rows();
	
		// end
		$isi['result']	= $this->model_client->getdataheder($departemen);
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_client->getviewdata($departemen);
		
		$this->load->view('admin2/admin',$isi);
	}

	public function history()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin2/history/view';
		$isi['label'] = 'HISTORY';
		$departemen = $this->session->userdata('Departemen');
		$this->load->model('admin2/model_client');
		// Count
		$isi['pesan_masuk']	= $this->model_client->pesan_masuk($departemen)->num_rows();
		$isi['pesan_keluar']	= $this->model_client->pesan_keluar($departemen)->num_rows();
		$this->load->model('admin2/model_laporan');
		$isi['admin']	= $this->model_laporan->admin($departemen)->num_rows();
		$isi['client']	= $this->model_laporan->client($departemen)->num_rows();
		$isi['history']	= $this->model_laporan->history($departemen)->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan($departemen)->num_rows();
			// end
		$isi['result']	= $this->model_client->getdataheder($departemen);
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_client->getviewdatahistory($departemen);
		
		$this->load->view('admin2/admin',$isi);
	}



	public function simpan()
  {
  	$departemen = $this->session->userdata('Departemen');

  	  $this->load->model('model_users');
    $username = $this->input->post('username');
   // $query = $this->model_users->cek($username);
  $query = $this->model_users->cek($username)->num_rows();
     // Pengecekan Username , Email , No Handphone
    if(($query) > 0) {
        echo "<script> alert('Mohon Maaf ,Username Sudah Ada di Database Kami !'); </script>";
        redirect("admin2/client","refresh");
  } else {    
    
    if(isset($_POST ['register'])) {
      $this->form_validation->set_rules('nama', 'nama', 'required');

      //jika validasi ok
      if ($this->form_validation->run()== true) {

// Untuk Masuk ke Table Users
      $vale = array(
        'id' => time() ,
        'username' =>$_POST['username'] ,
        'password' =>md5($_POST['password']) ,
        'level' =>'Client' ,
       'nama' =>$_POST['nama'] ,
        'sandi' =>$_POST['password'] ,
        'email' =>$_POST['email'] ,
        'alamat' =>$_POST['Alamat'] ,
        'nohp' =>$_POST['Nohp'] ,
         'status' =>'0',
         'status_keadaan' =>'1',
        'Departemen' =>$_POST['Departemen'] ,

      );
            $this->load->model('model_users');
        $val =  $this->model_users->inset($vale);
  
//echo "<script> alert('Sukses'); </script>";
        redirect("admin2/client","refresh",$vale);
      }
    }
  $this->load->view('admin2/admin');
     }
}


	public function edit(){

		$this->model_scurity->getscurity();
		$key = $this->input->post('kode');
		$key = $this->input->post('kode');
		$data['username']	= $this->input->post('username');
		$data['password']	= md5($this->input->post('password'));
		$data['nama']	= $this->input->post('nama');
		$data['alamat']	= $this->input->post('alamat');
		$data['email']	= $this->input->post('email');
		$data['departemen']	= $this->input->post('departemen');
		$data['nohp']	= $this->input->post('nohp');
		
		$this->load->model('admin2/model_client');
		$this->db->where('id',$key);
		$query	= $this->db->get('users');
		 
		if($query->num_rows()>0)
		{
			$this->model_client->getupdate($key,$data);
			echo "<script> alert('Sukses Edit User'); </script>";
			redirect("admin2/client","refresh");	
		}
		else
		{
			$this->model_client->getinsert($data);
					echo "<script> alert('Sukses'); </script>";
			redirect("admin2/client","refresh");	
		}
	
	}
	
	public function hapus()
	{	
				$departemen = $this->session->userdata('Departemen');
				$level = $this->session->userdata('level');
				
				if($level== 'Admin2'){
					$this->load->model('admin2/model_laporan');
				// Count
				$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk($departemen)->num_rows();
				$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar($departemen)->num_rows();
				// end
				$isi['result']	= $this->model_laporan->getdataheder($departemen);
				$isi['data']	= $this->db->get('profil_akpol');
				$isi['content'] = 'admin2/info';
				$isi['label'] = 'Edit-info';
				$data['status_keadaan'] = '0';
				$data['status']='0';
				$this->model_scurity->getscurity();
				$key = $this->uri->segment(4);
				

				$this->db->where('id',$key);
					$this->db->update('users',$data);
						
			
				//echo "<script> alert('Sukses Hapus'); </script>";
				redirect("admin2/client","refresh");
			

				}else{

				// echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
					redirect("admin2/info","refresh");
		}
	}


	public function hapus_history()
	{	

///

$level = $this->session->userdata('level');
		$departemen = $this->session->userdata('Departemen');
		if($level== 'Admin2'){
			$this->load->model('admin2/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk($departemen)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar($departemen)->num_rows();
		// end
		$isi['result']	= $this->model_laporan->getdataheder($departemen);
		$isi['data']	= $this->db->get('profil_akpol');
		$isi['content'] = 'admin2/info';
		$isi['label'] = 'Edit-info';
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		
		$this->db->where('id',$key);
		$this->db->delete('users');
	
//echo "<script> alert('Sukses'); </script>";

redirect("admin2/client/history","refresh");

		}else{

		// echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin2/info","refresh");
		}


		
	}
	public function restore()
	{	

$level = $this->session->userdata('level');

		$departemen = $this->session->userdata('Departemen');	
		if($level== 'Admin2'){
			$this->load->model('admin2/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk($departemen)->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar($departemen)->num_rows();
		// end
		$isi['result']	= $this->model_laporan->getdataheder($departemen);
		
		$data['status_keadaan'] = '1';
		$isi['content'] = 'admin2/info';
		$isi['label'] = 'Edit-info';
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		
		$this->db->where('id',$key);
		$this->db->update('users',$data);
	
echo "<script> alert('Sukses'); </script>";

redirect("admin2/client/history","refresh");

		}else{

		// echo "<script> alert('Maaf , Data tidak Kami Temukan'); </script>";
			redirect("admin2/info","refresh");
		}


		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */