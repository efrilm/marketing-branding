<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Portfolio
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

class Portfolio extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['config'] =  $this->config_model->getWebConfig();
  }

  public function index()
  {
    $this->data['title'] = 'Portfolio';
    $this->data['portfolio'] = $this->portfolio->getPortfolioAll()->result();
    $this->data['category'] = $this->category->getCategoryAll()->result();
    $this->template->load('frontend/template', 'frontend/portfolio/portfolio', $this->data);
  }

  public function detail($seo)
  {
    $this->data['title'] = 'Detail';
    $this->data['portfolio'] = $this->portfolio->getPortfolioBySeo($seo)->row();
    $this->data['bg'] = $this->background->getBackground();
    $this->template->load('frontend/template', 'frontend/portfolio/detail_portfolio', $this->data);
  }
}


/* End of file Portfolio.php */
/* Location: ./application/controllers/Portfolio.php */