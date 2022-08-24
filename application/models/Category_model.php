<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Category_model extends CI_Model
{

  protected $table = 'tb_category';

  public function __construct()
  {
    parent::__construct();
  }

  public function getCategoryAll()
  {
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getCategoryById($id)
  {
    $this->db->where('id_category', $id);
    $query = $this->db->get($this->table);
    return $query;
  }

  public function addCategory($data)
  {
    $query = $this->db->insert($this->table, $data);
    return $query;
  }

  public function updateCategory($id, $data)
  {
    $this->db->where('id_category', $id);
    $query = $this->db->update($this->table, $data);
    return $query;
  }

  public function deleteCategory($id)
  {
    $this->db->where('id_category', $id);
    $query = $this->db->delete($this->table);
    return $query;
  }
}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */