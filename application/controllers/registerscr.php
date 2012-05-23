<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registerscr extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*
		Register Script
		@params:
			id: auto_index
			email: varchar 100
			password: sha1 encryption varchar 40
			dateCreated: date_time
		*/
		if($_POST["email"] && $_POST["pw"]) {
			if($_POST["pw"] == $_POST["verify"]) {
				$email = strip_tags($_POST["email"]);
				$pw = sha1(strip_tags($_POST["pw"]));
				$handle = mysql_connect("localhost", "root", "Hackathon1");
				mysql_select_db("stuff");//alter
				$userquery = "SELECT * FROM user WHERE email='$email' LIMIT 1;";
				$userresult = mysql_query($userquery) or die(mysql_error());
				if(mysql_num_rows($userresult) == 0) {
					$query = "INSERT INTO user VALUES('', '$email', '$pw', NOW());";
					$result = mysql_query($query) or die(mysql_error());
					$uidquery = "SELECT id FROM user WHERE email='$email'";
					$uidresult = mysql_query($uidquery) or die(mysql_error());
					$row = mysql_fetch_row($uidresult);
					$uid = $row[0];
					mysql_close($handle);
					//$this->load->library('session');
					$this->session->set_userdata('uid', $uid);
					header("Location: /lists");
				}
				else {
					mysql_close($handle);
					header("Location: xx.php?e=2");//replace xx with registration page address if email is already registered
				}
			}
			else {
				header("Location: xx.php?e=1");//replace xx with registration page address if passwords don't match
			}
		}
		else {
			header("Location: xx.php?e=0");//replace xx with registration page address if one or more fields is not filled out
		}
	}
}
?>