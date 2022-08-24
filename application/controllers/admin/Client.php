<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Client
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

class Client extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('administration/sign-in');
    }
    $this->data['user'] = $this->user->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function index($action = '', $id = '')
  {
    $this->form_validation->set_rules('client_name', mblang('Client Name'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('company_id', mblang('Company'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('cooperation_date', mblang('Cooperation Date'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = 'Client';
      $this->data['action'] = $action;
      $this->data['company'] =  $this->client->getCompanyAll()->result();
      $this->data['client'] = $this->client->getClientAll()->result();
      if ($action == 'edit' && $id != '') {
        $this->data['c']  = $this->client->getClientById($id)->row();
      }
      $this->template->load('admin/template', 'admin/client/client', $this->data);
    } else {
      if ($action == 'add') {
        $this->addClient();
      } else if ($action == 'edit') {
        $this->editClient($id);
      }
    }
  }

  public function addClient()
  {
    $config['upload_path'] = './assets/images/clients/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_sizes'] = 700;
    $this->upload->initialize($config);
    $photo = 'client_photo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['title'] = 'Client';
      $this->data['action'] = $action;
      $this->data['company'] =  $this->client->getCompanyAll()->result();
      $this->data['client'] = $this->client->getClientAll()->result();
      $this->template->load('admin/template', 'admin/client/client', $this->data);
    } else {
      $upload_data = array('client_photo' => $this->upload->data());
      $config['image_libray'] = 'gd2';
      $config['source_image'] = './assest/images/clients/' . $upload_data['client_photo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'company_id' => htmlspecialchars($this->input->post('company_id', TRUE)),
        'client_name' => htmlspecialchars($this->input->post('client_name', TRUE)),
        'client_email' => htmlspecialchars($this->input->post('client_email', TRUE)),
        'client_photo' => $upload_data['client_photo']['file_name'],
        'cooperation_date' => htmlspecialchars($this->input->post('cooperation_date', TRUE)),
      ];
      $add = $this->client->addClient($data);
      if ($add) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . mblang('Added Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . mblang('Added Failed') . '!</div>');
      }
      redirect('administration/client');
    }
  }

  private function editClient($id)
  {
    $config['upload_path'] = './assets/images/clients/';
    $config['allowed_types'] = 'gif|png|jpg|jpeg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'client_photo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['title'] = 'Client';
      $this->data['action'] = 'edit';
      $this->data['company'] =  $this->client->getCompanyAll()->result();
      $this->data['client'] = $this->client->getClientAll()->result();
      if ($action == 'edit' && $id != '') {
        $this->data['c']  = $this->client->getClientById($id)->row();
      }
      $this->template->load('admin/template', 'admin/client/client', $this->data);
    } else {
      // DELETE IMAGE
      $client = $this->client->getClientById($id)->row();
      if ($client->client_photo != '') {
        unlink('./assets/images/clients/' . $client->client_photo);
      }
      $upload_data = array('client_photo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/clients/' . $upload_data['client_photo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'company_id' => htmlspecialchars($this->input->post('company_id', $id)),
        'client_name' => htmlspecialchars($this->input->post('client_name')),
        'client_email' => htmlspecialchars($this->input->post('client_email')),
        'client_photo' => $upload_data['client_photo']['file_name'],
        'cooperation_date' => htmlspecialchars($this->input->post('cooperation_date')),
      ];
      $edit = $this->client->editClient($id, $data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . mblang('Updated Failed') . '!</div>');
      }
      redirect('administration/client');
    }
    $data = [
      'company_id' => htmlspecialchars($this->input->post('company_id', $id)),
      'client_name' => htmlspecialchars($this->input->post('client_name')),
      'client_email' => htmlspecialchars($this->input->post('client_email')),
      'cooperation_date' => htmlspecialchars($this->input->post('cooperation_date')),
    ];
    $edit = $this->client->editClient($id, $data);
    if ($edit) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' . mblang('Updated Successfully') . '!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . mblang('Updated Failed') . '!</div>');
    }
    redirect('administration/client');
  }

  public function deleteClient($id)
  {
    // DELETE IMAGE
    $client = $this->client->getClientById($id)->row();
    if ($client->client_photo != '') {
      unlink('./assets/images/clients/' . $client->client_photo);
    }

    $this->client->deleteClient($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . mblang('Deleted Successfully') . '!</div>');
    redirect('administration/client');
  }


  public function company($action = '', $id = '')
  {

    $this->form_validation->set_rules('company_name', mblang('Company Name'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('company_location', mblang('Company Location'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('company_field', mblang('Company Field'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);


    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] =  mblang('Company');
      $this->data['action'] =  $action;
      if ($action == 'edit' && $id != '') {
        $this->data['c'] =  $this->client->getCompanyById($id)->row();
      }
      $this->data['company'] =  $this->client->getCompanyAll()->result();
      $this->template->load('admin/template', 'admin/client/company', $this->data);
    } else {
      if ($action == 'add') {
        $this->addCompany();
      } else {
        $this->editCompany($id);
      }
    }
  }

  private function addCompany()
  {
    $config['upload_path'] = './assets/images/company/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'company_logo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['title'] =  mblang('Company');
      $this->data['action'] =  'add';
      $this->data['error_upload'] = $this->upload->error_upload();
      $this->data['company'] =  $this->client->getCompanyAll()->result();
      $this->template->load('admin/template', 'admin/client/company', $this->data);
    } else {
      $upload_data =  array('company_logo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/company/' . $upload_data['company_logo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = array(
        'company_name' => htmlspecialchars($this->input->post('company_name', TRUE)),
        'company_location' => htmlspecialchars($this->input->post('company_location', TRUE)),
        'company_field' => htmlspecialchars($this->input->post('company_field', TRUE)),
        'company_logo' => $upload_data['company_logo']['file_name'],
      );
      $add = $this->client->addCompany($data);
      if ($add) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . mblang('Added Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . mblang('Added Failed') . '!</div>');
      }
      redirect('administration/company');
    }
  }

  public function editCompany($id)
  {
    $config['upload_path'] = './assets/images/company/';
    $config['allowed_types'] = 'gif|png|jpeg|jpg';
    $config['max_sizes'] = 700;
    $this->upload->initialize($config);
    $photo = 'company_logo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['title'] =  mblang('Company');
      $this->data['action'] =  'edit';
      if ($this->data['action'] == 'edit' && $id != '') {
        $this->data['c'] =  $this->client->getCompanyById($id)->row();
      }
      $this->data['company'] =  $this->client->getCompanyAll()->result();
      $this->template->load('admin/template', 'admin/client/company', $this->data);
    } else {
      // DELETE IMAGE
      $company = $this->client->getCompanyById($id)->row();
      if ($company->company_logo != '') {
        unlink('./assets/images/company/' . $company->company_logo);
      }

      $upload_data = array('company_logo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/company/' . $upload_data['company_logo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = array(
        'company_name' => htmlspecialchars($this->input->post('company_name', TRUE)),
        'company_location' => htmlspecialchars($this->input->post('company_location', TRUE)),
        'company_field' => htmlspecialchars($this->input->post('company_field', TRUE)),
        'company_logo' => $upload_data['company_logo']['file_name'],
      );
      $edit = $this->client->editCompany($id, $data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . mblang('Updated Successfully') . '!</div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . mblang('Update Failed') . '!</div>');
      }
      redirect('administration/company');
    }
    $data = array(
      'company_name' => htmlspecialchars($this->input->post('company_name', TRUE)),
      'company_location' => htmlspecialchars($this->input->post('company_location', TRUE)),
      'company_field' => htmlspecialchars($this->input->post('company_field', TRUE)),
    );
    $edit = $this->client->editCompany($id, $data);
    if ($edit) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' . mblang('Updated Successfully') . '!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . mblang('Update Failed') . '!</div>');
    }
    redirect('administration/company');
  }

  public function deleteCompany($id)
  {
    $company = $this->client->getCompanyById($id)->row();
    if ($company->company_logo != '') {
      unlink('./assets/images/company/' . $company->company_logo);
    }

    $delete = $this->client->deleteCompany($id);
    if ($delete) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . mblang('Deleted Successfully') . '!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . mblang('Deleted Failed') . '!</div>');
    }
    redirect('administration/company');
  }
}


/* End of file Client.php */
/* Location: ./application/controllers/Client.php */