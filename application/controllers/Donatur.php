<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Donatur';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datadonatur'] = $this->db->get_where('data_donatur')->result_array();

        $data['count_user'] = $this->db->query("SELECT * FROM user")->num_rows();
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id'])->num_rows();
        $data['datakelompok'] = $this->db->get_where('data_kelompok', ['id'])->num_rows();
        $data['proposal'] = $this->db->get_where('proposal', ['id'])->num_rows();
        $data['online'] = $this->db->get_where('user', ['last_login' => 1])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('donatur/index', $data);
        $this->load->view('templates/footer');
    }

    public function proposal()
    {
        $data['title'] = 'Data Proposal';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['proposal'] = $this->db->get_where('proposal')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('donatur/dataproposal', $data);
        $this->load->view('templates/footer');
    }
    public function proposaldetail($id)
    {
        $data['title'] = 'Detail Proposal';
        $data['proposal'] = $this->db->get_where('proposal', ['id' => $id])->row_array();

        // get proposal folder name based on id
        $folder_name = $data['proposal']['nama_pengirim'] . '_' . $data['proposal']['full_name'];

        // get file paths based on proposal folder name
        $data['fotoidentitas_path'] = base_url('assets/proposal/') . $folder_name . '/' . $data['proposal']['fotoidentitas'];
        $data['fotoidentitaskm_path'] = base_url('assets/proposal/') . $folder_name . '/' . $data['proposal']['fotoidentitaskm'];
        $data['fotoidentitaskt_path'] = base_url('assets/proposal/') . $folder_name . '/' . $data['proposal']['fotoidentitaskt'];
        $data['fotoidentitaspb_path'] = base_url('assets/proposal/') . $folder_name . '/' . $data['proposal']['fotoidentitaspb'];
        $data['fotokkpb_path'] = base_url('assets/proposal/') . $folder_name . '/' . $data['proposal']['fotokkpb'];
        $data['filedokumentasi_path'] = base_url('assets/proposal/') . $folder_name . '/';
        $data['fileproposal_path'] = base_url('assets/proposal/') . $folder_name . '/' . $data['proposal']['fileproposal'];

        $this->load->view('templates/header', $data);
        $this->load->view('donatur/detailproposal', $data);
        $this->load->view('templates/footer');
    }
}
