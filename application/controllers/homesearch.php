<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homesearch extends CI_Controller {
	public function index()
	{
		if (isset($_POST['search']))
		{
			
			$term = $_POST['search'];
			$results = $term ? $this->getResults($term) : null;
	
			$data = array('results' => $results);
			
			$this->load->view('homesearch', $data);
			
		}
		else
		{
			$this->load->view("homesearch");
		}
		
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