<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listitemmodel extends CI_Model {

    var $id   	   = '';
    var $userId    = '';
    var $listId    = '';
	var $itemId = '';
	var $dateAdded = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getItemsOnList($userId, $listId)
	{
		//$query = $this->db->get_where('listItem', array('userId' => $userId, 'listId' => $listId));
		
		$this->db->select('*');
		$this->db->from('listItem');
		$this->db->join('item', 'item.id = listItem.itemId');
		$this->db->where('userId', $userId); 
		$this->db->where('listId', $listId); 
		
		//list->itemcount;

        //return $query->result();
		return $this->db->get();
	}
	
    function addItem($userId, $listId, $itemId)
    {
		$data = array(
		   'userId' => $userId ,
		   'listId' => $listId ,
		   'itemId' => $itemId ,
		);

		$this->db->insert('listItem', $data); 
    }
	
	function removeItem($id)
	{
		$this->db->delete('listItem', array('id' => $id)); 
	}
}

/* End of file listItemModel.php */
/* Location: ./application/models/listItemModel.php */