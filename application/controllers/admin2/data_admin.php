<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_admin extends CI_Controller {

public function index()
	{
		$this->model_scurity->getscurity();
		$isi['content'] = 'admin2/list-admin';
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
		$isi['data']	= $this->model_client->getviewdataadmin($departemen);
		
		$this->load->view('admin2/admin',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy ();
		redirect('authentication/auth/login');
	}


	public function simpan()
  {
      $this->load->model('model_users');
    $username = $this->input->post('username');
   // $query = $this->model_users->cek($username);
  $query = $this->model_users->cek($username)->num_rows();
     // Pengecekan Username , Email , No Handphone
    if(($query) > 0) {
        echo "<script> alert('Mohon Maaf ,Username Sudah Ada di Database Kami !'); </script>";
        redirect("admin2/data_admin","refresh");
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
        'level' =>'Admin2' ,
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
  
       echo "<script> alert('Sukses'); </script>";
 redirect("admin2/data_admin","refresh",$vale);
      }
    }
  $this->load->view('admin2/admin');
     }

}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */