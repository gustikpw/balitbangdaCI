<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penulis extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('penulis_model','penulis');
  }

	public function index()
	{
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
		$link = site_url('index.php/penulis');
		$link2 = site_url('index.php/news/get');
	$list = $this->penulis->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $br) {
		$no++;
		$row = array();
		$row[] = $br->id_penulis;
		$row[] = "<b><a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewpn('$br->id_penulis')\" title=\"Lihat detail\" >$br->nama_penulis</a></b>";
		$row[] = $br->alamat;
		$row[] = $br->telp;
		$row[] = "<a href=\"$br->situs_web\" target=\"_blank\">".$br->situs_web."</a>";
		$row[] = $br->bio;
	//add html for action

		$row[] = "<div class=\"btn-group\">
				<a href=\"javascript:void()\" onclick=\"editpn('$br->id_penulis')\" class=\"btn btn-sm btn-default\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
					<button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
						<span class=\"caret\"></span>
					</button>
					<ul class=\"dropdown-menu\">
						<li><a href=\"javascript:void()\" onclick=\"deletepn('$br->id_penulis')\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>
						<li><a href=\"javascript:void()\" onclick=\"viewpn('$br->id_penulis')\"><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a></li>
					</ul>
				</div>";
		$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->penulis->count_all(),
						"recordsFiltered" => $this->penulis->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function save_penulis()
	{
		$data = array(
		'nama_penulis' => $this->input->post('nama_penulis'),
		'alamat' => $this->input->post('alamat'),
		'telp' => $this->input->post('telp'),
		'situs_web' => $this->input->post('situs_web'),
		'bio' => $this->input->post('bio'),
		);
		$insert = $this->penulis->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function update_penulis()
	{
		$data = array(
		'nama_penulis' => $this->input->post('nama_penulis'),
		'alamat' => $this->input->post('alamat'),
		'telp' => $this->input->post('telp'),
		'situs_web' => $this->input->post('situs_web'),
		'bio' => $this->input->post('bio'),
		);
		$this->penulis->update(array('id_penulis' => $this->input->post('id_penulis')), $data);
		// redirect(site_url('index.php/dashboard/openurl/penulis'));
		echo json_encode(array("status" => TRUE));
	}

	public function delete_penulis($id_penulis)
	{
		$this->penulis->delete_by_id($id_penulis);
		echo json_encode(array("status" => TRUE));
	}

	public function viewDetail($id_penulis)
	{
		$data = $this->penulis->get_by_id($id_penulis);
		echo json_encode($data);
	}

}
// $row[] = "<a class=\"btn btn-xs btn-warning\" href=\"javascript:void()\" onclick=\"editpn('$br->id_penulis')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
// <a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deletepn('$br->id_penulis')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
// <a class=\"btn btn-xs btn-primary\" href=\"javascript:void()\" onclick=\"viewpn('$br->id_penulis')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a>";
