<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Berita_model extends CI_Model {

  var $table = 'berita';
  var $table2 = 'v_berita2';
  var $column = array('id_berita','judul','bidang','poster','publish','comment_mode','slug');
  var $order = array('id_berita'=>'DESC');

  function __construct()
  {
      parent::__construct();
      $this->load->database();
  }
  // serverside datatable
  private function _get_datatables_query()
  {

    $this->db->from($this->table2);

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
  public function get_berita($limit,$offset)
  {
      $query = $this->db->get('v_berita',$limit,$offset);
      return $query->result();
  }

	function jumlah_data(){
		return $this->db->get_where('v_berita')->num_rows();
	}

  public function get_news($slug=FALSE)
  {
    $query = $this->db->get_where('v_berita', array('slug' => $slug));
    return $query;
    //->row();
  }

  public function save_komentar($data)
  {
    $this->db->insert('komentar', $data);
    return $this->db->insert_id();
  }

  public function list_komentar($id_berita='')
  {
    $query = $this->db->query("SELECT * FROM komentar WHERE id_berita=$id_berita ORDER BY id_berita DESC");
    return $query->result();
  }

  public function unitKerja_list($slug=FALSE)
  {
    if ($slug!=FALSE) {
      // return $this->db->get_where('bidang',array('slug' => $slug));
      return $this->db->get_where('v_post_bidang',array('slug' => $slug));
    } else {
      // return $this->db->get('bidang');
      return $this->db->get("v_post_bidang");
    }
  }

  public function unitKerjaAll()
  {
      return $this->db->get("bidang");
  }

  public function get_news_by_unitKerja($slug=FALSE,$limit,$offset)
  {
    $this->db->select('*');
    $this->db->from('v_berita');
    $this->db->where(array('slug_bidang' => $slug),$limit,$offset);
    $this->db->order_by('tgl_posting','DESC');
    return $this->db->get();
  }

  public function recentPost()
  {
    return $this->db->query("SELECT * FROM v_berita ORDER BY id_berita DESC LIMIT 5")->result();
  }

  //CRUD Berita
  public function get_by_id($id_berita)
  {
    $this->db->from('berita');
    $this->db->where('id_berita',$id_berita);
    $query = $this->db->get();

    return $query->row();
  }

  public function save($data)
  {
    $this->db->insert('berita', $data);
    return $this->db->insert_id();
  }

  public function update($where, $data)
  {
    $this->db->update('berita', $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_by_id($id_berita)
  {
    $this->db->where('id_berita', $id_berita);
    $this->db->delete('berita');
  }

}
