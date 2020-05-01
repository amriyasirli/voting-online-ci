<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemilihAuth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TemaModel');
        $this->load->model('HasilModel');
    }

    public function index() {
        if($this->input->post('login-pemilih')) {
            $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
            $this->form_validation->set_rules('nopemilih', 'Nomor Pemilih', 'required|trim');
            if($this->form_validation->run() == FALSE) {
                $this->load->view('login_layout/pemilih_login');
            } else {
                $this->_loginPemilih();
            }
        } else {
            $this->load->view('login_layout/pemilih_login');
        }
    }

    private function _loginPemilih() {
        $nopemilih = $this->input->post('nopemilih');
        $user = $this->db->get_where('tb_pemilih', ["pemilih_nim" => $nopemilih])->row_array();

        if($user) {
            if($user['pemilih_verifikasi'] == 1) {
                if($user['pemilih_status'] == 0) {
                    $data = [
                        'pemilih_nim' => $user['pemilih_nim']
                    ];
                    $this->session->set_userdata($data);
                    redirect('PemilihAuth/pemilihIsLogin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Anda Sudah Memilih!</div>');
                    redirect('PemilihAuth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="help-block text-center">
                Data Anda Belum Diverifikas!</div>'); 
                redirect('PemilihAuth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="help-block text-center">
            Data Anda Tidak Terdaftar!</div>');
            redirect('PemilihAuth');
        }
    }

    public function pemilihIsLogin() {
        $this->user['user'] = $this->db->get_where('tb_pemilih', ['pemilih_nim'  => $this->session->userdata('pemilih_nim')])->row_array();
        if($this->user['user'] == "") {
            redirect('PemilihAuth', 'refresh');
        }
        $data['title'] = 'E-Voting';
        $data['user'] = $this->user['user']['pemilih_id'];
        $data['usernama'] = $this->user['user']['pemilih_nama'];
        $data['tema'] = $this->TemaModel->getTemaActive()->result_array();
        $data['countTema'] = $this->TemaModel->countTema();
        $data['hasilCount'] = $this->HasilModel->countPemilih($data['user']);
        $this->load->view('template/meta', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pemilih/pemilih_auth', $data);
        $this->load->view('template/footer', $data);
    }


    public function pemilihMemilih($id) {
        $this->user['user'] = $this->db->get_where('tb_pemilih', ['pemilih_nim'  => $this->session->userdata('pemilih_nim')])->row_array();
        if($this->user['user'] == "") {
            redirect('PemilihAuth', 'refresh');
        }
        $data['title'] = 'E-Voting';
        $data['tema'] = $this->TemaModel->getTema($id)->row_array();
        $data['calon'] = $this->HasilModel->getCalon($id)->result_array();
        $this->load->view('template/meta', $data);
        $this->load->view('template/topbar');
        $this->load->view('pemilih/pemilih_memilih', $data);
        $this->load->view('template/footer', $data);
    }

    public function memilih($id) {
        $this->user['user'] = $this->db->get_where('tb_pemilih', ['pemilih_nim'  => $this->session->userdata('pemilih_nim')])->row_array();
        if($this->user['user'] == "") {
            redirect('PemilihAuth', 'refresh');
        }

        $this->load->model('KetuaModel');
        $ketua = $this->KetuaModel->getKetua($id)->row_array();
        $suara = $ketua['calon_ketua_suara'] + 1;

        $this->db->where('calon_ketua_id', $id);
        $this->db->update('tb_calon_ketua', ['calon_ketua_suara' => $suara]);

        $hasil = $this->HasilModel->getTemaInCalon($id)->row_array();
        $pemilih_id = $this->user['user']['pemilih_id'];
        $ketua_id = $id;
        $tema_id = $hasil['tema_id'];

        $obj = [
            'pemilih_id' => $pemilih_id,
            'tema_id' => $tema_id,
            'calon_id' => $id
        ];

        $this->HasilModel->insertSuara($obj);
        redirect('PemilihAuth/pemilihIsLogin', 'referesh');

        // $this->db->where('pemilih_nim', $this->user['user']['pemilih_nim']);
        // $this->db->update('tb_pemilih', ['pemilih_status' => "1"]);
        // $this->session->set_flashdata('berhasil', 'Anda Sudah Berhasil Memilih');
        // $this->_logout();
    }

    public function logout() {
        $this->user['user'] = $this->db->get_where('tb_pemilih', ['pemilih_nim'  => $this->session->userdata('pemilih_nim')])->row_array();
        if($this->user['user'] == "") {
            redirect('PemilihAuth', 'refresh');
        }
        $this->db->where('pemilih_nim', $this->user['user']['pemilih_nim']);
        $this->db->update('tb_pemilih', ['pemilih_status' => "1"]);
        $this->session->set_flashdata('berhasil', 'Anda Sudah Berhasil Memilih');
        $this->_logout();
    }

    private function _logout() {
        $this->session->unset_userdata('pemilih_nim');
        redirect('PemilihAuth');
    }
}