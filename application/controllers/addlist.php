<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addlist extends CI_Controller {
	public function index()
	{
		if($_POST["itemname"] && ($this->session->userdata('uid'))) {
			$this->load->model('listmodel');
			$uid = $this->session->userdata('uid');
			$name = strip_tags($_POST["itemname"]);
			$this->listmodel->createList($uid, $name);
			//successful creation of list
			
		}
		header("Location: /lists");
	}
}