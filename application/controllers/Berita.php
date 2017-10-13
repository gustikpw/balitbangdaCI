<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('Berita_model','berita');
  }

	public function index()
	{
		// echo "Directory not founds!";
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
	if ($this->session->level=='administrator' || $this->session->level=='penulis') {
		$link = site_url('index.php/berita');
		$link2 = site_url('index.php/news/get');
		$list = $this->berita->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $br) {
			$no++;
			$row = array();
			$row[] = $br->id_berita;
			$row[] = "<b>$br->judul</b>";
			$row[] = $br->bidang;
			$row[] = $br->poster;
			$row[] = $pb = ($br->publish=='1') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-primary\">Published</a>" : "<a href='#' class=\"btn btn-xs btn-warning\">No</a>";
			$row[] = $cm = ($br->comment_mode=='On') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-primary\">Enabled</a>" : "<a href='#' class=\"btn btn-xs btn-warning\">Disabled</a>";
		//add html for action
			$row[] = "<a class=\"btn btn-xs btn-warning\" href=\"$link/edit/$br->id_berita\" title=\"Edit\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
					<a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deletebr('$br->id_berita')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
					<a class=\"btn btn-xs btn-primary\" href=\"$link2/$br->slug\" target=\"_blank\" title=\"Lihat Detail\"><i class=\"glyphicon glyphicon-eye-open\"></i> View</a>";

			$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->berita->count_all(),
							"recordsFiltered" => $this->berita->count_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output);
		}
	}

	// public function save_berita()
	// {
	// 	$data = array(
	// 	'judul' => $this->input->post('judul'),
	// 	'slug' => $this->input->post('slug'),
	// 	'poster' => '2',
	// 	'tgl_posting' => date('Y-m-d H:m:s'),
	// 	'bidang' => $this->berita->input->post('bidang'),
	// 	'link_gambar' => '',
	// 	'berita' => $this->input->post('berita'),
	// 	'tag' => $this->input->post('tag'),
	// 	'publish' => $pub = ($this->berita->input->post('publish')==null) ? '0':'1',
	// 	'comment_mode' => $pos = ($this->berita->input->post('comment_mode')==null) ? 'Off':'On',
	// 	);
	// 	$insert = $this->berita->save($data);
	// 	redirect(site_url('index.php/berita/openurl/berita'));
	// 	// echo json_encode($data);
	// 	// echo json_encode(array("status" => TRUE));
	// }
	//
	// public function update_berita()
	// {
	// 	$data = array(
	// 	'judul' => $this->berita->input->post('judul'),
	// 	'slug' => $this->berita->input->post('slug'),
	// 	'poster' => '2',
	// 	'tgl_posting' => date('Y-m-d H:m:s'),
	// 	'bidang' => $this->berita->input->post('bidang'),
	// 	'link_gambar' => '',
	// 	'berita' => $this->berita->input->post('berita'),
	// 	'tag' => $this->berita->input->post('tag'),
	// 	'publish' => $pub = ($this->berita->input->post('publish')==null) ? '0':'1',
	// 	'comment_mode' => $pos = ($this->berita->input->post('comment_mode')==null) ? 'Off':'On',
	// 	);
	// 	$this->berita->update(array('id_berita' => $this->input->post('id_berita')), $data);
	// 	redirect(site_url('index.php/berita/openurl/berita'));
	// }
	//
	// public function delete_berita($id_berita)
	// {
	// 	$this->berita->delete_by_id($id_berita);
	// 	// redirect(site_url('index.php/news/dashboard'));
	// 	echo json_encode(array("status" => TRUE));
	// }

	// public function openurl($segmen)
	// {
	// 	$this->_autentikasi();
	// 	$data['title'] = 'BALITBANGDA KOTA PALU';
	// 	if ($segmen == 'berita') {
	// 		$data['pg_header'] = 'Daftar Berita';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/berita/table");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/berita/table_js");
	// 	} elseif ($segmen == 'create') {
	// 		$data['bidang'] = $this->berita->unitKerjaAll()->result();
	// 		$data['pg_header'] = 'Editor Berita';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/berita/editors");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/berita/editors_js");
	// 	} elseif ($segmen == 'bidang') {
	// 		$data['pg_header'] = 'Bidang Kerja';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/berita/bidang");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/berita/bidang_js");
	// 	} elseif ($segmen == 'komentar') {
	// 		$data['pg_header'] = 'Komentar Berita';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/berita/komentar");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/berita/komentar_js");
	// 	} elseif ($segmen == 'penulis') {
	// 		$data['pg_header'] = 'Penulis Berita';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/berita/penulis");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/berita/penulis_js");
	// 	} else {
	// 		$this->index();
	// 	}
	// }

	// public function edit($id_berita=FALSE)
	// {
	// 	if ($id_berita===FALSE) {
	// 		$data['title'] = 'Not Founds';
	// 		$this->load->view('errors/html/error_404',$data);
	// 	} else {
	// 		$data['isi'] = $this->berita->get_by_id($id_berita);
	// 		$data['listbidang'] = $this->berita->unitKerjaAll()->result();
	// 		$data['pg_header'] = 'Editor Berita';
	// 		$this->load->view("admin-page/tmp/head",$data);
	// 		$this->load->view("admin-page/berita/editors_edit");
	// 		$this->load->view("admin-page/tmp/footer");
	// 		$this->load->view('admin-page/templates/script');
	// 		$this->load->view("admin-page/berita/editors_js");
	// 		// echo json_encode($data);
	// 	}
	// }

	private function _autentikasi()
	{
		if ($this->session->level=='administrator' || $this->session->level=='penulis') {
			$this->openurl('berita');
		} else {
			redirect(site_url('index.php/login'));
		}
	}

}
