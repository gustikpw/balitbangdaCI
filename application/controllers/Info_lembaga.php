<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_lembaga extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('info_lembaga_model','info_lembaga');
  }

	public function index()
	{
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
		if ($this->session->level=='administrator') {
			$list = $this->info_lembaga->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $br) {
				$no++;
				$row = array();
				$row[] = $br->id;
				$row[] = "<b><a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewLem('$br->id')\" title=\"Lihat detail\" >$br->nama_lembaga</a></b>";
				$row[] = $br->alias;
				$row[] = $br->alamat;
				$row[] = $br->telp;
				$row[] = $br->kodepos;
				$row[] = $br->email;
				$row[] = "<b><a class=\"text-primary\" href=\"$br->sosmed1\" target=\"_blank\" title=\"Kunjungi Halaman\" >$br->sosmed1</a></b>";
				$row[] = "<b><a class=\"text-primary\" href=\"$br->sosmed2\" target=\"_blank\" title=\"Kunjungi Halaman\" >$br->sosmed2</a></b>";
				$row[] = "<b><a class=\"text-primary\" href=\"$br->sosmed3\" target=\"_blank\" title=\"Kunjungi Halaman\" >$br->sosmed3</a></b>";
			//add html for action
				$row[] = "<a class=\"btn btn-xs btn-warning\" href=\"javascript:void()\" onclick=\"editLem('$br->id')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
				<a class=\"btn btn-xs btn-primary\" href=\"javascript:void()\" onclick=\"viewLem('$br->id')\" title=\"Lihat\" ><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a>";
				$data[] = $row;
				}
				$output = array(
								"draw" => $_POST['draw'],
								"recordsTotal" => $this->info_lembaga->count_all(),
								"recordsFiltered" => $this->info_lembaga->count_filtered(),
								"data" => $data,
						);
				//output to json format
				echo json_encode($output);
		} else {
			echo json_encode(array('status' => FALSE, ));
		}
	}

	// public function save_info_lembaga()
	// {
	// 	if ($this->session->level=='administrator') {
	// 		$data = array(
	// 		'username' => $this->input->post('username'),
	// 		'password' => md5($this->input->post('password')),
	// 		'penulis' => $this->input->post('penulis'),
	// 		'level' => $this->input->post('level'),
	// 		'aktif' => $this->input->post('aktif'),
	// 		);
	// 		$insert = $this->info_lembaga->save($data);
	// 		echo json_encode(array("status" => TRUE));
	// 	} else {
	// 		echo json_encode(array("status" => FALSE));
	// 	}
	// }

	public function update_info_lembaga()
	{
		if ($this->session->level=='administrator') {
			$data = array(
			'nama_lembaga' => $this->input->post('nama_lembaga'),
			'alias' => $this->input->post('alias'),
			'alamat' => $this->input->post('alamat'),
			'telp' => $this->input->post('telp'),
			'kodepos' => $this->input->post('kodepos'),
			'email' => $this->input->post('email'),
			'sosmed1' => $this->input->post('sosmed1'),
			'sosmed2' => $this->input->post('sosmed2'),
			'sosmed3' => $this->input->post('sosmed3'),
			);
			$this->info_lembaga->update(array('id' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	// public function delete_info_lembaga($id_info_lembaga)
	// {
	// 	if ($this->session->level=='administrator') {
	// 		$this->info_lembaga->delete_by_id($id_info_lembaga);
	// 		echo json_encode(array("status" => TRUE));
	// 	} else {
	// 		echo json_encode(array("status" => FALSE));
	// 	}
	// }

	public function get($id)
	{
		if ($this->session->level=='administrator') {
			$data = $this->info_lembaga->get_by_id($id);
			echo json_encode($data);
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

}
