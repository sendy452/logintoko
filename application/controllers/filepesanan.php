<?php
defined('BASEPATH') or exit('No direct script access allowed');
class filepesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['tittle'] = 'Data Cetak';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['cetakfoto'] = $this->db->get_where('tb_filepesanan', ['status' => 1])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('filepesanan/index', $data);
        $this->load->view('template/footer');
    }
}
