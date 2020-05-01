<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Beranda extends CI_Controller {
      
public function __construct()
{
      parent::__construct();
      $this->load->model('AdminModel');
      $this->load->model('KetuaModel');
}

public function index()
{


      $data['ketua']=$this->KetuaModel->showKetua()->result_array();
      $x['data']=$this->KetuaModel->get_data_suara();
      $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
      $data['title'] = "Beranda - Administrator";
      $data['jlhPemilih'] = $this->db->count_all('tb_pemilih');
      $data['jenis'] = $this->db->get('tb_tema_pemilihan')->result_array();
      $data['hadir'] = $this->db->query("SELECT COUNT(pemilih_id) AS hadir FROM tb_pemilih WHERE pemilih_status='1'")->row_array();
      $data['tdkhadir'] = $this->db->query("SELECT COUNT(pemilih_id) AS tdkhadir FROM tb_pemilih WHERE pemilih_status='0'")->row_array();
      $this->load->view('template/meta', $data);
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('content/beranda', $data, $x);    
      $this->load->view('template/footer');
}

 

        
}
        
    /* End of file  Home.php */
        
                            