<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_jenis extends CI_model {

	public function getdata()
	{
		$hasil = $this->db->get('jenis_laporan');
		return $hasil;
		
	}
	public function getupdate($key,$data)
	{
			$this->db->where('id_jenis',$key);
		$this->db->update('jenis_laporan',$data);
		
	}
	public function getinsert($data)
	{
				$this->db->insert('jenis_laporan',$data);

	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */