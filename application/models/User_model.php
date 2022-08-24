
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  protected $table = 'tb_user';

  public function __construct()
  {
    parent::__construct();
  }

  public function getUserByEmail($email)
  {
    $this->db->where('email', $email);
    $query = $this->db->get($this->table);
    return $query;
  }
  public function getUserAll()
  {
    return $this->db->get($this->table)->result();
  }
}
