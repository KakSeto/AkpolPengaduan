<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_compose extends CI_model {
	public function getviewdata($user)
	{
			$data = "
SELECT
    username
FROM
    users;
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
            $gedung = "SELECT * FROM gedung where status_gedung='Aktif';";
        
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