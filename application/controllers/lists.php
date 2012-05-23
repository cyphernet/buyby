<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('uid'))
		{
			$this->showUserLists($this->session->userdata('uid'));	
		}
		else
		{
			header("Location: /login");
		}
	}
	
	public function create()
	{
		if($this->session->userdata('uid'))
		{
			$this->load->view('listsubmitview');
		}
		else
		{
			header("Location: /login");
		}
	}
	
	public function view()
	{
		$listid = $this->uri->segment(4);
		$listname = $this->uri->segment(3);
		
		$uid = $this->session->userdata('uid');
		
		//$term = $_GET['searchterm'];
		//$results = $term ? $this->getResults($term) : null;
		
		$this->load->model('listitemmodel');
		$itemsOnList = $this->listitemmodel->getItemsOnList($uid, $listid);
		
		$data = array('listid' => $listid, 'listname' => $listname, 'itemsOnList' => $itemsOnList->result());
		$this->load->view('listitemsview', $data);
		//$this->load->view('searchforitemsview', $data);
	}
	
	public function search()
	{
		$listid = $this->uri->segment(4);
		$listname = $this->uri->segment(3);
		
		$uid = $this->session->userdata('uid');
		
		$term = $_POST['searchterm'];
		$results = $term ? $this->getResults($term) : null;

		$data = array('listid' => $listid, 'listname' => $listname, 'searchresults' => $results);
		$this->load->view('searchforitemsview', $data);
	}
	
	private function showUserLists($uid)
	{
		$this->load->model('listmodel');
		$lists = $this->listmodel->getUserLists($uid);
		$data = array('lists' => $lists[0], 'listcount' => $lists[1]);
		$this->load->view('listsview', $data);
	}
	
	private function getResults($query)
	{
		$q = urlencode($query);
		$header = 'GET /shopping/search/v1/public/products?key=&country=US&q='.$q.'&alt=json' . " HTTP/1.1\r\n";
		$header .= "Host: www.googleapis.com\r\n";
		$header .= "Connection: Close\r\n\r\n";
		$api_response = '';
		$sock = fsockopen('ssl://googleapis.com', 443);
		if(!$sock)
		{
			die("no sock");
		}
		else
		{
			$begin = false;
			fwrite($sock, $header);
			while(!feof($sock))
			{

				$response = fgets($sock, 1000);
				
				if(strpos($response, "{") !== false)
					$begin = true;
					
				if($begin)
					$api_response .= $response;
			}
			fclose($sock);
			
			$results = json_decode($api_response);
			return $results;
		} 
	}
}

/* End of file list.php */
/* Location: ./application/controllers/list.php */