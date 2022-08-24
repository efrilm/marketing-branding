<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard
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

class Dashboard extends CI_Controller
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
    $this->data['title'] = 'Dashboard';
    $this->template->load('admin/template', 'admin/dashboard/dashboard', $this->data);
  }

  public function change_language()
  {
    $lang = $this->input->post('id');
    switch ($lang) {
      case 'id':
        $language = 'indonesian';
        break;
      case 'en':
        $language = 'english';
        break;
      default:
        $language = 'english';
        break;
    }

    $this->config->set_item('language', 'indonesian');
    $this->session->set_userdata('mblang', $language);
  }
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */