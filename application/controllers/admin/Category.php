<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Category
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

class Category extends CI_Controller
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

    $this->form_validation->set_rules('category_name', mblang('Category Name'), 'required', [
      'required' => '%s ' . mblang('Required')  . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = mblang('Category');
      $this->data['action'] = $action;
      $this->data['category'] = $this->category->getCategoryAll()->result();
      if ($action == 'edit' && $id !== '') {
        $this->data['c'] = $this->category->getCategoryById($id)->row();
      }
      $this->template->load('admin/template', 'admin/category/category', $this->data);
    } else {
      if ($action == 'add') {
        $this->add();
      } else if ($action  == 'edit') {
        $this->edit($id);
      }
    }
  }

  private function add()
  {
    $data = [
      'category_seo' => strtolower(url_title($this->input->post('category_name', TRUE))),
      'category_name' => htmlspecialchars($this->input->post('category_name', TRUE)),
    ];

    $this->category->addCategory($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    ' .  mblang('Added Successfully') . '!
    </div>');
    redirect('administration/category');
  }

  private function edit($id)
  {
    $data = [
      'category_seo' => strtolower(url_title($this->input->post('category_name', TRUE))),
      'category_name' => htmlspecialchars($this->input->post('category_name', TRUE)),
    ];
    $this->category->updateCategory($id, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' .  mblang('Updated Successfully') . '!
    </div>');
    redirect('administration/category');
  }

  public function delete($id)
  {
    $this->category->deleteCategory($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' .  mblang('Deleted Successfully') . '!
    </div>');
    redirect('administration/category');
  }
}




/* End of file Category.php */
/* Location: ./application/controllers/Category.php */