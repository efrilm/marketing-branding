<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Home
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

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['config'] =  $this->config_model->getWebConfig();
  }

  public function index()
  {
    $this->data['title'] = $this->data['config']->title;
    $this->data['category'] =  $this->category->getCategoryAll()->result();
    $this->data['portfolio'] =  $this->portfolio->getPortfolioAll()->result();
    $this->data['bg'] = $this->background->getBackground();
    $this->template->load('frontend/template', 'frontend/home/index', $this->data);
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */