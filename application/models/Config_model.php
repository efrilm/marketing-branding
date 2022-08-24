<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

  protected $table = 'tb_web_config';

  public function __construct()
  {
    parent::__construct();
  }

  public function getWebConfig(){
    $this->db->where('id_config','1');
    $query = $this->db->get($this->table);
    return $query->row();
  }

  public function updateConfig($data)
  {
    $this->db->where('id_config', '1');
    $query = $this->db->update($this->table, $data);
    return $query;
  }

}
