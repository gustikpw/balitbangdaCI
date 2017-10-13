<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('Bidang_model','bidang');
  }

	public function index()
	{
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
		$link = site_url('index.php/bidang');
		$link2 = site_url('index.php/news/get');
	$list = $this->bidang->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $br) {
		$no++;
		$row = array();
		$row[] = $br->id_bidang;
		$row[] = "<b>$br->bidang</b>";
		$row[] = $br->slug;
	//add html for action
		$row[] = "<a class=\"btn btn-xs btn-warning\" href=\"javascript:void()\" onclick=\"editbd('$br->id_bidang')\" title=\"Edit\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
				<a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deletebd('$br->id_bidang')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>";

		$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->bidang->count_all(),
						"recordsFiltered" => $this->bidang->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function save_bidang()
	{
		$data = array(
		'bidang' => $this->input->post('bidang'),
		'slug' => $this->input->post('slug'),
		);
		$insert = $this->bidang->save($data);
		// redirect(site_url('index.php/bidang/openurl/bidang'));
		// echo json_encode($data);
		echo json_encode(array("status" => TRUE));
	}

	public function update_bidang()
	{
		$data = array(
		'bidang' => $this->input->post('bidang'),
		'slug' => $this->input->post('slug'),
		);
		$this->bidang->update(array('id_bidang' => $this->input->post('id_bidang')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function delete_bidang($id_bidang)
	{
		$this->bidang->delete_by_id($id_bidang);
		echo json_encode(array("status" => TRUE));
	}

	// public function openurl($segmen)
	// {
	// 	if ($segmen == 'bidang') {
	// 		$data['pg_header'] = 'Daftar Bidang Kerja';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/bidang/bidang");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/bidang/bidang_js");
	// 	} else {
	// 		$this->index();
	// 	}
	// }

	public function get_edit($id_bidang=FALSE)
	{
		$data= $this->bidang->get_by_id($id_bidang);
		echo json_encode($data);
	}

}
