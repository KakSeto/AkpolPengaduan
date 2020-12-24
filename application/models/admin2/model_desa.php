<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_desa extends CI_model {

	public function getdata($key)
	{
		$hasil = $this->db->get('profil_akpol');
		return $hasil;
		
	}
	public function getupdate($key,$data)
	{
		$this->db->update('profil_akpol',$data);
		
	}
	public function getinsert($data)
	{
				$this->db->insert('profil_akpol',$data);

	}
    		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */