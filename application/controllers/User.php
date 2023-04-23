<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $twitter = $this->input->post('twitter');
            $instagram = $this->input->post('instagram');
            $facebook = $this->input->post('facebook');
            $bio = $this->input->post('bio');
            $kota = $this->input->post('kota');
            $provinsi = $this->input->post('provinsi');
            $pos = $this->input->post('pos');

            // cek jika ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->set('phone', $phone);
            $this->db->set('address', $address);
            $this->db->set('twitter', $twitter);
            $this->db->set('instagram', $instagram);
            $this->db->set('facebook', $facebook);
            $this->db->set('bio', $bio);
            $this->db->set('kota', $kota);
            $this->db->set('provinsi', $provinsi);
            $this->db->set('pos', $pos);
            $this->db->update('user');


            $this->session->set_flashdata('message', ' your profile has been updated!');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Curren Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
            Wrong current password!
            </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
            New password cannot be the same as current password!
            </div>');
                    redirect('user/changepassword');
                } else {
                    // password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', ' new password has been updated!');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function proposal()
    {
        $data['title'] = 'Proposal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['proposal'] = $this->db->get_where('proposal')->result_array();

        if (empty($data['user']['name']) || empty($data['user']['phone']) || empty($data['user']['address']) || empty($data['user']['kota']) || empty($data['user']['provinsi']) || empty($data['user']['pos'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Lengkapi terlebih dahulu data pribadi anda sebelum mengajukan proposal.</div>');
            redirect('user/edit');
        }

        if ($data['user']['role_id'] != 1 && $data['user']['proposal_access'] == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sistem mendeteksi bahwa anda sudah pernah mengupload proposal!! Silahkan memerika proposal anda disini.</div>');
            redirect('user/laporan');
        }

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/wizard_header', $data);
        $this->load->view('user/proposal', $data);
        $this->load->view('templates/wizard_footer');
    }


    public function proposaladd()
    {
        $data['proposal'] = $this->db->get_where('proposal')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // Load form validation library
        $this->load->library('form_validation');

        // Set rules for form validation
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('nomoridentitas', 'Nomor Identitas', 'required');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('namakm', 'Nama KM', 'required');
        $this->form_validation->set_rules('addresskm', 'Alamat KM', 'required');
        $this->form_validation->set_rules('emailkm', 'Email KM', 'required|valid_email');
        $this->form_validation->set_rules('phonekm', 'Nomor Telepon KM', 'required');
        $this->form_validation->set_rules('nomoridentitaskm', 'Nomor Identitas KM', 'required');
        $this->form_validation->set_rules('namakt', 'Nama KT', 'required');
        $this->form_validation->set_rules('addresskt', 'Alamat KT', 'required');
        $this->form_validation->set_rules('emailkt', 'Email KT', 'required|valid_email');
        $this->form_validation->set_rules('phonekt', 'Nomor Telepon KT', 'required');
        $this->form_validation->set_rules('nomoridentitaskt', 'Nomor Identitas KT', 'required');
        $this->form_validation->set_rules('jeniskelaminkt', 'Jenis Kelamin KT', 'required');
        $this->form_validation->set_rules('namapb', 'Nama PB', 'required');
        $this->form_validation->set_rules('addresspb', 'Address PB', 'required');
        $this->form_validation->set_rules('emailpb', 'Email PB', 'required|valid_email');
        $this->form_validation->set_rules('phonepb', 'Phone PB', 'required');
        $this->form_validation->set_rules('nomoridentitaspb', 'Nomor Identitas PB', 'required');
        $this->form_validation->set_rules('nomorkkpb', 'Nomor KK PB', 'required');
        $this->form_validation->set_rules('jeniskelaminpb', 'Jenis Kelamin PB', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        // Check if the form validation is success
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/wizard_header', $data);
            $this->load->view('user/proposal', $data);
            $this->load->view('templates/wizard_footer');
        } else {
            // Insert data into database
            $full_name          = $this->input->post('full_name');
            $address            = $this->input->post('address');
            $email              = $this->input->post('email');
            $phone              = $this->input->post('phone');
            $nomoridentitas     = $this->input->post('nomoridentitas');
            $jeniskelamin       = $this->input->post('jeniskelamin');
            $namakm             = $this->input->post('namakm');
            $addresskm          = $this->input->post('addresskm');
            $emailkm            = $this->input->post('emailkm');
            $phonekm            = $this->input->post('phonekm');
            $nomoridentitaskm   = $this->input->post('nomoridentitaskm');
            $namakt             = $this->input->post('namakt');
            $addresskt          = $this->input->post('addresskt');
            $emailkt            = $this->input->post('emailkt');
            $phonekt            = $this->input->post('phonekt');
            $nomoridentitaskt   = $this->input->post('nomoridentitaskt');
            $jeniskelaminkt     = $this->input->post('jeniskelaminkt');
            $namapb             = $this->input->post('namapb');
            $addresspb          = $this->input->post('addresspb');
            $emailpb            = $this->input->post('emailpb');
            $phonepb            = $this->input->post('phonepb');
            $nomoridentitaspb   = $this->input->post('nomoridentitaspb');
            $nomorkkpb          = $this->input->post('nomorkkpb');
            $jeniskelaminpb     = $this->input->post('jeniskelaminpb');
            $deskripsi          = $this->input->post('deskripsi');

            $upload_file1 = $_FILES['fotoidentitas']['name'];
            $upload_file2 = $_FILES['fotoidentitaskm']['name'];
            $upload_file3 = $_FILES['fotoidentitaskt']['name'];
            $upload_file4 = $_FILES['fotoidentitaspb']['name'];
            $upload_file5 = $_FILES['fotokkpb']['name'];
            $upload_file6 = $_FILES['fileproposal']['name'];
            $upload_file7 = $_FILES['filedokumentasi']['name'];

            if ($upload_file1 || $upload_file2 || $upload_file3 || $upload_file4 || $upload_file5 || $upload_file6 || $upload_file7) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|pdf';
                $config['max_size'] = '102400'; // 100MB
                $config['upload_path'] = './assets/proposal/';

                // create new directory
                $new_dir = date('YmdHis');
                $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $folder_name = $user['name'] . '_' . $full_name . '_' . $new_dir;

                if (!is_dir($config['upload_path'] . $folder_name)) {
                    mkdir($config['upload_path'] . $folder_name, 0777, TRUE);
                }
                $config['upload_path'] .= $folder_name . '/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('fotoidentitas')) {
                    $new_file1 = $this->upload->data('file_name');
                    $this->upload->data('file_name', $new_file1);
                } else {
                    echo $this->upload->display_errors();
                }
                if ($this->upload->do_upload('fotoidentitaskm')) {
                    $new_file2 = $this->upload->data('file_name');
                    $this->upload->data('file_name', $new_file2);
                } else {
                    echo $this->upload->display_errors();
                }
                if ($this->upload->do_upload('fotoidentitaskt')) {
                    $new_file3 = $this->upload->data('file_name');
                    $this->upload->data('file_name', $new_file3);
                } else {
                    echo $this->upload->display_errors();
                }
                if ($this->upload->do_upload('fotoidentitaspb')) {
                    $new_file4 = $this->upload->data('file_name');
                    $this->upload->data('file_name', $new_file4);
                } else {
                    echo $this->upload->display_errors();
                }
                if ($this->upload->do_upload('fotokkpb')) {
                    $new_file5 = $this->upload->data('file_name');
                    $this->upload->data('file_name', $new_file5);
                } else {
                    echo $this->upload->display_errors();
                }
                if ($this->upload->do_upload('fileproposal')) {
                    $new_file6 = $this->upload->data('file_name');
                    $this->upload->data('file_name', $new_file6);
                } else {
                    echo $this->upload->display_errors();
                }
                $new_file7 = array();
                foreach ($_FILES['filedokumentasi']['name'] as $key => $value) {
                    $_FILES['temp']['name'] = $_FILES['filedokumentasi']['name'][$key];
                    $_FILES['temp']['type'] = $_FILES['filedokumentasi']['type'][$key];
                    $_FILES['temp']['tmp_name'] = $_FILES['filedokumentasi']['tmp_name'][$key];
                    $_FILES['temp']['error'] = $_FILES['filedokumentasi']['error'][$key];
                    $_FILES['temp']['size'] = $_FILES['filedokumentasi']['size'][$key];
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('temp')) {
                        $new_file7[] = $this->upload->data('file_name');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('upload/error');
                    }
                }
            }
            $this->db->set('full_name', $full_name);
            $this->db->set('email', $email);
            $this->db->set('phone', $phone);
            $this->db->set('address', $address);
            $this->db->set('nomoridentitas', $nomoridentitas);
            $this->db->set('fotoidentitas', $new_file1);
            $this->db->set('jeniskelamin', $jeniskelamin);
            $this->db->set('namakm', $namakm);
            $this->db->set('addresskm', $addresskm);
            $this->db->set('emailkm', $emailkm);
            $this->db->set('phonekm', $phonekm);
            $this->db->set('nomoridentitaskm', $nomoridentitaskm);
            $this->db->set('fotoidentitaskm', $new_file2);
            $this->db->set('namakt', $namakt);
            $this->db->set('addresskt', $addresskt);
            $this->db->set('emailkt', $emailkt);
            $this->db->set('phonekt', $phonekt);
            $this->db->set('nomoridentitaskt', $nomoridentitaskt);
            $this->db->set('fotoidentitaskt', $new_file3);
            $this->db->set('jeniskelaminkt', $jeniskelaminkt);
            $this->db->set('namapb', $namapb);
            $this->db->set('addresspb', $addresspb);
            $this->db->set('emailpb', $emailpb);
            $this->db->set('phonepb', $phonepb);
            $this->db->set('nomoridentitaspb', $nomoridentitaspb);
            $this->db->set('fotoidentitaspb', $new_file4);
            $this->db->set('nomorkkpb', $nomorkkpb);
            $this->db->set('fotokkpb', $new_file5);
            $this->db->set('jeniskelaminpb', $jeniskelaminpb);
            $this->db->set('fileproposal', $new_file6);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('filedokumentasi', implode(',', $new_file7));
            $this->db->set('date_created', time());
            $this->db->set('status', 1);

            $this->db->insert('proposal');

            $this->db->set('proposal_access', 1);
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('user');
        }
    }

    public function laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['proposal'] = $this->db->get_where('proposal')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function support()
    {
        $data['title'] = 'Support';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/support', $data);
        $this->load->view('templates/footer');
    }
}
