<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_pengaduan extends CI_model {
    public function getviewdataid($user)
    {
            $data = "
SELECT * FROM users where users.username ='$user' 
     ;";
        
    return $this->db->query($data);

        }
    
	public function getviewdata($user)
	{
			$data = "
SELECT
    laporan.id_laporan
    , jenis_laporan.Jenis
    , laporan.tanggal_lapor
    , laporan.Status
    , users.username
FROM
    jenis_laporan
    RIGHT JOIN laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    RIGHT JOIN users 
        ON (users.id = laporan.id_client)
          where laporan.`Status`='Belum Dibaca' and users.username = '$user'
                       order by laporan.tanggal_lapor DESC

          ;

     ;";
		
	return $this->db->query($data);

		}
    public function getdatahistory($kode)
  {
      $data = "
SELECT
    laporan.id_laporan
    , jenis_laporan.Jenis
    , laporan.tanggal_lapor
    , laporan.Status
    , users.username
FROM
    jenis_laporan
    RIGHT JOIN laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    RIGHT JOIN users 
        ON (users.id = laporan.id_client)
          where laporan.`status_keadaan`='0' and users.id = '$kode'
                       order by laporan.tanggal_lapor DESC

          ;

     ;";
    
  return $this->db->query($data);

    }
public function getdatareadbox($user)
    {
            $data = "SELECT
    laporan.id_laporan
    , jenis_laporan.Jenis
    , laporan.tanggal_lapor
    , laporan.Status
    , users.username
FROM
    jenis_laporan
    INNER JOIN laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN users 
        ON (users.id = laporan.id_client)
          where laporan.`Status`='Sudah Dibaca' and laporan.`status_keadaan`='1' and users.username = '$user'
                       order by laporan.tanggal_lapor DESC

          ;

     ;";
        
    return $this->db->query($data);

        }

public function getdatajenis()
    {
            $jenis = "SELECT * FROM jenis_laporan ;";
        
    return $this->db->query($jenis);

        }


public function getdatagedung()
    {
            $gedung = "SELECT * FROM gedung where status_gedung = 'Aktif' ;";
        
    return $this->db->query($gedung);

        }

public function getdatadepartemen()
    {
            $departemen = "SELECT * FROM departemen where status_departemen='Aktif';";
        
            return $this->db->query($departemen);

        }
    		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */