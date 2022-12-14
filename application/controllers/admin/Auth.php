<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Auth
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function signIn()
  {
    $this->form_validation->set_rules('email', mblang('Email'), 'required|trim|valid_email', [
      'required' => '%s ' . mblang('Required') . '*',
      'valid_email' => '%s ' . mblang('The Email field must contain a valid email address') . '',
    ]);

    $this->form_validation->set_rules('password', mblang('Password'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = mblang('Sign In');
      $this->load->view('admin/auth/sign_in', $this->data);
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email', TRUE);
    $password = $this->input->post('password', TRUE);

    $user  = $this->auth->checkEmail($email)->row();
    // if user already
    if ($user) {
      // if user active
      if ($user->is_active == 1) {
        if (password_verify($password, $user->password)) {
          $data =  [
            'user_id' => $user->id_user,
            'email' => $user->email,
            'role_id' => $user->role_id,
          ];
          $this->session->set_userdata($data);
          redirect('administration/dashboard');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Wrong Password') . '!
          </div>');
          redirect('administration/sign-in');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . mblang('This email has not been actived') . '
        </div>');
        redirect('administration/sign-in');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . mblang('Email Not Registered') . '
      </div>');
      redirect('administration/sign-in');
    }
  }


  public function signOut()
  {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    ' .  mblang('You have successfully signed out') . '!
    </div>');
    redirect('administration/sign-in');
  }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */