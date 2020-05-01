<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemaModel extends CI_Model {

    public function showTema() {
        return $this->db->get('tb_tema_pemilihan');
    }

    public function insertTema($data) {
        return $this->db->insert('tb_tema_pemilihan', $data);
    }

    public function getTema($id) {
        return $this->db->get_where('tb_tema_pemilihan', ['tema_id' => $id]);
    }

    public function updateTema($id, $data) {
        $this->db->where('tema_id', $id);
        return $this->db->update('tb_tema_pemilihan', $data);
    }

    public function deleteTema($id) {
        return $this->db->delete('tb_tema_pemilihan', ['tema_id' => $id]);
    }

    public function getTemaActive() {
        return $this->db->get_where('tb_tema_pemilihan', ['tema_is_active' => "1"]);
    }

    public function countTema() {
        $this->db->where('tema_is_active', "1");
        return $this->db->count_all_results('tb_tema_pemilihan');
    }
}