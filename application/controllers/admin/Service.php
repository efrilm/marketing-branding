<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Services
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
 *e
 */

class Service extends CI_Controller
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
    $this->data['title'] = mblang('Services');
    $this->data['service'] = $this->service->getServiceAll()->result();
    $this->template->load('admin/template', 'admin/service/service', $this->data);
  }

  public function detailService($seo)
  {
    $this->data['service'] = $this->service->getServiceBySeo($seo)->row();
    $this->data['title'] =  $this->data['service']->service_name;
    $this->data['feature'] =  $this->feature->getFeatureByServiceId($this->data['service']->id_service)->result();
    $this->template->load('admin/template', 'admin/service/detail_service', $this->data);
  }

  public function addService()
  {

    $this->form_validation->set_rules('service_name',  mblang('Service Name'), 'required|trim', [
      'required' => '%s' . mblang('Required') . '*',
    ]);
    $this->form_validation->set_rules('category_id',  mblang('Category Name'), 'required|trim', [
      'required' => '%s' . mblang('Required') . '*',
    ]);
    $this->form_validation->set_rules('service_description',  mblang('Service Description'), 'required|trim', [
      'required' => '%s' . mblang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = mblang('Add New Service');
      $this->data['category'] = $this->category->getCategoryAll()->result();
      $this->template->load('admin/template', 'admin/service/add_service', $this->data);
    } else {
      $this->processAdd();
    }
  }

  private function processAdd()
  {
    $config['upload_path'] = './assets/images/services/';
    $config['allowed_types'] = 'gif|png|jpg|jpeg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'service_photo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['title'] = mblang('Add New Service');
      $this->data['category'] = $this->category->getCategoryAll()->result();
      $this->data['error_upload'] = $this->upload->display_errors();
      $this->template->load('admin/template', 'admin/service/add_service', $this->data);
    } else {
      $upload_data = array('service_photo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/services/' . $upload_data['service_photo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'service_name' => htmlspecialchars($this->input->post('service_name')),
        'service_seo' => strtolower(url_title($this->input->post('service_name'))),
        'service_description' => htmlspecialchars($this->input->post('service_description')),
        'service_photo' => $upload_data['service_photo']['file_name'],
        'category_id' => htmlspecialchars($this->input->post('category_id')),
        'is_active' => 1,
        'created_date' => date('Y-m-d'),
        'created_time' => date('H:i:s'),
        'update_date' => date('Y-m-d'),
        'update_time' => date('H:i:s'),
      ];
      $add = $this->service->addService($data);
      if ($add) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Added Successfully') . '!</div>');
        redirect('administration/service');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Deleted Successfully') . '!</div>');
        redirect('administration/service');
      }
    }
  }

  public function editService($id)
  {

    $this->form_validation->set_rules('service_name', mblang('Service Name'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('category_id', mblang('Category Name'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('service_description', mblang('Service Description'), 'required|trim', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title']  = mblang('Edit Service');
      $this->data['service'] =  $this->service->getServiceById($id)->row();
      $this->data['category'] =  $this->category->getCategoryAll()->result();
      $this->template->load('admin/template', 'admin/service/edit_service', $this->data);
    } else {
      $this->processEdit($id);
    }
  }

  private function processEdit($id)
  {
    $config['upload_path'] = './assets/images/services/';
    $config['allowed_types'] = 'gif|png|jpg|jpeg';
    $config['max_size'] = 700;
    $this->upload->initialize($config);
    $photo = 'service_photo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['title']  = mblang('Edit Service');
      $this->data['service'] =  $this->service->getServiceById($id)->row();
      $this->data['category'] =  $this->category->getCategoryAll()->result();
      $this->template->load('admin/template', 'admin/service/edit_service', $this->data);
    } else {
      $upload_data = array('service_photo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/services/' . $upload_data['service_photo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'service_name' => htmlspecialchars($this->input->post('service_name')),
        'service_seo' => strtolower(url_title($this->input->post('service_name'))),
        'service_description' => htmlspecialchars($this->input->post('service_description')),
        'service_photo' => $upload_data['service_photo']['file_name'],
        'category_id' => htmlspecialchars($this->input->post('category_id')),
        'update_date' => date('Y-m-d'),
        'update_time' => date('H:i:s'),
      ];
      $edit = $this->service->editService($id, $data);
      if ($edit) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          ' . mblang('Updated Successfully') . '!</div>');
        redirect('administration/service');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          ' . mblang('Deleted Successfully') . '!</div>');
        redirect('administration/service');
      }
    }
    $data = [
      'service_name' => htmlspecialchars($this->input->post('service_name')),
      'service_seo' => strtolower(url_title($this->input->post('service_name'))),
      'service_description' => htmlspecialchars($this->input->post('service_description')),
      'category_id' => htmlspecialchars($this->input->post('category_id')),
      'update_date' => date('Y-m-d'),
      'update_time' => date('H:i:s'),
    ];
    $edit = $this->service->editService($id, $data);
    if ($edit) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . mblang('Updated Successfully') . '!</div>');
      redirect('administration/service');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        ' . mblang('Deleted Successfully') . '!</div>');
      redirect('administration/service');
    }
  }

  public function delete($id)
  {
    // DELETE IMAGE
    $service = $this->service->getServiceById($id);
    if ($service->service_photo != '') {
      unlink('./assets/images/services/' . $service->service_photo);
    }

    $this->service->deleteService($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . mblang('Deleted Successfully') . '!</div>');
    redirect('administration/service');
  }
}


/* End of file Services.php */
/* Location: ./application/controllers/Services.php */