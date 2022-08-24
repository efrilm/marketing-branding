<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Config
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

class Config extends CI_Controller
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

    $this->form_validation->set_rules('title', mblang('Title'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('email', mblang('Email'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('company_name', mblang('Company Name'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('company_field', mblang('Company Field'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('keywords', mblang('Keywords'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('no_phone', mblang('No. Phone'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('description', mblang('Description'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('no_whatsapp', mblang('No. Whatsapp'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    $this->form_validation->set_rules('address', mblang('Address'), 'required', [
      'required' => '%s ' . mblang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = mblang('Website Configuration');
      $this->data['config'] = $this->config_model->getWebConfig();
      $this->template->load('admin/template', 'admin/web_config/web_config', $this->data);
    } else {
      $data = [
        'title' => htmlspecialchars($this->input->post('title', TRUE)),
        'email' => htmlspecialchars($this->input->post('email', TRUE)),
        'company_name' => htmlspecialchars($this->input->post('company_name', TRUE)),
        'company_field' => htmlspecialchars($this->input->post('company_field', TRUE)),
        'keywords' => htmlspecialchars($this->input->post('keywords', TRUE)),
        'no_phone' => htmlspecialchars($this->input->post('no_phone', TRUE)),
        'description' => htmlspecialchars($this->input->post('description', TRUE)),
        'no_whatsapp' => htmlspecialchars($this->input->post('no_whatsapp', TRUE)),
        'address' => htmlspecialchars($this->input->post('address', TRUE)),
      ];
      $this->config_model->updateConfig($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    ' .  mblang('Updated Successfully') . '!
    </div>');
      redirect('administration/web-configuration');
    }
  }

  public function socialMedia()
  {
    $facebook = htmlspecialchars($this->input->post('facebook', TRUE));
    $instagram = htmlspecialchars($this->input->post('instagram', TRUE));
    $data = [
      'facebook' => $facebook,
      'instagram' => $instagram,
    ];
    $update = $this->config_model->updateConfig($data);
    if ($update) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' .  mblang('Updated Successfully') . '!
      </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' .  mblang('Updated Failed') . '!
      </div>');
    }
    redirect('administration/web-configuration');
  }
}


/* End of file Config.php */
/* Location: ./application/controllers/Config.php */