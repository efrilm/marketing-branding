<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feature_model extends CI_Model
{
  protected $feature = 'tb_feature';

  public function getFeatureById($id)
  {
    $this->db->where('id_feature', $id);
    $query = $this->db->get($this->feature);
    return $query;
  }

  public function getFeatureByServiceId($id)
  {
    $this->db->where('service_id', $id);
    $query = $this->db->get($this->feature);
    return $query;
  }

  public function addFeature($data)
  {
    $query = $this->db->insert($this->feature, $data);
    return $query;
  }

  public function editFeature($id, $data)
  {
    $this->db->where('id_feature', $id);
    $query = $this->db->update($this->feature, $data);
    return $query;
  }

  public function deleteFeature($id)
  {
    $this->db->where('id_feature', $id);
    $query = $this->db->delete($this->feature);
    return $query;
  }
}

/* End of file Feature_model.php */
/* Location: ./application/models/Feature_model.php */