<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/home';
		$isi['label'] = 'Beranda';
		$this->load->model('admin/model_laporan');
		// Count
		$isi['pesan_masuk']	= $this->model_laporan->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_laporan->pesan_keluar()->num_rows();
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end

		// Profil
		$isi['kode'] = 'Beranda';


		// 

		// Beranda
		$this->load->model('model_users');
			$isi['data']	= $this->db->get('profil_akpol');
		$isi['vale']= $this->db->get('info_akpol');
		$isi['cover']= $this->db->get('cover');
		
	$this->load->model('admin/model_client');
		$isi['info']= $this->model_client->info();
		// 
		$user = $this->session->userdata('username');
		$isi['result']	= $this->model_laporan->getdataheder();
		$this->load->view('admin/admin',$isi);
	}

public function update ()
 {
	$this->model_scurity->getscurity();
		$key = $this->session->userdata('kode');
		$data['username']	= $this->input->post('username');
		$data['Nama']	= $this->input->post('Nama');
		$data['Email']	= $this->input->post('Email');
		$data['Nohp']	= $this->input->post('Nohp');
		$data['password']	= md5($this->input->post('password'));
		$data['sandi']	= $this->input->post('password');
		
		
		$this->load->model('admin/model_client');
		$this->db->where('id',$key);
		$query	= $this->db->get('users');
		 
		if($query->num_rows()>0)
		{
			$this->model_client->getupdate($key,$data);
			echo "<script> alert('Sukses , Harap Login Kembali'); </script>";
			redirect('authentication/auth/login','refresh');
	
		}
		else
		{
			$this->model_client->getinsert($data);
					echo "<script> alert('Sukses'); </script>";
	redirect("admin/home","refresh");	
		}
	}
	


	public function simpan()
  {
    
    if(isset($_POST ['register'])) {
      $this->form_validation->set_rules('nama', 'nama', 'required');

      //jika validasi ok
      if ($this->form_validation->run()== true) {
        echo "<script> alert('Sukses, Silahkan Login'); </script>";

// Untuk Masuk ke Table Users
      $vale = array(
        'id' => time() ,
        'username' =>$_POST['username'] ,
        'password' =>md5($_POST['password']) ,
        'level' =>'Admin' ,
       'nama' =>$_POST['nama'] ,
        'sandi' =>$_POST['password'] ,
        'email' =>$_POST['email'] ,
        'alamat' =>$_POST['Alamat'] ,
        'nohp' =>$_POST['Nohp'] ,
         'status' =>'0',
        'Jenis_kelamin' =>$_POST['Jenis_kelamin'] ,

      );
            $this->load->model('model_users');
        $val =  $this->model_users->inset($vale);
  
       echo "<script> alert('Sukses'); </script>";
 redirect("admin/admin/data","refresh",$vale);
      }
    }
  $this->load->view('admin/admin');
     }



public function data()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin/list-admin';
		$isi['label'] = 'CLIENT';
		$this->load->model('admin/model_client');
		// Count
		$isi['pesan_masuk']	= $this->model_client->pesan_masuk()->num_rows();
		$isi['pesan_keluar']	= $this->model_client->pesan_keluar()->num_rows();
			$this->load->model('admin/model_laporan');
		$isi['admin']	= $this->model_laporan->admin()->num_rows();
		$isi['client']	= $this->model_laporan->client()->num_rows();
		$isi['history']	= $this->model_laporan->history()->num_rows();
	
		// end
		$isi['result']	= $this->model_client->getdataheder();
		$user = $this->session->userdata('username');
		$isi['data']	= $this->model_client->getviewdataadmin();
		
		$this->load->view('admin/admin',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy ();
		redirect('authentication/auth/login');
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */