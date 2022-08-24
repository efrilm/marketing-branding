<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Service
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

class Service extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['config'] =  $this->config_model->getWebConfig();
  }

  public function index()
  {
  }

  public function detail($seo)
  {
    $this->data['service'] = $this->service->getServiceBySeo($seo)->row();
    $this->data['title'] = $this->data['service']->service_name;
    $this->data['feature'] = $this->feature->getFeatureByServiceId($this->data['service']->id_service)->result();
    $this->data['recentService'] =  $this->service->getRecentServiceLimit($this->data['service']->category_id, 3)->result();
    $this->data['bg'] =  $this->background->getBackground();
    $this->template->load('frontend/template', 'frontend/service/service_detail', $this->data);
  }
}


/* End of file Service.php */
/* Location: ./application/controllers/Service.php */