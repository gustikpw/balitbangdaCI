<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tamu_model extends CI_Model {

  var $table = 'buku_tamu';
  var $table2 = 'setup_buku_tamu';
  var $column = array('id_tamu','nama','alamat','telp','perihal','pesan','tgl_kunjungan','ip_address');
  var $order = array('id_tamu'=>'DESC');

  function __construct()
  {
      parent::__construct();
      $this->load->database();
  }
  // serverside datatable
  private function _get_datatables_query()
  {
    $this->db->from($this->table);
    $i = 0;
    foreach ($this->column as $item) // loop column
    {
      if($_POST['search']['value']) // if datatable send POST for search
      {
        if($i===0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        }
        else
        {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if(count($this->column) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $column[$i] = $item; // set column array variable to order processing
      $i++;
    }
    if(isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    }
    else if(isset($this->order))
    {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
// batas serverside datatable
  //CRUD tamu
  public function get_by_id($id_tamu)
  {
    $this->db->from($this->table);
    $this->db->where('id_tamu',$id_tamu);
    $query = $this->db->get();

    return $query->row();
  }

  public function save($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_by_id($id_tamu)
  {
    $this->db->where('id_tamu', $id_tamu);
    $this->db->delete($this->table);
  }

  // SETUP
  public function getSetup_by_id($id_setup)
  {
    $this->db->from($this->table2);
    $this->db->where('id_setup',$id_setup);
    $query = $this->db->get();
    return $query->row();
  }

  public function setupUpdate($where, $data)
  {
    $this->db->update($this->table2, $data, $where);
    return $this->db->affected_rows();
  }

  public function del_setTamu($id_setup)
  {
    $this->db->where('id_setup', $id_setup);
    $this->db->delete($this->table2);
  }


}
