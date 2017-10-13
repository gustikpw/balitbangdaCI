<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
class Dashboard extends CI_Controller {
	function __construct()
  {
      parent::__construct();
			$this->load->model('Berita_model','berita');
			$this->load->model('Komentar_model','komentar');
			$this->load->model('penulis_model','penulis');
      $this->load->model('tamu_model','tamu');
  }

	public function index()
	{
		$this->_autentikasi();
	}

	public function ajax_list() {
		if ($this->session->level=='administrator' || $this->session->level=='penulis') {
			$link = site_url('index.php/dashboard');
			$link2 = site_url('index.php/news/get');
			$list = $this->berita->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $br) {
				if ($this->session->alias == $br->poster && $this->session->level === 'penulis') {
					$row = array();
					$row[] = $br->id_berita;
					$row[] = "<b>$br->judul</b>";
					$row[] = $br->bidang;
					$row[] = $br->poster;
					$row[] = $pb = ($br->publish=='1') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-success\">Published</a>" : "<a href='#' class=\"btn btn-xs btn-warning\">No</a>";
					$row[] = $cm = ($br->comment_mode=='On') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-success\">Enabled</a>" : "<a href='#' class=\"btn btn-xs btn-warning\">Disabled</a>";
					//add html for action
					if ($this->session->level==='penulis') {
						$row[] = "<div class=\"btn-group\">
						<a href=\"$link/edit/$br->id_berita\" class=\"btn btn-sm btn-default\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
						<button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
						<span class=\"caret\"></span>
						</button>
						<ul class=\"dropdown-menu\">
						<li><a href=\"$link2/$br->slug\" target=\"_blank\"><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a></li>
						</ul>
						</div>";
					}
					$data[] = $row;

				} elseif ($this->session->level==='administrator') {
					$row = array();
					$row[] = $br->id_berita;
					$row[] = "<b>$br->judul</b>";
					$row[] = $br->bidang;
					$row[] = $br->poster;
					$row[] = $pb = ($br->publish=='1') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-success\">Published</a>" : "<a href='#' class=\"btn btn-xs btn-warning\">No</a>";
					$row[] = $cm = ($br->comment_mode=='On') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-success\">Enabled</a>" : "<a href='#' class=\"btn btn-xs btn-warning\">Disabled</a>";
					//add html for action
					if ($this->session->level==='administrator') {
						$row[] = "<div class=\"btn-group\">
						<a href=\"$link/edit/$br->id_berita\" class=\"btn btn-sm btn-default\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
						<button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
						<span class=\"caret\"></span>
						</button>
						<ul class=\"dropdown-menu\">
						<li><a href=\"javascript:void()\" onclick=\"deletebr('$br->id_berita')\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>
						<li><a href=\"$link2/$br->slug\" target=\"_blank\"><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a></li>
						</ul>
						</div>";
					}
					$data[] = $row;

				}

				// $data[] = $row;
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

	public function save_berita()
	{
		if ($this->session->level=='administrator' || $this->session->level=='penulis') {
			$data = array(
			'judul' => $this->input->post('judul'),
			'slug' => $this->input->post('slug'),
			'poster' => $this->session->writer,
			'tgl_posting' => date('Y-m-d H:m:s'),
			'bidang' => $this->berita->input->post('bidang'),
			'link_gambar' => $this->berita->input->post('link_gambar'),
			'berita' => $this->input->post('berita'),
			'preview' => $this->input->post('preview'),
			'tag' => $this->input->post('tag'),
			'publish' => $pub = ($this->berita->input->post('publish')==null) ? '0':'1',
			'comment_mode' => $pos = ($this->berita->input->post('comment_mode')==null) ? 'Off':'On',
			);
			$insert = $this->berita->save($data);
			redirect(site_url('index.php/dashboard/openurl/berita'));
			// echo json_encode(array("status" => TRUE));
		} else {
			redirect(site_url());
		}
	}

	public function update_berita()
	{
		if ($this->session->level=='administrator' || $this->session->level=='penulis') {
			$data = array(
			'judul' => $this->berita->input->post('judul'),
			'slug' => $this->berita->input->post('slug'),
			'poster' => $this->session->writer,
			'tgl_posting' => date('Y-m-d H:m:s'),
			'bidang' => $this->berita->input->post('bidang'),
			'link_gambar' => $this->berita->input->post('link_gambar'),
			'berita' => $this->berita->input->post('berita'),
			'preview' => $this->input->post('preview'),
			'tag' => $this->berita->input->post('tag'),
			'publish' => $pub = ($this->berita->input->post('publish')==null) ? '0':'1',
			'comment_mode' => $pos = ($this->berita->input->post('comment_mode')==null) ? 'Off':'On',
			);
			$this->berita->update(array('id_berita' => $this->input->post('id_berita')), $data);
			redirect(site_url('index.php/dashboard/openurl/berita'));
		} else {
			redirect(site_url());
		}
	}

	public function delete_berita($id_berita)
	{
		if ($this->session->level=='administrator' || $this->session->level=='penulis') {
			$this->berita->delete_by_id($id_berita);
			echo json_encode(array("status" => TRUE));
		} else {
			redirect(site_url());
		}
	}

	public function openurl($segmen)
	{
		$SESI = 0;
		if ($this->session->level=='penulis') {
			$SESI = 2;
			$data['title'] = 'Dashboard BALITBANGDA KOTA PALU';
			$data['active'] = $segmen; // untuk aktivasi treeview
			if ($segmen == 'berita') {
				$data['pg_header'] = 'Daftar Berita';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/berita/table");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/berita/table_js");
			} elseif ($segmen == 'create') {
				$data['bidang'] = $this->berita->unitKerjaAll()->result();
				$data['pg_header'] = 'Editor Berita';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/berita/editors");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/berita/editors_js");
			} elseif ($segmen == 'board') {
				$data['pg_header'] = 'Dashboard <small></small>';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/dashboard/board");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				// $this->load->view("admin-page/dashboard/board_js");
			} elseif ($segmen == 'upload') {
				$data['pg_header'] = 'Upload Images <small>Images Explorer</small>';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/upload/upload");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
			}
			// elseif ($segmen == 'bidang') {
			// 	$data['pg_header'] = 'Bidang Kerja';
			// 	$this->load->view("admin-page/tmp/head",$data);
			// 	$this->load->view("admin-page/bidang/bidang");
			// 	$this->load->view("admin-page/tmp/footer");
			// 	$this->load->view('admin-page/templates/script');
			// 	$this->load->view('admin-page/templates/credit');
			// 	$this->load->view("admin-page/bidang/bidang_js");
			// }
			elseif ($segmen == 'komentar') {
				$data['pg_header'] = 'Komentar Berita';
				$data['berita'] = $this->komentar->getJudulBerita();
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/komentar/komentar");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/komentar/komentar_js");
			} else {
				redirect(site_url('index.php/login/logout'));
			}
		}

		if ($this->session->level=='administrator') {
			$SESI = 1;
			$data['title'] = 'Dashboard BALITBANGDA KOTA PALU';
			$data['active'] = $segmen; // untuk aktivasi treeview
			if ($segmen == 'berita') {
				$data['pg_header'] = 'Daftar Berita';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/berita/table");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/berita/table_js");
			} elseif ($segmen == 'create') {
				$data['bidang'] = $this->berita->unitKerjaAll()->result();
				$data['pg_header'] = 'Editor Berita';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/berita/editors");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/berita/editors_js");
			} elseif ($segmen == 'bidang') {
				$data['pg_header'] = 'Bidang Kerja';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/bidang/bidang");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/bidang/bidang_js");
			} elseif ($segmen == 'komentar') {
				$data['pg_header'] = 'Komentar Berita';
				$data['berita'] = $this->komentar->getJudulBerita();
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/komentar/komentar");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/komentar/komentar_js");
			} elseif ($segmen == 'penulis') {
				$data['pg_header'] = 'Penulis Berita';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/penulis/penulis");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/penulis/penulis_js");
			} elseif ($segmen == 'users') {
				$data['penulis'] = $this->penulis->getPenulis();
				$data['pg_header'] = 'Users';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/users/users");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/users/users_js");
			} elseif ($segmen == 'info') {
				$data['pg_header'] = 'Info BALITBANGDA KOTA PALU';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/info_lembaga/info");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/Info_lembaga/info_js");
			} elseif ($segmen == 'slider') {
				$data['pg_header'] = 'Slider <small>Tampilan gambar pada halaman utama</small>';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/slider/slider");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/slider/slider_js");
			} elseif ($segmen == 'upload') {
				$data['pg_header'] = 'Upload Images <small>Images Explorer</small>';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/upload/upload");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
			} elseif ($segmen == 'buku_tamu') {
				$data['pg_header'] = 'Buku Tamu <small>Pesan/Komentar dari pengunjung website ini</small>';
				$data['infoBukuTamu'] = $this->tamu->getSetup_by_id(1);
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/buku_tamu/tamu");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				$this->load->view("admin-page/buku_tamu/tamu_js");
			} elseif ($segmen == 'board') {
				$data['pg_header'] = 'Dashboard <small></small>';
				$this->load->view("admin-page/tmp/head",$data);
				$this->load->view("admin-page/dashboard/board");
				$this->load->view("admin-page/tmp/footer");
				$this->load->view('admin-page/templates/script');
				$this->load->view('admin-page/templates/credit');
				// $this->load->view("admin-page/dashboard/board_js");
			} else {
			redirect(site_url('index.php/login/logout'));
			}
		}
		if ($SESI === 0) {
			redirect(site_url('index.php/login/logout'));
		}
	}

	public function edit($id_berita=FALSE)
	{
		if ($id_berita===FALSE) {
			$data['title'] = 'Not Founds';
			$this->load->view('errors/html/error_404',$data);
		} else {
			$data['title'] = 'BALITBANGDA KOTA PALU';
			$data['isi'] = $this->berita->get_by_id($id_berita);
			$data['listbidang'] = $this->berita->unitKerjaAll()->result();
			$data['active'] = 'berita'; // untuk aktivasi treeview
			$data['pg_header'] = 'Editor Berita';
			$this->load->view("admin-page/tmp/head",$data);
			$this->load->view("admin-page/berita/editors_edit");
			$this->load->view("admin-page/tmp/footer");
			$this->load->view('admin-page/templates/script');
			$this->load->view('admin-page/templates/credit');
			$this->load->view("admin-page/berita/editors_js");
			// echo json_encode($data);
		}
	}

	private function _autentikasi()
	{
		if ($this->session->level=='administrator' || $this->session->level=='penulis') {
			$this->openurl('board');
		} else {
			redirect(site_url('index.php/login'));
		}
	}

}

// $row[] = "<a class=\"btn btn-xs btn-warning\" href=\"$link/edit/$br->id_berita\" title=\"Edit\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
// 		<a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deletebr('$br->id_berita')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
// 		<a class=\"btn btn-xs btn-primary\" href=\"$link2/$br->slug\" target=\"_blank\" title=\"Lihat Detail\"><i class=\"glyphicon glyphicon-eye-open\"></i> View</a>";
