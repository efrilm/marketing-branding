<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Client_model
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

class Client_model extends CI_Model
{


  protected $client = 'tb_client';
  protected $company = 'tb_company';

  public function __construct()
  {
    parent::__construct();
  }

  public function getClientAll()
  {
    $this->db->join('tb_company', 'tb_company.id = tb_client.company_id');
    $query = $this->db->get($this->client);
    return $query;
  }

  public function getClientById($id)
  {
    $this->db->join('tb_company', 'tb_company.id = tb_client.company_id');
    $this->db->where('id_client', $id);
    $query =  $this->db->get($this->client);
    return $query;
  }

  public function addClient($data)
  {
    $query = $this->db->insert($this->client, $data);
    return $query;
  }

  public function editClient($id, $data)
  {
    $this->db->where('id_client', $id);
    $query = $this->db->update($this->client, $data);
    return $query;
  }

  public function deleteClient($id)
  {
    $this->db->where('id_client', $id);
    $query = $this->db->delete($this->client  );
    return $query;
  }

  public function getCompanyAll()
  {
    $query = $this->db->get($this->company);
    return $query;
  }

  public function getCompanyById($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->company);
    return $query;
  }

  public function addCompany($data)
  {
    $query = $this->db->insert($this->company, $data);
    return $query;
  }

  public function editCompany($id, $data)
  {
    $this->db->where('id', $id);
    $query = $this->db->update($this->company, $data);
    return $query;
  }

  public function deleteCompany($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->delete($this->company);
    return $query;
  }
}

/* End of file Client_model.php */
/* Location: ./application/models/Client_model.php */