<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilih extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("PemilihModel");
        $this->load->model('AdminModel');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Auth_Admin/pemilih/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Auth_Admin/pemilih/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Auth_Admin/pemilih/index';
            $config['first_url'] = base_url() . 'Auth_Admin/pemilih/index';
        }

        $config['total_rows'] = $this->PemilihModel->countPemilih();
        

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            
            'total_rows' => $config['total_rows'],
            
        );

        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $pemilih['pemilih'] = $this->PemilihModel->showPemilih()->result_array();
        $data['title'] = "Data Pemilih - E-voting";
        $this->load->view('template/meta', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pemilih/pemilih', $pemilih, $data);    
        $this->load->view('template/footer');
    }

    public function tambahPemilih() {
        if($this->input->post('simpan-pemilih')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_message('is_unique', 'Nim Sudah Digunakan');
            $this->form_validation->set_message('numeric', 'Silahkan Masukkan Angka');
            $this->form_validation->set_message('min_length', 'Panjang harus 7 karakter');
            $this->form_validation->set_message('max_length', 'Panjang harus 7 karakter');
            $this->form_validation->set_rules('nimpemilih', 'Nim Pemilih', 'trim|required|min_length[7]|max_length[7]|is_unique[tb_pemilih.pemilih_nim]');
            $this->form_validation->set_rules('namapemilih', 'Nama Pemilih', 'trim|required');
            $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
            $this->form_validation->set_rules('prodi', 'Program Studi', 'trim|required');
            $this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required');
            $this->form_validation->set_rules('jkelamin', 'Jenis Kelamin', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                if($data['user']['role_id'] != 1) {
                    redirect('Auth_Admin/Beranda');
                }
                $data['title'] = "Data Pemilih - E-voting";
                $this->load->view('template/meta', $data);
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('pemilih/pemilih_tambah');    
                $this->load->view('template/footer'); 
            } else {
                $config['upload_path'] = './assets/img/img-pemilih';
                $config['allowed_types'] = 'jpg|png|JPG|PNG';
                $config['max_size'] = '4096';

                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto')) {
                    $file = array('upload_data' => $this->upload->data());

                    
                    $nimpemilih = $this->input->post('nimpemilih');
                    $namapemilih = $this->input->post('namapemilih');
                    $semester = $this->input->post('semester');
                    $prodi = $this->input->post('prodi');
                    $fakultas = $this->input->post('fakultas');
                    $jkelamin = $this->input->post('jkelamin');
                    $image = $file['upload_data']['file_name'];
                    $verifikasi = "0";
                    $memilih = "0";

                    $data = array(
                        "pemilih_nim" => $nimpemilih,
                        "pemilih_nama" => $namapemilih,
                        "pemilih_semester" => $semester,
                        "pemilih_prodi" => $prodi,
                        "pemilih_fakultas" => $fakultas,
                        "pemilih_jk" => $jkelamin,
                        "pemilih_foto" => $image,
                        "pemilih_verifikasi" => $verifikasi,
                        "pemilih_status" => $memilih
                    );
                    $this->PemilihModel->insertPemilih($data);
                    redirect('/Auth_Admin/Pemilih','refresh');
                }
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $data['title'] = "Data Pemilih - E-voting";
            $this->load->view('template/meta', $data);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pemilih/pemilih_tambah');    
            $this->load->view('template/footer'); 
        }
    }

    public function ubahPemilih($id) {
        if($this->input->post('ubah-pemilih')) {
            if(empty($_FILES['foto']['name'])) {
                $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_message('min_length', 'Panjang harus 7 karakter');
                $this->form_validation->set_message('max_length', 'Panjang harus 7 karakter');
                $this->form_validation->set_rules('nimpemilih', 'Nim Pemilih', 'trim|required|min_length[7]|max_length[7]');
                $this->form_validation->set_rules('namapemilih', 'Nama Pemilih', 'trim|required');
                $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
                $this->form_validation->set_rules('prodi', 'Program Studi', 'trim|required');
                $this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required');
                $this->form_validation->set_rules('jkelamin', 'Jenis Kelamin', 'trim|required');

                if($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    if($data['user']['role_id'] != 1) {
                        redirect('Auth_Admin/Beranda');
                    }
                    $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
                    $data['title'] = "Data Pemilih - Administrator";
                    $this->load->view('template/meta', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('template/sidebar', $data);
                    $this->load->view('pemilih/pemilih_ubah', $pemilih);
                    $this->load->view('template/footer'); 
                } else {
                    
                    $nimpemilih = $this->input->post('nimpemilih');
                    $namapemilih = $this->input->post('namapemilih');
                    $semester = $this->input->post('semester');
                    $prodi = $this->input->post('prodi');
                    $fakultas = $this->input->post('fakultas');
                    $jkelamin = $this->input->post('jkelamin');
                    $verifikasi = $this->input->post('verifikasi');
                    $memilih = $this->input->post('memilih');
                    $object = array(
                        "pemilih_nim" => $nimpemilih,
                        "pemilih_nama" => $namapemilih,
                        "pemilih_semester" => $semester,
                        "pemilih_prodi" => $prodi,
                        "pemilih_fakultas" => $fakultas,
                        "pemilih_jk" => $jkelamin,
                        "pemilih_verifikasi" => $verifikasi,
                        "pemilih_status" => $memilih
                    );
                    $this->PemilihModel->updatePemilih($id, $object);
                    redirect('/Auth_Admin/Pemilih','refresh');
                }
            } else {
                $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_message('min_length', 'Panjang harus 7 karakter');
                $this->form_validation->set_message('max_length', 'Panjang harus 7 karakter');
                $this->form_validation->set_rules('nimpemilih', 'Nim Pemilih', 'trim|required|min_length[7]|max_length[7]');
                $this->form_validation->set_rules('namapemilih', 'Nama Pemilih', 'trim|required');
                $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
                $this->form_validation->set_rules('prodi', 'Program Studi', 'trim|required');
                $this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required');
                $this->form_validation->set_rules('jkelamin', 'Jenis Kelamin', 'trim|required');
                if($this->form_validation->run() == FALSE) {
                    $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
                    if($data['user']['role_id'] != 1) {
                        redirect('Auth_Admin/Beranda');
                    }
                    $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
                    $data['title'] = "Data Pemilih - Administrator";
                    $this->load->view('template/meta', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('template/sidebar', $data);
                    $this->load->view('pemilih/pemilih_ubah', $pemilih);
                    $this->load->view('template/footer'); 
                } else {
                    $picture = $this->PemilihModel->getPemilih($id)->row_array();
                    unlink('./assets/img/img-pemilih/'.$picture['pemilih_foto']);

                    $config['upload_path'] = './assets/img/img-pemilih';
                    $config['allowed_types'] = 'jpg|png|JPG|PNG';
                    $config['max_size'] = '4096';

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('foto')) {
                        $file = array('upload_data' => $this->upload->data());

                        $nimpemilih = $this->input->post('nimpemilih');
                        $namapemilih = $this->input->post('namapemilih');
                        $semester = $this->input->post('semester');
                        $prodi = $this->input->post('prodi');
                        $fakultas = $this->input->post('fakultas');
                        $jkelamin = $this->input->post('jkelamin');
                        $image = $file['upload_data']['file_name'];
                        $verifikasi = "0";
                        $memilih = "0";
                        $obj2 = array(
                            "pemilih_nim" => $nimpemilih,
                            "pemilih_nama" => $namapemilih,
                            "pemilih_semester" => $semester,
                            "pemilih_prodi" => $prodi,
                            "pemilih_fakultas" => $fakultas,
                            "pemilih_jk" => $jkelamin,
                            "pemilih_foto" => $image,
                            "pemilih_verifikasi" => $verifikasi,
                            "pemilih_status" => $memilih
                        );
                        $this->PemilihModel->updatePemilih($id, $obj2);
                        redirect('/Auth_Admin/Pemilih','refresh');
                    }
                }
            }
        } else {
            $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
            if($data['user']['role_id'] != 1) {
                redirect('Auth_Admin/Beranda');
            }
            $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
            $data['title'] = "Data Pemilih - E-voting";
            $this->load->view('template/meta', $data);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pemilih/pemilih_ubah', $pemilih);
            $this->load->view('template/footer'); 
        }
    }

    public function hapusPemilih($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['user']['role_id'] != 1) {
            redirect('Auth_Admin/Beranda');
        }
        $this->PemilihModel->deletePemilih($id);
        redirect('/Auth_Admin/Pemilih','refresh');
    }

    

    public function pemilihDetail($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
        $data['title'] = "Data Pemilih - E-voting";
        $this->load->view('template/meta', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pemilih/pemilih_detail', $pemilih);
        $this->load->view('template/footer'); 
    }

    public function pemilihVerifikasi($id) {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        $pemilih['pemilih'] = $this->PemilihModel->getPemilih($id)->row_array();
        $data['title'] = "Data Pemilih - E-voting";
        $this->load->view('template/meta', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pemilih/pemilih_verifikasi', $pemilih);
        $this->load->view('template/footer'); 
    }

    public function verifikasi($id) {
        $verifikasi = "1";
        $object = array("pemilih_verifikasi" => $verifikasi);
        $this->PemilihModel->updatePemilih($id, $object);
        redirect('/Auth_Admin/Pemilih/', 'refresh');
    }

    public function resetPemilih() {
        $data['user'] = $this->AdminModel->getAdmin($this->session->userdata('username'))->row_array();
        if($data['user']['role_id'] != 1) {
            redirect('Auth_Admin/Beranda');
        }
        $verifikasi = "0";
        $memilih = "0";
        $data = array("pemilih_verifikasi" => $verifikasi, "pemilih_status" => $memilih);
        $this->PemilihModel->resetPemilih($data);
        redirect('/Auth_Admin/Pemilih','refresh');
    }

    public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert bg-maroon mt-3"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('Auth_Admin/pemilih/');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'pemilih_nim' => $row['A'],
                                    'pemilih_nama' => $row['B'],
                                    'pemilih_semester' => $row['C'],
                                    'pemilih_jk' => $row['D'],
                                    'pemilih_fakultas' => $row['E'],
                                    'pemilih_prodi' => $row['F'],
                                    'pemilih_verifikasi' => '0',
                                    'pemilih_status' => '0'
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('tb_pemilih', $data);
            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert bg-teal mt-3"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('Auth_Admin/pemilih/');

        }
    }

    public function excel()
    {
        $data['pemilih'] = $this->PemilihModel->showPemilih('tb_pemilih')->result();
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("E-Voting");
        $object->getProperties()->setLastModifiedBy("E-Voting");
        $object->getProperties()->setTitle("Daftar Pemilih E-Voting");

        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('B1', 'NIM');
        $object->getActiveSheet()->setCellValue('C1', 'NAMA');
        $object->getActiveSheet()->setCellValue('D1', 'J. KELAMIN');
        $object->getActiveSheet()->setCellValue('E1', 'SEMESTER');
        $object->getActiveSheet()->setCellValue('F1', 'PRODI');
        $object->getActiveSheet()->setCellValue('G1', 'FAKULTAS');
        $object->getActiveSheet()->setCellValue('H1', 'VERIFIKASI');
        $object->getActiveSheet()->setCellValue('I1', 'STATUS');


        $baris = 2;
        $no = 1;

        foreach ($data['pemilih'] as $pilih) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $pilih->pemilih_nim);
            $object->getActiveSheet()->setCellValue('C' . $baris, $pilih->pemilih_nama);
            $object->getActiveSheet()->setCellValue('D' . $baris, $pilih->pemilih_jk);
            $object->getActiveSheet()->setCellValue('E' . $baris, $pilih->pemilih_semester);
            $object->getActiveSheet()->setCellValue('F' . $baris, $pilih->pemilih_prodi);
            $object->getActiveSheet()->setCellValue('G' . $baris, $pilih->pemilih_fakultas);
        
            if($pilih->pemilih_verifikasi == 0) {
                $object->getActiveSheet()->setCellValue('H' . $baris, 'Belum Diverifikasi');
            } else {
                $object->getActiveSheet()->setCellValue('H' . $baris, 'Diverifikasi');
            }
        
            if($pilih->pemilih_status == 0) {
                $object->getActiveSheet()->setCellValue('I' . $baris, 'Belum');
            } else {
                $object->getActiveSheet()->setCellValue('I' . $baris, 'Sudah Memilih');
            }
        

            $baris++;
        }
        $filename = "Pemilih" . '.xlsx';
        $object->getActiveSheet()->setTitle("Daftar Pemilih E-Voting");

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
        $data['pemilih'] = $this->PemilihModel->showPemilih('tb_pemilih')->result();
        $this->load->view('pemilih/pemilih_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("pemilih.pdf", array('Attachment' => 0));
    }

}