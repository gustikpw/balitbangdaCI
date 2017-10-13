<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Errorpage extends CI_Controller
{
 public function __construct()
 {
    parent::__construct();
 }

 public function index()
 {
   $data['title']='BALITBANGDA PALU';
   $this->output->set_status_header('404');
   $this->load->view('errors/html/error_404',$data);
 }

}
