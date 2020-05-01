<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class ChartModel extends CI_Model {
                        

    public function graph()
	{
		$data = $this->db->query("SELECT * from tb_calon_ketua");
		return $data->result();
	}                   
                                

                        
                            
                        
}
                        
/* End of file ChartModel.php */
    
                        