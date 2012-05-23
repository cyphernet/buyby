<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

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
		/*$query = $this->db->get('user');
		foreach ($query->result() as $row)
		{
			echo $row->email;
		}*/
		$this->load->view('mylocation');
	}
	
	public function term()
	{
		$results = $this->getResults($this->uri->segment(3));
		$data = array('searchresults' => $results);
		$this->load->view('searchresults', $data);
	}
	

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */