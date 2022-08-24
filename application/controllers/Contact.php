<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Contact
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

class Contact extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['config'] =  $this->config_model->getWebConfig();
  }

  public function index()
  {
    $this->data['title'] = 'Kontak';
    $this->data['bg'] = $this->background->getBackground();
    $this->template->load('frontend/template', 'frontend/contact/contact', $this->data);
  }
}


/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */