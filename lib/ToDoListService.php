
<?php

class ToDoListService {
	
	
	private $connector;

	public function __construct() {
		$this->connector = MysqlDbConnector::getInstance();
	}
	
	function createTodo($todo) {

	}

	function updateTodo($todo) {
		 
	}

	function deleteTodo($id) {
		$con = $this->connector->getConnection();
		$stmt = $con-> prepare('delete from to_do_list where id = ?');
		$stmt->execute(array($id));
		$this->getTodoList();		
	}

	function getTodo($id) {
		
		$con = $this->connector->getConnection();
		$stmt = $con-> prepare('select * from to_do_list where id = ?');
		$stmt->execute(array($id));
		
		foreach ($stmt as $row)
		{
			return $row;
			
		}
	
	}

	function getTodoList(){
		$allTasks = array();
		$con = $this->connector->getConnection();
		
	 	$sql = 'SELECT * from to_do_list';
	 	$stmt = $con->query($sql);

  		while ($row = $stmt->fetch()) {
    		$allTasks[] = $row;
 		 }
 		 return $allTasks;
	}
	
}


?>