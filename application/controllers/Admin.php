<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
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
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('role', $this->input->post('role'));
            $this->db->insert('user_role');

            $this->session->set_flashdata('message', ' role has been added!');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function deleterole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', ' role has been deleted!');
        redirect('admin/role');
    }

    public function editrole($role_id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->result_array();

        $this->form_validation->set_rules('edit-role', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('role', $this->input->post('edit-role'));
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_role');

            $this->session->set_flashdata('message', ' role has been updated!');
            redirect('admin/role');
        }
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', ' access has been updated!');
    }

    public function allusers()
    {
        $data['title'] = 'All Users';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['allusers'] = $this->db->get_where('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/allusers', $data);
        $this->load->view('templates/footer');
    }

    public function allusersdelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', ' account has been deleted!');
        redirect('admin/allusers');
    }

    public function allusersadd()
    {
        $data =
            [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'       => $this->input->post('role_id'),
                'is_active'     => $this->input->post('is_active'),
                'date_created'  => time()
            ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', ' new user has been added!');
        redirect('admin/allusers');
    }

    public function active()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('User_model', 'user');
            $update_status = $this->user->active();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/allusers');
        }
    }

    public function proposalaccess()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('User_model', 'user');
            $update_status = $this->user->proposalaccess();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/allusers');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data User';
        $data['user'] = $this->User_model->getAllUsers($id);
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function datadonatur()
    {
        $data['title'] = 'Data Donatur';
        $data['datadonatur'] = $this->db->get('data_donatur')->result_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['datadonatur'] = $this->db->get_where('data_donatur')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datadonatur', $data);
        $this->load->view('templates/footer');
    }

    public function datadonaturadd()
    {
        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('phone', 'No. HP', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Donasi', 'required');
        $this->form_validation->set_rules('MoU', 'MoU', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', ' data donatur tidak tervalidasi!');
            redirect('admin/datadonatur');
        } else {
            $data =
                [
                    'nama_donatur'  => htmlspecialchars($this->input->post('nama_donatur', true)),
                    'email'         => htmlspecialchars($this->input->post('email', true)),
                    'jabatan'       => $this->input->post('jabatan'),
                    'instansi'      => $this->input->post('instansi'),
                    'phone'         => $this->input->post('phone'),
                    'jumlah'         => $this->input->post('jumlah'),
                    'MoU'         => $this->input->post('MoU'),
                    'is_active'     => $this->input->post('is_active'),
                    'date_created' => date('Y-m-d')
                ];
            $this->db->insert('data_donatur', $data);
            $this->session->set_flashdata('message', ' data donatur has been added!');
            redirect('admin/datadonatur');
        }
    }

    public function detaildata($id)
    {
        $data['title'] = 'Detail Data Donatur';
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detaildata', $data);
        $this->load->view('templates/footer');
    }

    public function datadonaturdelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_donatur');
        $this->session->set_flashdata('message', ' data donatur has been deleted!');
        redirect('admin/datadonatur');
    }

    public function dataactive()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('Data_model', 'data_donatur');
            $update_status = $this->data_donatur->dataactive();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/datadonatur');
        }
    }

    public function editdata($id)
    {
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id' => $id])->result_array();

        $this->form_validation->set_rules('nama_donatur', 'Nama Donatur', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('phone', 'No. HP', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-datadonatur', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_donatur' => $this->input->post('nama_donatur'),
                'email' => $this->input->post('email'),
                'jabatan' => $this->input->post('jabatan'),
                'instansi' => $this->input->post('instansi'),
                'phone' => $this->input->post('phone')
            ];

            $this->db->where('id', $id);
            $this->db->update('data_donatur', $data);

            $this->session->set_flashdata('message', 'Data donatur has been changed!');
            redirect('admin/datadonatur');
        }
    }

    public function datadonasi()
    {
        $data['title'] = 'Data Donasi';
        $data['datadonatur'] = $this->db->get('data_donatur')->result_array();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['datadonatur'] = $this->db->get_where('data_donatur')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datadonasi', $data);
        $this->load->view('templates/footer');
    }

    // Add data dikomen, tambah data hanya berada di data donatur.
    // public function datadonasiadd()
    // {
    //     $data =
    //         [
    //             'nama_donatur'  => htmlspecialchars($this->input->post('nama_donatur', true)),
    //             'email'         => htmlspecialchars($this->input->post('email', true)),
    //             'phone'         => $this->input->post('phone'),
    //             'image'         => 'default.jpg',
    //             'jumlah'        => $this->input->post('jumlah'),
    //             'is_active'     => $this->input->post('is_active'),
    //             'date_created' => date('Y-m-d')
    //         ];
    //     $this->db->insert('data_donatur', $data);
    //     $this->session->set_flashdata('message', ' new data has been added!');
    //     redirect('admin/datadonasi');
    // }

    public function editdatadonasi($id)
    {
        $data['title'] = 'Edit Data Donasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id' => $id])->result_array();

        $this->form_validation->set_rules('date_created', 'Tanggal Donasi', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Donasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-datadonasi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'date_created' => date('Y-m-d', strtotime($this->input->post('date_created'))),
                'jumlah' => $this->input->post('jumlah')
            ];

            $this->db->where('id', $id);
            $this->db->update('data_donatur', $data);

            $this->session->set_flashdata('message', 'Data Donasi has been changed!');
            redirect('admin/datadonasi');
        }
    }

    public function datadonasidetail($id)
    {
        $data['title'] = 'Detail Data Donasi';
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detaildata', $data);
        $this->load->view('templates/footer');
    }

    public function datadonasidelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_donatur');
        $this->session->set_flashdata('message', ' data has been deleted!');
        redirect('admin/datadonasi');
    }

    public function datadonasiactive()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('Data_model', 'data_donatur');
            $update_status = $this->data_donatur->dataactive();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/datadonasi');
        }
    }

    public function datakerjasama()
    {
        $data['title'] = 'Data Kerjasama';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['datakerjasama'] = $this->db->get_where('data_donatur')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datakerjasama', $data);
        $this->load->view('templates/footer');
    }

    // Add data dikomen, tambah data hanya berada di data donatur.
    // public function kerjasamaadd()
    // {
    //     $data =
    //         [
    //             'nama_donatur'  => htmlspecialchars($this->input->post('nama_donatur', true)),
    //             'MoU'           => $this->input->post('MoU'),
    //             'image'         => 'default.jpg',
    //             'is_active'     => $this->input->post('is_active'),
    //             'date_created' => date('Y-m-d')
    //         ];
    //     $this->db->insert('data_donatur', $data);
    //     $this->session->set_flashdata('message', ' new data kerjasama has been added!');
    //     redirect('admin/datakerjasama');
    // }

    public function editdatakerjasama($id)
    {
        $data['title'] = 'Edit Data Kerjasama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id' => $id])->result_array();

        $this->form_validation->set_rules('edit-datakerjasama', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-datakerjasama', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('MoU', $this->input->post('edit-datakerjasama'));
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('data_donatur');

            $this->session->set_flashdata('message', ' data kerjasama has been changed!');
            redirect('admin/datakerjasama');
        }
    }

    public function kerjasamadetail($id)
    {
        $data['title'] = 'Detail Data Kerjasama';
        $data['datadonatur'] = $this->db->get_where('data_donatur', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detaildata', $data);
        $this->load->view('templates/footer');
    }

    public function kerjasamadelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_donatur');
        $this->session->set_flashdata('message', ' data has been deleted!');
        redirect('admin/datakerjasama');
    }

    public function kerjasamaactive()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('Data_model', 'data_donatur');
            $update_status = $this->data_donatur->dataactive();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/datakerjasama');
        }
    }

    public function datakelompok()
    {
        $data['title'] = 'Data Kelompok Masyarakat';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['datakelompok'] = $this->db->get_where('data_kelompok')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datakelompok', $data);
        $this->load->view('templates/footer');
    }

    public function kelompokadd()
    {
        $data =
            [
                'nama_kelompok'  => htmlspecialchars($this->input->post('nama_kelompok', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'ketua'         => $this->input->post('ketua'),
                'image'         => 'default.jpg',
                'phone'         => $this->input->post('phone'),
                'alamat'        => $this->input->post('alamat'),
                'is_active'     => $this->input->post('is_active'),
                'date_created' => time()
            ];
        $this->db->insert('data_kelompok', $data);
        $this->session->set_flashdata('message', ' new data kelompok has been added!');
        redirect('admin/datakelompok');
    }

    public function editkelompok($id)
    {
        $data['title'] = 'Edit Data Kelompok Masyarakat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datakelompok'] = $this->db->get_where('data_kelompok', ['id' => $id])->result_array();

        $this->form_validation->set_rules('nama_kelompok', 'Nama Kelompok', 'required');
        $this->form_validation->set_rules('ketua', 'Ketua', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('phone', 'No. HP', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-datakelompok', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kelompok' => $this->input->post('nama_kelompok'),
                'ketua' => $this->input->post('ketua'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'phone' => $this->input->post('phone')
            ];

            $this->db->where('id', $id);
            $this->db->update('data_kelompok', $data);

            $this->session->set_flashdata('message', 'Data Kelompok Masyarakat has been changed!');
            redirect('admin/datakelompok');
        }
    }

    public function kelompokdetail($id)
    {
        $data['title'] = 'Detail Data Kelompok';
        $data['datadonatur'] = $this->db->get_where('data_kelompok', ['id' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detailkelompok', $data);
        $this->load->view('templates/footer');
    }

    public function kelompokdelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_kelompok');
        $this->session->set_flashdata('message', ' data has been deleted!');
        redirect('admin/datakelompok');
    }

    public function kelompokactive()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('Kelompok_model', 'data_kelompok');
            $update_status = $this->data_kelompok->kelompokactive();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/datakelompok');
        }
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
        $this->load->view('admin/dataproposal', $data);
        $this->load->view('templates/footer');
    }

    public function status()
    {
        if (isset($_REQUEST['sval'])) {
            $this->load->model('Proposal_model', 'proposal');
            $update_status = $this->proposal->status();

            if ($update_status > 0) {
                $this->session->set_flashdata('message', '
            has been updated!');
            } else {
                $this->session->set_flashdata('message', '
            not updated!');
            }
            redirect('admin/proposal');
        }
    }
    public function proposaldelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('proposal');
        $this->session->set_flashdata('message', ' proposal has been deleted!');
        redirect('admin/dataproposal');
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
        $this->load->view('admin/detailproposal', $data);
        $this->load->view('templates/footer');
    }
}
