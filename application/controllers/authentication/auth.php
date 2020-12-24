<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

public function index (){
  
  $this->load->model('admin/model_departemen');
  $isi['namadepartemen']	= $this->model_departemen->get();
  redirect("authentication/auth/login","refresh",$isi);
}
  


public function cekAkun()
{
    //load model_users
    $this->load->model('model_users');

    //membuat validasi login
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->model_users->cekAkun($username, $password);

    if ($query === 1) {
      return "User Tidak Ditemukan!";
    }
    else if ($query === 3) {
      return "Password Salah!";
    }
    else {
      //membuat session dengan nama userdata
      $userData = array(
        'username' => $query->username,
        'kode' => $query->id,
        'level' => $query->level,
        'Nama' => $query->Nama,
        'Email' => $query->Email,
        'sandi' => $query->sandi,
        'Nohp' => $query->Nohp,
        'Departemen' => $query->Departemen,
      );
      $this->session->set_userdata($userData);
      return TRUE;
     }
  }


  public function daftar()
  {
     $this->load->model('admin/model_departemen');
     $isi['namadepartemen']	= $this->model_departemen->get();
     $this->load->view('authentication/daftar',$isi);
    }

  public function gantipass()
  {
     $this->load->view('authentication/gantipass');
    }


public function simpan()
  {
    $this->load->model('admin/model_departemen');
		$isi['namadepartemen']	= $this->model_departemen->get();
    
    if(isset($_POST ['register'])) {
      $this->form_validation->set_rules('nama', 'nama', 'required');

      //jika validasi ok
      $this->load->model('model_users');
    $username = $this->input->post('username');
   // $query = $this->model_users->cek($username);
  $query = $this->model_users->cek($username)->num_rows();
     // Pengecekan Username , Email , No Handphone
    if(($query) > 0) {
        echo "<script> alert('Mohon Maaf ,Username Sudah Ada di Database Kami !'); </script>";
        redirect("authentication/auth/login","refresh");
  } else {    

      if ($this->form_validation->run()== true) {
        echo "<script> alert('Sukses, Silahkan Login'); </script>";

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
         'status_keadaan' => '1',
        'Departemen' =>$_POST['Departemen'] ,

      );
        $this->load->model('model_users');
        $val =  $this->model_users->inset($vale);
        
  
        $this->session->set_flashdata("SUCCESS","Akun ada berhasil di buat");
        redirect("authentication/auth/login","refresh",$vale);
      }
    }
  } 
  $this->load->view('authentication/auth/login',$isi);
     }


  public function gantipassword()
  {

    
  }


public function login()
  {
    //melakukan pengalihan halaman sesuai dengan levelnya
    // if ($this->session->userdata('level') == "karyawan"){redirect('karyawan/karyawan');}
    // if ($this->session->userdata('level') == "manager"){redirect('manager/manager');}

    //proses login dan validasi nya
    if ($this->input->post('submit')) {
      $this->load->model('model_users');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $error = $this->cekAkun();
      if ($this->form_validation->run() && $error === TRUE) {
        $data = $this->model_users->cekAkun($this->input->post('username'), $this->input->post('password'));

        //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
        if($data->level == 'Admin'){

        $usr = $this->input->post('username');
       $this->model_users->status($usr);
          redirect('admin/home');
        }
        else if($data->level == 'Admin2'){

          $usr = $this->input->post('username');
         $this->model_users->status($usr);
            redirect('admin2/home');
          }

        else if($data->level == 'Client'){
        $usr = $this->input->post('username');
       $this->model_users->status($usr);
          redirect('client/pengaduan');
        }
      }

      //Jika bernilai FALSE maka tampilkan error
      else{
        $data['error'] = $error;
        $this->load->view('authentication/login', $data);
      }
    }
    //Jika tidak maka alihkan kembali ke halaman login
    else{
      $this->load->view('authentication/login');
    }
  }
public function logout()
  {
    //Menghapus semua session (sesi)
    $this->session->sess_destroy();
    $this->load->model('model_users');
    $usr = $this->input->post('username');
       $this->model_users->statuslogout($usr);
     
    redirect('authentication/auth/login');
  }
}




 


