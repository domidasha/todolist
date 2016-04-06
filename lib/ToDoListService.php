
<?php

class ToDoListService {	
	
	private $connector;

	public function __construct() {
		$this->connector = MysqlDbConnector::getInstance();
	}
	
	public function createTodo($todo) {

	}

	public function updateTodo($todo) {
		$con = $this->connector->getConnection();

		$string0 = addslashes($todo['title']);
	    $string1 = addslashes($todo['description']);
	    $string2 = addslashes($todo['priority']);
	    $string3 = addslashes($todo['state']);


	    $sql = sprintf("insert into to_do_list (title, description, priority, state) values ('%s', '%s', %s, '%s')",$string0, $string1, $string2, $string3);

	    $stmt = $con->query($sql);

		// $stmt = $con-> prepare($sql);
		// $stmt->execute(array($id));
		// $this->getTodoList();	

	   // print_r($sql);
    
	}

	public function deleteTodo($id) {
		$con = $this->connector->getConnection();
		$stmt = $con-> prepare('delete from to_do_list where id = ?');
		$stmt->execute(array($id));
		$this->getTodoList();		
	}

	public function getTodo($id) {
		
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