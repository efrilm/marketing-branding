<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Service_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Service_model extends CI_Model
{

  protected $service = 'tb_service';

  public function __construct()
  {
    parent::__construct();
  }

  public function getServiceAll()
  {
    $this->db->order_by('update_date', 'DESC');
    $this->db->order_by('update_time', 'DESC');
    $this->db->join('tb_category', 'tb_category.id_category = tb_service.category_id');
    $query = $this->db->get($this->service);
    return $query;
  }

  public function getServiceByCategory($id)
  {
    $this->db->order_by('update_date', 'DESC');
    $this->db->order_by('update_time', 'DESC');
    $this->db->join('tb_category', 'tb_category.id_category = tb_service.category_id');
    $this->db->where('category_id', $id);
    $query = $this->db->get($this->service);
    return $query;
  }

  public function getRecentServiceLimit($id, $limit)
  {
    $this->db->limit($limit);
    $this->db->order_by('created_date', 'DESC');
    $this->db->order_by('created_time', 'DESC');
    $this->db->join('tb_category', 'tb_category.id_category = tb_service.category_id');
    $this->db->where('category_id', $id);
    $query = $this->db->get($this->service);
    return $query;
  }

  public function getServiceBySeo($seo)
  {
    $this->db->where('service_seo', $seo);
    $this->db->join('tb_category', 'tb_category.id_category =  tb_service.category_id');
    $query = $this->db->get($this->service);
    return $query;
  }

  public function getServiceById($seo)
  {
    $this->db->where('id_service', $seo);
    $this->db->join('tb_category', 'tb_category.id_category =  tb_service.category_id');
    $query = $this->db->get($this->service);
    return $query;
  }

  public function addService($data)
  {
    $query = $this->db->insert($this->service, $data);
    return $query;
  }

  public function editService($id, $data)
  {
    $this->db->where('id_service', $id);
    $query = $this->db->update($this->service, $data);
    return $query;
  }

  public function deleteService($id)
  {
    $this->db->where('id_service', $id);
    $query = $this->db->delete($this->service);
    return $query;
  }
}

/* End of file Service_model.php */
/* Location: ./application/models/Service_model.php */