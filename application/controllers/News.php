<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Makassar");
class News extends CI_Controller {
	function __construct()
  {
      parent::__construct();
			$this->load->helper('cookie');
			$this->load->model('Berita_model','berita');
			$this->load->model('Komentar_model','komentar');
			$this->load->model('Info_model','info');
			$this->load->model('Slider_model','slider');
      $this->load->model('Visitor_model','visitor');
			$this->load->library('pagination');
  }

	public function index()
	{
		$this->_visitorCounter();
		$this->view();
	}

	public function view($offset=0)
	{
		$this->_visitorCounter();
		$jumlah_data = $this->berita->jumlah_data();
		$config['base_url'] = base_url().'index.php/news/view/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = "<ul class='pagination pagination-md'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['title'] = 'BALITBANGDA KOTA PALU';
		$data['berita'] = $this->berita->get_berita($config['per_page'],$offset);
		$data['recentPost'] = $this->berita->recentPost();
		$data['halaman'] = $this->pagination->create_links();
		$data['unitKerja'] = $this->_unitKerja();
		$data['recentKomen'] = $this->_lastKomentar(2);
		$data['info'] = $this->_infoLembaga();
		$data['slider'] = $this->_slider();
		$data['visitor'] = $this->_getCountVisitors();
		$this->load->view('templates/header',$data);
		$this->load->view('blog/content');
		$this->load->view('templates/footer');
		// echo json_encode($data);
	}

	public function get($slug=FALSE)
	{
		$this->_visitorCounter();
		$data['title'] = 'BALITBANGDA KOTA PALU';

		if ($this->berita->get_news($slug)->num_rows()) {
			$data['berita'] = $this->berita->get_news($slug)->row();
			$data['recentPost'] = $this->berita->recentPost();
			$komen = $this->berita->get_news($slug)->row();
			$data['komentar'] = $this->_list_komentar($komen->id_berita);
			$data['unitKerja'] = $this->_unitKerja();
			$data['recentKomen'] = $this->_lastKomentar(2);
			$data['info'] = $this->_infoLembaga();
			$data['slider'] = $this->_slider();
			$data['visitor'] = $this->_getCountVisitors();
			$this->load->view('templates/header',$data);
			$this->load->view('blog/view');
			$this->load->view('templates/footer');
		} else {
			$data['title']='BALITBANGDA KOTA PALU';
	    $this->output->set_status_header('404');
	    $this->load->view('errors/html/error_404',$data);
		}
	}

	public function komentar_save($slug='')
	{
		$data = array(
		'id_komentar' => $this->input->post('id_komentar'),
		'nama_tamu' => $this->input->post('nama_tamu'),
		'email' => $this->input->post('email'),
		'komentar' => $this->input->post('komentar'),
		'tanggal' => date('Y-m-d H:m:s'),
		'id_berita' => $this->input->post('id_berita'),
		);
		$insert = $this->berita->save_komentar($data);
		redirect(site_url('index.php/news/get/').$slug);
	}

	private function _list_komentar($id_berita='')
	{
		$data = $this->berita->list_komentar($id_berita);
		return $data;
	}

	// public function delete_komentar($id)
	// {
	// 	$this->berita->del_komentar($id);
	// 	echo json_encode(array("status" => TRUE));
	// }

	private function _unitKerja()
	{
		$data ='';
		$unitKerja = $this->berita->unitKerja_list($slug=FALSE)->result();
		foreach ($unitKerja as $uk){
			$data .= "<li><a href='".base_url('index.php/news/unitkerja/').$uk->slug."'>$uk->bidang</a><a class='pull-right' href='$uk->slug'>($uk->count_post)</a></li>";
		}
		return $data;
	}

	public function unitKerja($slug=FALSE,$offset=0)
	{
		$this->_visitorCounter();
		$jumlah_data = $this->berita->unitKerja_list($slug)->num_rows();
		$config['base_url'] = base_url().'index.php/news/unitKerja/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = "<ul class='pagination pagination-md'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);
		$data['title'] = 'BALITBANGDA PALU';
		// echo json_encode($slug);
		$data['berita'] = $this->berita->get_news_by_unitKerja($slug,$config['per_page'],$offset)->result();
		$data['recentPost'] = $this->berita->recentPost();
		$data['halaman'] = $this->pagination->create_links();
		$data['unitKerja'] = $this->_unitKerja();
		$data['recentKomen'] = $this->_lastKomentar(2);
		$data['info'] = $this->_infoLembaga();
		$data['slider'] = $this->_slider();
		$data['visitor'] = $this->_getCountVisitors();
		$this->load->view('templates/header',$data);
		$this->load->view('blog/content');
		$this->load->view('templates/footer');
	}

	private function _slider()
	{
		return $data = $this->slider->getSliders();
	}

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
