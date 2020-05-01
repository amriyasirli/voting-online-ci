<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Chart extends CI_Controller {
    public function __construct()
    {
          parent::__construct();
          $this->load->model('ChartModel');
    }
 
	public function index()
	{
		$data['graph'] = $this->ChartModel->graph();
		$this->load->view('template/meta');
        $this->load->view('template/header');
        $this->load->view('content/chart', $data);    
        $this->load->view('template/footer', $data);
	}
        
}
        
    /* End of file  Chart.php */
        
                            