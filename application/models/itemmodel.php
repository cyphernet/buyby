<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ItemModel extends CI_Model {

    var $id   	   = '';
    var $name    = '';
    var $description    = '';
	var $googleProductId = '';
	var $price = '';
	var $image = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getItemByGoogleId($googleProductId)
	{
		$query = $this->db->get_where('item', array('googleProductId' => $googleProductId));
        return $query->result();
	}
	
	function get($id)
	{
		$query = $this->db->get_where('item', array('id' => $id));
        return $query->result();
	}
	
    function addItem($storeName, $name, $description, $googleProductId, $price, $image)
    {
		$data = array(
		   'storeName' => $storeName ,
		   'name' => $name ,
		   'description' => $description ,
		   'googleProductId' => $googleProductId ,
		   'price' => $price ,
		   'image' => $image ,
		);

		$this->db->insert('item', $data); 
    }
}

/* End of file itemModel.php */
/* Location: ./application/models/itemModel.php */