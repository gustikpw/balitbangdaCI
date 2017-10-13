<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
class Buku_tamu extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('tamu_model','tamu');
			$this->load->model('komentar_model','komentar');
			$this->load->model('info_model','info');
      $this->load->model('visitor_model','visitor');
  }

	public function index()
	{
		$data['title'] = 'BALITBANGDA KOTA PALU - Buku Tamu';
		$data['infoBukuTamu'] = $this->tamu->getSetup_by_id(1);
		$data['recentKomen'] = $this->_lastKomentar(2);
		$data['info'] = $this->_infoLembaga();
		$data['visitor'] = $this->_getCountVisitors();
		$this->load->view('buku_tamu/buku_tamu',$data);
	}

	public function ajax_list() {
		if ($this->session->level=='administrator') {
			$list = $this->tamu->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $br) {
				$no++;
				$row = array();
				$row[] = $br->id_tamu;
				$row[] = "<b><a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewBKT('$br->id_tamu')\" title=\"Lihat detail\" >$br->nama</a></b>";
				$row[] = $br->email;
				$row[] = $br->alamat;
				$row[] = $br->telp;
				$row[] = $br->perihal;
				$row[] = "<a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewBKT('$br->id_tamu')\" title=\"Lihat detail\" >".substr($br->pesan,25)."...</a>";
				$row[] = $br->tgl_kunjungan;
				$row[] = $br->ip_address;
			//add html for action

				$row[] = "<div class=\"btn-group\">
						<a href=\"javascript:void()\" onclick=\"viewBKT('$br->id_tamu')\" class=\"btn btn-sm btn-default\"><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a>
							<button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
								<span class=\"caret\"></span>
							</button>
							<ul class=\"dropdown-menu\">
								<li><a href=\"javascript:void()\" onclick=\"deleteBKT('$br->id_tamu')\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>
							</ul>
						</div>";
				$data[] = $row;
				}
				$output = array(
								"draw" => $_POST['draw'],
								"recordsTotal" => $this->tamu->count_all(),
								"recordsFiltered" => $this->tamu->count_filtered(),
								"data" => $data,
						);
				//output to json format
				echo json_encode($output);
		} else {
			echo json_encode(array('status' => FALSE, ));
		}
	}

	public function save_tamu()
	{
			$data = array(
			'nama' => html_escape($this->input->post('nama')),
			'email' => html_escape($this->input->post('email')),
			'alamat' => html_escape($this->input->post('alamat')),
			'telp' => html_escape($this->input->post('telp')),
			'perihal' => html_escape($this->input->post('perihal')),
			'pesan' => html_escape($this->input->post('pesan')),
			'tgl_kunjungan' => date('Y-m-d H:m:s'),
			'ip_address' => $this->input->ip_address().' | '.$_SERVER['HTTP_USER_AGENT'],
			);
			$insert = $this->tamu->save($data);
			$this->session->set_flashdata('pesan','<span class="text-danger text-center">Pesan Anda sudah terkirim pada kami!</span>');
			redirect(site_url('index.php/buku_tamu'));
	}

	// public function update_tamu()
	// {
	// 	if ($this->session->level=='administrator') {
	// 		$data = array(
	// 		'nama' => $this->input->post('nama'),
	// 		'email' => $this->input->post('email'),
	// 		'alamat' => $this->input->post('alamat'),
	// 		'telp' => $this->input->post('telp'),
	// 		'perihal' => $this->input->post('pesan'),
	// 		'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
	// 		);
	// 		$this->tamu->update(array('id_tamu' => $this->input->post('id_tamu')), $data);
	// 		echo json_encode(array("status" => TRUE));
	// 	} else {
	// 		echo json_encode(array("status" => FALSE));
	// 	}
	// }

	public function delete_buku_tamu($id_tamu)
	{
		if ($this->session->level=='administrator') {
			$this->tamu->delete_by_id($id_tamu);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function getTamu($id_tamu)
	{
		if ($this->session->level=='administrator') {
			$data = $this->tamu->get_by_id($id_tamu);
			echo json_encode($data);
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

// SETUP BUKU TAMU
// public function setSave()
// {
// 	$data = array(
// 	'judul' => $this->input->post('judul'),
// 	'deskripsi' => $this->input->post('deskripsi'),
// 	'other' => $this->input->post('other'),
// 	);
// 	$insert = $this->tamu->setSave($data);
// 	echo json_encode(array("status" => TRUE));
// }

public function del_setTamu($id_setup)
{
	if ($this->session->level=='administrator') {
		$this->tamu->delSetup_by_id($id_setup);
		echo json_encode(array("status" => TRUE));
	} else {
		echo json_encode(array("status" => FALSE));
	}
}

public function setupUpdate()
{
	if ($this->session->level=='administrator') {
		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'other' => $this->input->post('other'),
		);
		$this->tamu->setupUpdate(array('id_setup' => $this->input->post('id_setup')), $data);
		echo json_encode(array("status" => TRUE));
	} else {
		echo json_encode(array("status" => FALSE));
	}
}

public function getSetup($id_setup)
{
	if ($this->session->level=='administrator') {
		$data = $this->tamu->getSetup_by_id($id_setup);
		echo json_encode($data);
	} else {
		echo json_encode(array("status" => FALSE));
	}
}

// PRIVATE FUNCTIONS
	private function _lastKomentar($limit)
	{
		return $this->komentar->lastKomentarByLimit($limit);
	}

	private function _infoLembaga()
	{
		return $this->info->get_by_id(1);
	}

	private function _visitorCounter()
	{
		$ip = $this->input->ip_address();
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$tgl = date('Y-m-d H:m:s');
		if (get_cookie('visitor')==NULL) {
			set_cookie('visitor',$ip,time()+3600);
			$data = array('ip' => $ip,
										'user_agent' => $user_agent,
										'tgl' => $tgl,
			);
			// echo json_encode($data);
			$this->visitor->save_visitCounter($data);
		}
	}

	private function _getCountVisitors()
	{
		return $this->visitor->count_all();
	}

}
