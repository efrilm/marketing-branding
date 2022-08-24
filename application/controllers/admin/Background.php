<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Background
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

class Background extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('administration/sign-in');
    }
    $this->data['user'] = $this->user->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function index($action = '')
  {
    $this->data['title'] = mblang('Backgrounds');
    $this->data['action'] = $action;
    $this->data['bg'] = $this->background->getBackground();
    $this->template->load('admin/template', 'admin/background/background', $this->data);
    if ($action == 'editBgHome') {
      $this->editBgHome();
    } else if ($action == 'editBgPd') {
      $this->editBgPd();
    } else if ($action == 'editBgService') {
      $this->editBgService();
    } else if ($action == 'editBgServiceFeature') {
      $this->editBgServiceFeature();
    } else if ($action == 'editBgPortfolio') {
      $this->editBgPortfolio();
    } else if ($action == 'editBgAbout') {
      $this->editBgAbout();
    } else if ($action == 'editBgContact') {
      $this->editBgContact();
    }
  }

  private function editBgHome()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_sizes'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_home';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $upload_data = array('bg_home' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_home']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_home' => $upload_data['bg_home']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }
  private function editBgPd()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_sizes'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_pd';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $upload_data = array('bg_pd' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_pd']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_product_digital' => $upload_data['bg_pd']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }

  public function editBgService()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_sizes'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_service';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $upload_data = array('bg_service' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_service']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_service' => $upload_data['bg_service']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }

  public  function editBgServiceFeature()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_sizes'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_service_feature';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $upload_data = array('bg_service_feature' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_service_feature']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_service_feature' => $upload_data['bg_service_feature']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }
  public function editBgPortfolio()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_portfolio';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $bg = $this->background->getBackground();
      if ($bg->bg_portfolio != null) {
        unlink('./assets/images/backgrounds/' . $bg->bg_portfolio);
      }
      $upload_data = array('bg_portfolio' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_portfolio']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_portfolio' => $upload_data['bg_portfolio']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }

  public function editBgAbout()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_about';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $bg = $this->background->getBackground();
      if ($bg->bg_about != null) {
        unlink('./assets/images/backgrounds/' . $bg->bg_about);
      }
      $upload_data = array('bg_about' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_about']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_about' => $upload_data['bg_about']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }

  public function editBgContact()
  {
    $config['upload_path'] = './assets/images/backgrounds/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'bg_contact';
    if (!$this->upload->do_upload($photo)) {
    } else {
      $bg = $this->background->getBackground();
      if ($bg->bg_contact != null) {
        unlink('./assets/images/backgrounds/' . $bg->bg_contact);
      }
      $upload_data = array('bg_contact' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/backgrounds/' . $upload_data['bg_contact']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'bg_contact' => $upload_data['bg_contact']['file_name'],
        'updated' => date('Y-m-d H:i:s'),
      ];
      $edit = $this->background->editBackground($data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/backgrounds');
    }
  }
}



/* End of file Background.php */
/* Location: ./application/controllers/Background.php */