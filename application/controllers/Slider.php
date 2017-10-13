<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	function __construct()
  {
      parent::__construct();
      $this->load->model('slider_model','slider');
  }

	public function index()
	{
		$data['title'] = 'Not Founds';
		$this->load->view('errors/html/error_404',$data);
	}

	public function ajax_list() {
		if ($this->session->level=='administrator') {
			$linkg = base_url('assets/adminlte/bower_components/kcfinder-3.12/upload/images/slider/');
			$list = $this->slider->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $br) {
				$no++;
				$row = array();
				$row[] = $br->id;
				$row[] = "<a class=\"text-primary\" href=\"javascript:void()\" onclick=\"viewSld('$br->id')\" title=\"Lihat detail\" ><img src=\"$linkg$br->nama_foto\" style=\"height:80px;\"></a>";
				$row[] = $br->deskripsi1;
				$row[] = $br->deskripsi2;
				$row[] = $br->data_slide;
				$row[] = $br->coding;
				$row[] = $cls = ($br->class=='active') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-success\">Active</a>" : "<a href='#' class=\"btn btn-xs btn-default\">Inactive</a>";
				$row[] = $st = ($br->status_slide=='on') ? "<a href='javascript:void(0)' class=\"btn btn-xs btn-success\">On</a>" : "<a href='#' class=\"btn btn-xs btn-default\">Off</a>";
			//add html for action

				$row[] = "<div class=\"btn-group\">
						<a href=\"javascript:void()\" onclick=\"editSld('$br->id')\" class=\"btn btn-sm btn-default\"><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
							<button type=\"button\" class=\"btn btn-sm btn-default dropdown-toggle\" data-toggle=\"dropdown\">
								<span class=\"caret\"></span>
							</button>
							<ul class=\"dropdown-menu\">
								<li><a href=\"javascript:void()\" onclick=\"deleteSld('$br->id')\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>
								<li><a href=\"javascript:void()\" onclick=\"viewSld('$br->id')\"><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a></li>
							</ul>
						</div>";
				$data[] = $row;
				}
				$output = array(
								"draw" => $_POST['draw'],
								"recordsTotal" => $this->slider->count_all(),
								"recordsFiltered" => $this->slider->count_filtered(),
								"data" => $data,
						);
				//output to json format
				echo json_encode($output);
		} else {
			echo json_encode(array('status' => FALSE, ));
		}
	}

	public function save_slider()
	{
		if ($this->session->level=='administrator') {
			$data = array(
			'nama_foto' => $this->input->post('nama_foto'),
			'deskripsi1' => $this->input->post('deskripsi1'),
			'deskripsi2' => $this->input->post('deskripsi2'),
			'data_slide' => $this->input->post('data_slide'),
			'coding' => $this->input->post('coding'),
			'class' => $this->input->post('class'),
			'status_slide' => $this->input->post('status_slide'),
			);
			$insert = $this->slider->save($data);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function update_slider()
	{
		if ($this->session->level=='administrator') {
			$data = array(
			'nama_foto' => $this->input->post('nama_foto'),
			'deskripsi1' => $this->input->post('deskripsi1'),
			'deskripsi2' => $this->input->post('deskripsi2'),
			'data_slide' => $this->input->post('data_slide'),
			'coding' => $this->input->post('coding'),
			'class' => $this->input->post('class'),
			'status_slide' => $this->input->post('status_slide'),
			);
			$this->slider->update(array('id' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function delete_slider($id)
	{
		if ($this->session->level=='administrator') {
			$this->slider->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function get($id)
	{
		if ($this->session->level=='administrator') {
			$data = $this->slider->get_by_id($id);
			echo json_encode($data);
		} else {
			echo json_encode(array("status" => FALSE));
		}
	}

	public function doupload()
	{
		$config['upload_path']          = base_url().'./assets/adminlte/upload/images/slider/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
    }
	}


}

// $row[] = "<a class=\"btn btn-xs btn-warning\" href=\"javascript:void()\" onclick=\"editSld('$br->id')\" title=\"Edit\" ><i class=\"glyphicon glyphicon-pencil\"></i> Edit</a>
// <a class=\"btn btn-xs btn-danger\" href=\"javascript:void()\" onclick=\"deleteSld('$br->id')\" title=\"Hapus\" ><i class=\"glyphicon glyphicon-trash\"></i> Delete</a>
// <a class=\"btn btn-xs btn-primary\" href=\"javascript:void()\" onclick=\"viewSld('$br->id')\" title=\"Lihat\" ><i class=\"glyphicon glyphicon-eye-open\"></i> Lihat</a>";
