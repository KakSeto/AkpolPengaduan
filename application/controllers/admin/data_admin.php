<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_admin extends CI_Controller {

public function index()
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
		$isi['hapus']	= $this->model_laporan->history_laporan()->num_rows();
	
		// end
		$isi['result']	= $this->model_client->getdataheder();
		$user = $this->session->userdata('username');
    $isi['data']	= $this->model_client->getviewdataadmin();
    
    $this->load->model('admin/model_departemen');
    $isi['namadepartemen']	= $this->model_departemen->get();
		
		$this->load->view('admin/admin',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy ();
		redirect('authentication/auth/login');
	}

  public function edit(){

    $this->model_scurity->getscurity();
    $key = $this->input->post('kode');
    $key = $this->input->post('kode');
    $data['username'] = $this->input->post('username');
    $data['password'] = md5($this->input->post('password'));
    $data['nama'] = $this->input->post('nama');
    $data['alamat'] = $this->input->post('alamat');
    $data['email']  = $this->input->post('email');
    $data['departemen'] = $this->input->post('departemen');
    $data['nohp'] = $this->input->post('nohp');
    
    $this->load->model('admin/model_client');
    $this->db->where('id',$key);
    $query  = $this->db->get('users');
     
    if($query->num_rows()>0)
    {
      $this->model_client->getupdate($key,$data);
     // echo "<script> alert('Sukses Edit Admin'); </script>";
      redirect("admin/data_admin","refresh"); 
    }
    else
    {
      $this->model_client->getinsert($data);
         // echo "<script> alert('Sukses'); </script>";
      redirect("admin/data_admin","refresh"); 
    }
  
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
        redirect("admin/data_admin","refresh");
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
  
       //echo "<script> alert('Sukses'); </script>";
 redirect("admin/data_admin","refresh",$vale);
      }
    }
  $this->load->view('admin/admin');
     }

}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */