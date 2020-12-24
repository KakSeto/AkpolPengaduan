<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Model_users extends CI_Model {

    //mengambil tabel users
    public $table = 'users';

public function inset($vale)
  {
            $this->db->insert('users',$vale);
     
  }
  
public function status($usr)
  {
    $data = "UPDATE `pengaduanakpol`.`users` SET `status`='1' WHERE  `username`='$usr';";
    
  return $this->db->query($data);
   
  }

public function aktif()
  {
    $data = "SELECT * FROM users where status='1' and level = 'Admin' ";
    
  return $this->db->query($data);
   
  }



public function statuslogout($usr)
  {
    $data = "UPDATE `pengaduanakpol`.`users` SET `status`='0' WHERE  `username`='$usr';";
    
  return $this->db->query($data);
   
  }

    public function cekAkun($username, $password)
    {
      //cari username lalu lakukan validasi
      $this->db->where('username', $username);
      $query = $this->db->get($this->table)->row();

      //jika bernilai 1 maka user tidak ditemukan
      if (!$query) return 1;


      //jika bernilai 3 maka password salah
      $hash = $query->password;
      if (md5($password) != $hash) return 3;

      return $query;
    }

  }