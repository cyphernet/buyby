<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Place extends CI_Controller {

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
		phpinfo();
		/*$query = $this->db->get('user');
		foreach ($query->result() as $row)
		{
			echo $row->email;
		}*/
		//$this->load->view('mylocation');
	}
	
	public function search()
	{
		//$itemname = $this->getResults($this->uri->segment(4));
		$itemId = $_GET['itemId'];
		$lat = $_GET['lat'];
		$lng = $_GET['lng'];
		/*
		echo $itemname;
		echo $lat;
		echo $lng;
		
		die;*/
		$this->load->model('itemmodel');
		$item = $this->itemmodel->get($itemId);
		$item = $item[0];
		if (isset($_GET['shopName']))
		{
			$results = $this->getResults($lat, $lng, $_GET['shopName']);
		}
		else
		{
			$results = $this->getResults($lat, $lng, $item->storeName);
		}
		$results = $results->results;
		
		$data = array('itemname' => $item->name, 'mapresults' => $results);
		//Array ( [0] => stdClass Object ( [id] => 7 [storeName] => Walmart [name] => Apple iPod touch, 64GB (Newest Model) [description] => Online Only Special Offer: Apple iPod Touch bundled w/Accessory Kit. Click here for detailsSpecificationSize and Weight:Height: 4.4 inches (111.0 mm) Width: 2.3 inches (58.9 mm)Depth: 0.28 inch (7.2 mm) Weight: 3.56 ounces (101 grams)Capacity64GB flash driveWireless802.11b/g/n Wi-Fi (802.11n 2.4GHz only)Bluetooth 2.1 + EDRMaps-location based serviceNike + iPod support built inIn the BoxiPod touchEarphonesDock connector to USB CableQuick Start GuideThe 64GB Apple iPod touch embodies Apple's conti [googleProductId] => 3791485222514407929 [price] => 364.95 [image] => http://i.walmartimages.com/i/p/00/88/59/09/39/0088590939534_500X500.jpg ) )
		$this->load->view('mylocation', $data);
	}
	
	private function getResults($lat, $long, $query)
	{
		$q = urlencode($query);
		$header = 'GET /maps/api/place/search/json?location='.$lat.','.$long.'&radius=50&name='.$q.'&sensor=true&key=' . " HTTP/1.1\r\n";
		$header .= "Host: maps.googleapis.com\r\n";
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

/* End of file place.php */
/* Location: ./application/controllers/place.php */