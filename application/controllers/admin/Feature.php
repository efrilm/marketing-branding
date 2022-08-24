<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Feature
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

class Feature extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('administration/sign-in');
    }
    $this->data['user'] = $this->user->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function addFeature($id)
  {
    $this->data['title'] = mblang('Add Feature');
    $this->data['id'] = $id;
    $this->data['count'] = $this->input->post('count');
    $this->template->load('admin/template', 'admin/feature/add_feature', $this->data);
  }

  public function processAdd()
  {
    $id   = $this->input->post('id');
    $count = $this->input->post('count');

    for ($i = 1; $i <= $count; $i++) {
      $data  = [
        'feature_title' => htmlspecialchars($this->input->post('feature_title' . $i)),
        'feature_description' => htmlspecialchars($this->input->post('feature_description' . $i)),
        'service_id' => $id,
      ];
      $feature = $this->feature->addFeature($data);
    }
    if ($feature) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' .  mblang('Added Successfully') . '!
      </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' .  mblang('Added Failed') . '!
      </div>');
    }
    $service = $this->service->getServiceById($id)->row();
    redirect('administration/detail-service/' . $service->service_seo);
  }

  public function editFeature($id)
  {
    $this->data['title'] = mblang('Edit Feature');
    $this->data['feature'] = $this->feature->getFeatureById($id)->row();
    $this->template->load('admin/template', 'admin/feature/edit_feature', $this->data);
  }

  public function processEdit($id)
  {
    $data = [
      'feature_title' => htmlspecialchars($this->input->post('feature_title' . $i)),
      'feature_description' => htmlspecialchars($this->input->post('feature_description' . $i)),
    ];
    $feature = $this->feature->editFeature($id, $data);
    if ($feature) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' .  mblang('Updated Successfully') . '!
      </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' .  mblang('Updated Failed') . '!
      </div>');
    }

    $idService = $this->feature->getFeatureById($id)->row();
    $service = $this->service->getServiceById($idService->service_id)->row();
    redirect('administration/detail-service/' . $service->service_seo);
  }

  public function deleteFeature($id, $seo)
  {
    $delete = $this->feature->deleteFeature($id);
    if ($delete) {
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' .  mblang('Deleted Successfully') . '!
      </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' .  mblang('Deleted Failed') . '!
      </div>');
    }
    redirect('administration/detail-service/' . $seo);
  }
}


/* End of file Feature.php */
/* Location: ./application/controllers/Feature.php */