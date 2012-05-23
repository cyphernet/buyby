<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginscr extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('uid')) {
			header("Location: /lists");
			
		}
		else
		{
		
			if($_POST["email"] && $_POST["pw"]) {
				$email = strip_tags($_POST["email"]);
				$pw = sha1(strip_tags($_POST["pw"]));
				$userquery = "SELECT id FROM user WHERE email='$email' AND password='$pw' LIMIT 1;";
				$userresult = mysql_query($userquery) or die(mysql_error());
				if(mysql_num_rows($userresult) == 1) {
					$row = mysql_fetch_row($userresult);
					$uid = $row[0];
					//$this->load->library('session');
					$this->session->set_userdata('uid', $uid);
					header("Location: /lists");//replace xn with successful login page address
				}
				else {
					header("Location: /login");//replace xm with login page address if no account with this email address/password
				}
			}
			else {
				header("Location: /login");//replace xm with login page address if one or more fields is not filled out
			}
		}
	}
}
?>