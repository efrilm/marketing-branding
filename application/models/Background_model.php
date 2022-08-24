<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Background_model extends CI_Model
{

  protected $background = 'tb_background';

  public function getBackground()
  {
    $this->db->where('id', '1');
    $query = $this->db->get($this->background)->row();
    return $query;
  }

  public function editBackground($data)
  {
    $this->db->where('id', '1');
    $query = $this->db->update($this->background, $data);
    return $query;
  }
}
