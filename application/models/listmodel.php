<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listmodel extends CI_Model {

    var $id   	   = '';
    var $userId    = '';
    var $name    = '';
	var $dateCreated = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function getUserLists($userId, $offset = 0)
	{
		$query = $this->db->get_where('list', array('userId' => $userId), 10, $offset);
		//list->itemcount
		$listQuery = "SELECT * FROM list
						left join
						(

						SELECT listId, COUNT(*) 'itemcount'
						FROM listItem
						WHERE userId = '$userId'
						GROUP BY listId


						) num_items on num_items.listId = list.id
						WHERE list.userId = '$userId' ";
		$listResult = mysql_query($listQuery) or die(mysql_error());
		$result = array();
		if(mysql_num_rows($listResult) > 1) 
		{
			while ($row = mysql_fetch_object($listResult)) {
				$result[] = $row;
			}
		}
		
        return array($result, mysql_num_rows($listResult));
	}
	
    function createList($userId, $name)
    {
		$data = array(
		   'userId' => $userId ,
		   'name' => $name ,
		);

		$this->db->insert('list', $data); 
    }
	
	function deleteList($id)
    {
		$this->db->delete('list', array('id' => $id)); 
    }
}

/* End of file listModel.php */
/* Location: ./application/models/listModel.php */