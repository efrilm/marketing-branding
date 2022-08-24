<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('email'))) {
            redirect('administration/sign-in');
        }
        $this->data['user'] = $this->user->getUserByEmail($this->session->userdata('email'))->row();
    }

    public function index()
    {
        $this->data['title'] = mblang('Users');
        $this->data['users'] = $this->user->getUserAll();
        $this->template->load('admin/template', 'admin/user/index', $this->data);
    }


    public function addUser()
    {

        $this->form_validation->set_rules('first_name', mblang('First Name'),  'required', [
            'required' => "%s " . mblang('Required') . "*",
        ]);

        $this->form_validation->set_rules('last_name', mblang('Last Name'),  'required', [
            'required' => "%s " . mblang('Required') . "*",
        ]);

        $this->form_validation->set_rules('no_phone', mblang('No. Phone'),  'required', [
            'required' => "%s " . mblang('Required') . "*",
        ]);

        $this->form_validation->set_rules('email', mblang('Email'),  'required|trim|valid_email|is_unique[tb_user.email]', [
            'required' => "%s " . mblang('Required') . "*",
            'is_unique' => mblang('Email already registered'),
            'valid_email' => mblang('The Email field must contain a valid email address'),
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]', [
            'matches' => mblang('Passwords are not the same'),
            'min_length' => mblang('Password must be a minimum of 8 characters length'),
            "required" => "%s " . mblang('Required') . "",
        ]);

        $this->form_validation->set_rules('confirm_password', 'Password', 'required|trim|min_length[8]|matches[password]', [
            'matches' => mblang('Passwords are not the same'),
            'min_length' => mblang('Password must be a minimum of 8 characters length'),
            "required" => "%s " . mblang('Required') . "",
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->data['title'] = mblang('Sign Up');
            $this->load->view('admin/user/store', $this->data);
        } else {
            $data = [
                'first_name' => htmlspecialchars($this->input->post('first_name', TRUE)),
                'last_name' => htmlspecialchars($this->input->post('last_name', TRUE)),
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'no_phone' => htmlspecialchars($this->input->post('no_phone', TRUE)),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT),
                'image' => 'default.png',
                'role_id' => 1,
                'is_active' => 1,
                'created_date' => date("Y-m-d"),
                'created_time' => date('H:i:s'),
            ];
            $this->auth->signUp($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' .  mblang('Registered Successfully') . '!
      </div>');
            redirect('administration/users');
        }
    }
}


/* End of file About.php */
/* Location: ./application/controllers/About.php */