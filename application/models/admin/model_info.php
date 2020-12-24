<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_info extends CI_model {
	public function getdatainfo()
	{
			$data = "SELECT * FROM info_akpol;";
		
	return $this->db->query($data);

		}

        public function getdata($key)
    {
        $this->db->where('id',$key);
        $hasil = $this->db->get('info_akpol');
        return $hasil;
        
    }


    public function getupdate($key,$data)
    {
        $this->db->where('id',$key);
        $this->db->update('info_akpol',$data);
        
    }
    public function getinset($data)
    {
                $this->db->insert('info_akpol',$data);

    }
    		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */