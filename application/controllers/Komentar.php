<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('komentar_model','komentar');
  }

	public function index()
	{
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
		$link = site_url('index.php/komentar');
		$link2 = site_url('index.php/news/get');
	$list = $this->komentar->get_datatables();
	$data = array();
	$no = $_POST['start'];
	foreach ($list as $br) {
		$no++;
		$row = array();
		$row[] = $br->id_komentar;
		$row[] = "<b><a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewkm('$br->id_komentar')\" title=\"Lihat detail\" >$br->nama_tamu</a></b>";
		$row[] = $br->email;
		$row[] = substr($br->komentar,1,25).'...';
		$row[] = $br->judul;
		$row[] = $br->tanggal;
	//add html for action
		$row[] = "<a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deletekm('$br->id_komentar')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>";

		$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->komentar->count_all(),
						"recordsFiltered" => $this->komentar->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function save_komentar()
	{
		$data = array(
		'nama_tamu' => $this->input->post('nama_tamu'),
		'email' => $this->input->post('email'),
		'komentar' => $this->input->post('komentar'),
		'tanggal' => $this->input->post('tanggal'),
		'id_berita' => $this->input->post('id_berita'),
		);
		$insert = $this->komentar->save($data);
		// redirect(site_url('index.php/komentar/openurl/komentar'));
		// echo json_encode($data);
		echo json_encode(array("status" => TRUE));
	}

	public function update_komentar()
	{
		$data = array(
		'komentar' => $this->input->post('komentar'),
		'slug' => $this->input->post('slug'),
		);
		$this->komentar->update(array('id_komentar' => $this->input->post('id_komentar')), $data);
		redirect(site_url('index.php/dashboard/openurl/komentar'));
	}

	public function delete_komentar($id_komentar)
	{
		$this->komentar->delete_by_id($id_komentar);
		echo json_encode(array("status" => TRUE));
	}

	// public function openurl($segmen)
	// {
	// 	if ($segmen == 'komentar') {
	// 		$data['pg_header'] = 'Daftar komentar Kerja';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/komentar/komentar");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/komentar/komentar_js");
	// 	} else {
	// 		$this->index();
	// 	}
	// }

	public function viewDetail($id_komentar)
	{
		$data = $this->komentar->detailKomentar($id_komentar);
		echo json_encode($data);
	}

	// public function lastKomentar($limit)
	// {
	// 	$data = $this->komentar->lastKomentarByLimit($limit);
	// 	return $data;
	// }

}
