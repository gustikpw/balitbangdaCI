<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('users_model','users');
  }

	public function index()
	{
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
		if ($this->session->level=='administrator') {
			$list = $this->users->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $br) {
				$no++;
				$row = array();
				$row[] = $br->id_users;
				$row[] = "<b><a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewUsr('$br->id_users')\" title=\"Lihat detail\" >$br->username</a></b>";
				$row[] = '*USR'.$br->password;
				$row[] = $br->alias;
				$row[] = $br->level;
				$row[] = $br->aktif;
			//add html for action

				$row[] = "<div class=\"btn-group\">
						<a href=\"javascript:void()\" onclick=\"editUsr('$br->id_users')\" class=\"btn btn-sm btn-default\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
							<button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
								<span class=\"caret\"></span>
							</button>
							<ul class=\"dropdown-menu\">
								<li><a href=\"javascript:void()\" onclick=\"deleteUsr('$br->id_users')\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>
								<li><a href=\"javascript:void()\" onclick=\"viewUsr('$br->id_users')\"><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a></li>
							</ul>
						</div>";
				$data[] = $row;
				}
				$output = array(
								"draw" => $_POST['draw'],
								"recordsTotal" => $this->users->count_all(),
								"recordsFiltered" => $this->users->count_filtered(),
								"data" => $data,
						);
				//output to json format
				echo json_encode($output);
		} else {
			echo json_encode(array('status' => FALSE, ));
		}
	}

	public function save_users()
	{
		if ($this->session->level=='administrator') {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'penulis' => $this->input->post('penulis'),
			'level' => $this->input->post('level'),
			'aktif' => $this->input->post('aktif'),
			);
			$insert = $this->users->save($data);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function update_users()
	{
		if ($this->session->level=='administrator') {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'penulis' => $this->input->post('penulis'),
			'level' => $this->input->post('level'),
			'aktif' => $this->input->post('aktif'),
			);
			$this->users->update(array('id_users' => $this->input->post('id_users')), $data);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function delete_users($id_users)
	{
		if ($this->session->level=='administrator') {
			$this->users->delete_by_id($id_users);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function getUser($id_users)
	{
		if ($this->session->level=='administrator') {
			$data = $this->users->get_by_id($id_users);
			echo json_encode($data);
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function viewDetail($id_users)
	{
		if ($this->session->level=='administrator') {
			$data = $this->users->v_get_by_id($id_users);
			echo json_encode($data);
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

}
// $row[] = "<a class=\"btn btn-xs btn-warning\" href=\"javascript:void()\" onclick=\"editUsr('$br->id_users')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
// <a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deleteUsr('$br->id_users')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
// <a class=\"btn btn-xs btn-primary\" href=\"javascript:void()\" onclick=\"viewUsr('$br->id_users')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a>";
