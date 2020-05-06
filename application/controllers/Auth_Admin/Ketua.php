<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KetuaModel');
        $this->load->model('AdminModel');
        $this->load->model('TemaModel');
    }

	public function index()
	{
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $ketua['ketua'] = $this->KetuaModel->showKetua()->result_array();
        $data['title'] = "Calon Ketua - E-voting";
        $this->load->view('template/meta', $data);
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('ketua/ketua', $ketua, $data);    
      $this->load->view('template/footer');
    }
    
    public function tambahKetua()
	{
        if($this->input->post('simpan_ketua')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_message('numeric', 'Hanya Boleh Diisi Angka');
            $this->form_validation->set_rules('nama', 'Nama Calon Ketua', 'trim|required');
            $this->form_validation->set_rules('nourut', 'Nomor Urut', 'trim|required|numeric');
            $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
            $this->form_validation->set_rules('semester', 'Semester', 'trim|required|numeric');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required');
            if($this->form_validation->run() == FALSE) {
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                if($data['user']['role_id'] != 1) {
                    redirect('Auth_Admin/Beranda');
                }
                $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
                $data['title'] = "Calon Ketua - E-voting";
                $this->load->view('template/meta', $data);
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('ketua/ketua_tambah', $data);
                $this->load->view('template/footer');
            } else {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '4096';

                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto')) {
                    $file = array('upload_data' => $this->upload->data());

                    $nama = $this->input->post('nama');
                    $nourut = $this->input->post('nourut');
                    $jurusan = $this->input->post('jurusan');
                    $semester = $this->input->post('semester');
                    $alamat = $this->input->post('alamat');
                    $image = $file['upload_data']['file_name'];
                    $visimisi = $this->input->post('visimisi');
                    $jenis = $this->input->post('jenis');
                    
                    $object = array(
                        'calon_ketua_nama' => $nama,
                        'calon_ketua_nourut' => $nourut,
                        'jurusan' => $jurusan,
                        'semester' => $semester,
                        'alamat' => $alamat,
                        'calon_ketua_foto' => $image,
                        'calon_ketua_visimisi' => $visimisi,
                        'calon_ketua_suara' => 0,
                        'tema_id' => $jenis
                    );

                    $this->KetuaModel->insertKetua($object);
                    redirect('/Auth_Admin/Ketua','refresh');
                }else {

                    echo $this->upload->display_errors();
                }
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
            $data['title'] = "Calon Ketua - E-voting";
            $this->load->view('template/meta', $data);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('ketua/ketua_tambah', $data);    
            $this->load->view('template/footer');
        }
    }
    
    public function ubahKetua($id) {
        if($this->input->post('ubah_ketua')) {
            if(empty($_FILES['foto']['name'])) {
                $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_message('numeric', 'Hanya Boleh Diisi Angka');
                $this->form_validation->set_rules('nama', 'Nama Calon Ketua', 'trim|required');
                $this->form_validation->set_rules('nourut', 'Nomor Urut', 'trim|required|numeric');
                if($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    if($data['user']['role_id'] != 1) {
                        redirect('Auth_Admin/Beranda');
                    }
                    $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
                    $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row();
                    $data['title'] = "Calon Ketua - E-voting";
                    $this->load->view('template/meta', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('template/sidebar', $data);
                    $this->load->view('ketua/ketua_edit', $ketua);    
                    $this->load->view('template/footer');
                } else {
                    $nama = $this->input->post('nama');
                    $nourut = $this->input->post('nourut');
                    $visimisi = $this->input->post('visimisi');
                    $jenis = $this->input->post('jenis');

                    $object = array(
                        "calon_ketua_nama" => $nama,
                        "calon_ketua_nourut" => $nourut,
                        "calon_ketua_visimisi" => $visimisi,
                        'tema_id' => $jenis
                    );
                    $this->KetuaModel->updateKetua($id, $object);
                    redirect('/Auth_Admin/Ketua','refresh');
                }
            } else {
                $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_message('numeric', 'Hanya Boleh Diisi Angka');
                $this->form_validation->set_rules('nama', 'Nama Calon Ketua', 'trim|required');
                $this->form_validation->set_rules('nourut', 'Nomor Urut', 'trim|required|numeric');
                if($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    if($data['user']['role_id'] != 1) {
                        redirect('Auth_Admin/Beranda');
                    }
                    $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
                    $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row();
                    $data['title'] = "Calon Ketua - E-voting";
                    $this->load->view('template/meta', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('template/sidebar', $data);
                    $this->load->view('ketua/ketua_edit', $ketua);    
                    $this->load->view('template/footer');
                } else {
                    $getKetua = $this->KetuaModel->getKetua($id)->row();
                    unlink('./assets/img/'.$getKetua->calon_ketua_foto);

                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '4096';

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('foto')) {
                        $file = array('upload_data' => $this->upload->data());

                        $nama = $this->input->post('nama');
                        $nourut = $this->input->post('nourut');
                        $image = $file['upload_data']['file_name'];
                        $visimisi = $this->input->post('visimisi');
                        $jenis = $this->input->post('jenis');
                        $object2 = array(
                            'calon_ketua_nama' => $nama,
                            'calon_ketua_nourut' => $nourut,
                            'calon_ketua_foto' => $image,
                            "calon_ketua_visimisi" => $visimisi,
                            'tema_id' => $jenis
                        );
                        $this->KetuaModel->updateKetua($id, $object2);
                        redirect('/Auth_Admin/Ketua','refresh');
                    }else {

                        echo $this->upload->display_errors();
                    }
                }
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
            $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row();
            $data['title'] = "Calon Ketua - E-voting";
            $this->load->view('template/meta', $data);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('ketua/ketua_edit', $ketua);    
            $this->load->view('template/footer');
        }
    }

    public function detailKetua($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $ketua['ketua'] = $this->KetuaModel->getKetua($id)->row_array();
        $data['title'] = "Calon Ketua - E-voting";
        $this->load->view('template/meta', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('ketua/ketua_detail', $ketua);    
        $this->load->view('template/footer');
    }

    public function hapusKetua($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['user']['role_id'] != 1) {
            redirect('Auth_Admin/Beranda');
        }
        $getKetua = $this->KetuaModel->getKetua($id)->row();
        unlink('./assets/img/'.$getKetua->calon_ketua_foto);
        $this->KetuaModel->deleteKetua($id);
        redirect('/Auth_Admin/Ketua','refresh');
    }

    public function excel()
    {
        $data['ketua'] = $this->KetuaModel->showKetua('tb_calon_ketua')->result();
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("E-Voting");
        $object->getProperties()->setLastModifiedBy("E-Voting");
        $object->getProperties()->setTitle("Daftar Pemilih E-Voting");

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NAMA');
        $object->getActiveSheet()->setCellValue('C1', 'NO. URUT');
        $object->getActiveSheet()->setCellValue('D1', 'JURUSAN');
        $object->getActiveSheet()->setCellValue('E1', 'SEMESTER');
        $object->getActiveSheet()->setCellValue('F1', 'ALAMAT');
        $object->getActiveSheet()->setCellValue('G1', 'SUARA');


        $baris = 2;
        $no = 1;

        foreach ($data['ketua'] as $ket) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $ket->calon_ketua_nama);
            $object->getActiveSheet()->setCellValue('C' . $baris, $ket->calon_ketua_nourut);
            $object->getActiveSheet()->setCellValue('D' . $baris, $ket->jurusan);
            $object->getActiveSheet()->setCellValue('E' . $baris, $ket->semester);
            $object->getActiveSheet()->setCellValue('F' . $baris, $ket->alamat);
            $object->getActiveSheet()->setCellValue('G' . $baris, $ket->calon_ketua_suara);
        

            $baris++;
        }
        $filename = "Calon Ketua" . '.xlsx';
        $object->getActiveSheet()->setTitle("Data Hasil Suara Calon Ketua");

        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');


        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function pdf()
    {
        $this->load->library('Dompdf_gen');
        $data['ketua'] = $this->KetuaModel->showKetua('tb_calon_ketua')->result();
        $this->load->view('ketua/ketua_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Calon_Ketua.pdf", array('Attachment' => 0));
    }
}
