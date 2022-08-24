<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Portfolio extends CI_Controller
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
    $this->data['title'] = mblang('Portfolio');
    $this->data['port'] = $this->portfolio->getPortfolioAll()->result();
    $this->template->load('admin/template', 'admin/portfolio/portfolio', $this->data);
  }

  public function detailPortfolio($seo)
  {
    $this->data['port'] = $this->portfolio->getPortfolioBySeo($seo)->row();
    $this->data['title'] = $this->data['port']->portfolio_name;
    $this->template->load('admin/template', 'admin/portfolio/detail_portfolio', $this->data);
  }

  public function add()
  {

    $this->form_validation->set_rules('portfolio_name', mblang('Portfolio Name'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('category_id', mblang('Category Name'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('client_name', mblang('Client Name'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('client_location', mblang('Client Location'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('time_frame', mblang('Time Frame'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('year', mblang('Year'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);


    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/images/portfolio/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|icon';
      $config['max_size'] = 700;
      $this->upload->initialize($config);
      $photo = 'portfolio_photo';
      if (!$this->upload->do_upload($photo)) {
        $this->data['title'] = mblang('Add New Portfolio');
        $this->data['category'] = $this->category->getCategoryAll()->result();
        $this->data['error_upload'] = $this->upload->display_errors();
        $this->template->load('admin/template', 'admin/portfolio/add_portfolio', $this->data);
      } else {
        $upload_data = array('portfolio_photo' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/product/' . $upload_data['portfolio_photo']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'portfolio_seo' => strtolower(url_title($this->input->post('portfolio_name', TRUE))),
          'portfolio_name' => htmlspecialchars($this->input->post('portfolio_name', TRUE)),
          'category_id' => htmlspecialchars($this->input->post('category_id', TRUE)),
          'client_name' => htmlspecialchars($this->input->post('client_name', TRUE)),
          'client_location' => htmlspecialchars($this->input->post('client_location', TRUE)),
          'time_frame' => htmlspecialchars($this->input->post('time_frame', TRUE)),
          'year' => htmlspecialchars($this->input->post('year', TRUE)),
          'description' => htmlspecialchars($this->input->post('description', TRUE)),
          'portfolio_photo' => $upload_data['portfolio_photo']['file_name'],
          'created_date' => date('Y-m-d'),
          'created_time' => date('H:i:s'),
          'is_active' => 1,
        );
        $this->portfolio->addPortfolio($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . mblang('Added Successfully') . '!</div>');
        redirect('administration/portfolio');
      }
    }

    $this->data['title'] = mblang('Add New Portfolio');
    $this->data['category'] = $this->category->getCategoryAll()->result();
    $this->template->load('admin/template', 'admin/portfolio/add_portfolio', $this->data);
  }

  public function edit($id)
  {

    $this->form_validation->set_rules('portfolio_name', mblang('Portfolio Name'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('category_id', mblang('Category Name'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('client_name', mblang('Client Name'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('client_location', mblang('Client Location'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('time_frame', mblang('Time Frame'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('year', mblang('Year'), 'required', [
      'required' => "%s " . mblang('Required') . '*',
    ]);

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/images/portfolio/';
      $config['allowed_types'] = 'gif|jpg|jpeg|png|icon';
      $config['max_size'] = 700;
      $this->upload->initialize($config);
      $photo = 'portfolio_photo';
      if (!$this->upload->do_upload($photo)) {
        $this->data['title'] = mblang('Edit Portfolio');
        $this->data['category'] = $this->category->getCategoryAll()->result();
        $this->data['port'] = $this->portfolio->getPortfolioById($id)->row();
        $this->template->load('admin/template', 'admin/portfolio/edit_portfolio', $this->data);
      } else {
        // DELETE IMAGE
        $port = $this->portfolio->getPortfolioById($id)->row();
        if ($port->portfolio_photo != "") {
          unlink('./assets/images/portfolio/' . $port->portfolio_photo);
        }
        $upload_data = array('portfolio_photo' => $this->upload->data());
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/portfolio/' . $upload_data['portfolio_photo']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'portfolio_seo' => strtolower(url_title($this->input->post('portfolio_name', TRUE))),
          'portfolio_name' => htmlspecialchars($this->input->post('portfolio_name', TRUE)),
          'category_id' => htmlspecialchars($this->input->post('category_id', TRUE)),
          'client_name' => htmlspecialchars($this->input->post('client_name', TRUE)),
          'client_location' => htmlspecialchars($this->input->post('client_location', TRUE)),
          'year' => htmlspecialchars($this->input->post('year', TRUE)),
          'time_frame' => htmlspecialchars($this->input->post('time_frame', TRUE)),
          'portfolio_photo' => $upload_data['portfolio_photo']['file_name'],
          'description' => htmlspecialchars($this->input->post('description', TRUE)),
          'update_date' => date('Y-m-d'),
          'update_time' => date('H:i:s'),
        );
        $this->portfolio->editPortfolio($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        ' . mblang('Updated Successfully') . '!</div>');
        redirect('administration/portfolio');
      }
      $data = array(
        'portfolio_seo' => strtolower(url_title($this->input->post('portfolio_name', TRUE))),
        'portfolio_name' => htmlspecialchars($this->input->post('portfolio_name', TRUE)),
        'category_id' => htmlspecialchars($this->input->post('category_id', TRUE)),
        'client_name' => htmlspecialchars($this->input->post('client_name', TRUE)),
        'client_location' => htmlspecialchars($this->input->post('client_location', TRUE)),
        'year' => htmlspecialchars($this->input->post('year', TRUE)),
        'time_frame' => htmlspecialchars($this->input->post('time_frame', TRUE)),
        'description' => htmlspecialchars($this->input->post('description', TRUE)),
        'update_date' => date('Y-m-d'),
        'update_time' => date('H:i:s'),
      );
      $this->portfolio->editPortfolio($id, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
      ' . mblang('Updated Successfully') . '!</div>');
      redirect('administration/portfolio');
    }
    $this->data['title'] = mblang('Edit Portfolio');
    $this->data['category'] = $this->category->getCategoryAll()->result();
    $this->data['port'] = $this->portfolio->getPortfolioById($id)->row();
    $this->template->load('admin/template', 'admin/portfolio/edit_portfolio', $this->data);
  }

  public function delete($id = NULL)
  {
    // DELETE IMAGE
    $portfolio = $this->portfolio->getPortfolioById($id);
    if ($portfolio->portfolio_photo != "") {
      unlink('./assets/images/portfolio/' . $portfolio->portfolio_photo);
    }

    $this->portfolio->deletePortfolio($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    ' . mblang('Deleted Successfully') . '!</div>');
    redirect('administration/portfolio');
  }
}
