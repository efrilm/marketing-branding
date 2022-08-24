<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

  protected $table = 'tb_user';

  public function __construct()
  {
    parent::__construct();
  }

  public function signUp($data)
  {
    $query = $this->db->insert($this->table, $data);
    return $query;
  }

  public function checkEmail($email)
  {
    $this->db->where('email', $email);
    $query = $this->db->get($this->table);
    return $query;
  }
}
