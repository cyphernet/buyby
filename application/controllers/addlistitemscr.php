<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addlistitemscr extends CI_Controller {
	public function index()
	{
		$listid = $_POST["listid"];
		$listname = $_POST["listname"];
		
		if($_POST["listid"] && $this->session->userdata('uid')) {
			$googlid = strip_tags($_POST["googleId"]);
			$store = strip_tags($_POST["store"]);
			$name = strip_tags($_POST["name"]);
			$description = strip_tags($_POST["desc"]);
			$price = strip_tags($_POST["price"]);
			$img = strip_tags($_POST["img"]);
			$listid = strip_tags($_POST["listid"]);
			$uid = $this->session->userdata('uid');
			$this->load->model('itemmodel');
			$item = $this->itemmodel->getItemByGoogleId($googlid);
			if(!$item) {//add item to database
				$this->itemmodel->addItem($store, $name, $description, $googlid, $price, $img);
			}
			$item = $this->itemmodel->getItemByGoogleId($googlid);
			$this->load->model('listitemmodel');
			$this->listitemmodel->addItem($uid, $listid, $item[0]->id);
			header("Location: /lists/view/".$listname.'/'.$listid);
		}
		else {
			header("Location: /lists/view/".$listname.'/'.$listid);//list id not given error
		}
	}
}
?>