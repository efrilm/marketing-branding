<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Portfolio_model
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

class Portfolio_model extends CI_Model
{

  protected $table = 'tb_portfolio';

  public function __construct()
  {
    parent::__construct();
  }

  public function getPortfolioAll()
  {
    $this->db->join('tb_category', 'tb_category.id_category = tb_portfolio.category_id');
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getPortfolioById($id)
  {
    $this->db->where('id_portfolio', $id);
    $this->db->join('tb_category', 'tb_category.id_category = tb_portfolio.category_id');
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getPortfolioBySeo($seo)
  {
    $this->db->where('portfolio_seo', $seo);
    $this->db->join('tb_category', 'tb_category.id_category = tb_portfolio.category_id');
    $query = $this->db->get($this->table);
    return $query;
  }

  public function deletePortfolio($id)
  {
    $this->db->where('id_portfolio', $id);
    $query = $this->db->delete($this->table);
    return $query;
  }

  public function editPortfolio($id, $data)
  {
    $this->db->where('id_portfolio', $id);
    $query = $this->db->update($this->table, $data);
    return $query;
  }

  public function addPortfolio($data)
  {
    $query = $this->db->insert($this->table, $data);
    return $query;
  }
}

/* End of file Portfolio_model.php */
/* Location: ./application/models/Portfolio_model.php */