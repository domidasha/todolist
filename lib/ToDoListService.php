
<?php

class ToDoListService {	
	
	private $connector;

	public function __construct() {
		$this->connector = MysqlDbConnector::getInstance();
	}
	
	public function createTodo($todo) {
		$con = $this->connector->getConnection();
		
		$stmt = $con-> prepare("INSERT into to_do_list (
				title,
				description,
				priority,
				state)
				values ( ? , ? , ? , ?)");
		$state = ($todo['state']) ? 1 : 0;
		$stmt->execute(array($todo['title'], $todo['description'], $todo['priority'], $state));		
		


	}

	public function updateTodo($todo) {
		$con = $this->connector->getConnection();
		$stmt = $con-> prepare("UPDATE to_do_list 
				SET title = ?,
				description = ?,
				priority = ?,
				state = ?
				WHERE id = ?");
		$stmt->execute(array($todo['title'], $todo['description'], $todo['priority'], $todo['state']), $todo['id']);
    
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

	public function getTodoList(){
		$allTasks = array();
		$con = $this->connector->getConnection();
		
	 	$sql = 'SELECT * from to_do_list';
	 	$stmt = $con->query($sql);

  		while ($row = $stmt->fetch()) {
    		$allTasks[] = $row;
 		 }
 		 return $allTasks;
	}
	
	public function validateTitle($title) {
	$error = array();
	    if (empty($title)) {
	    	$error[] = 'Title is empty. Enter title';
	    }
	    else if (iconv_strlen($title)<3) {
	    	$error[] = 'Title is too short';
	    }
	    else if (iconv_strlen($title)>100) {
	    	$error[] = 'Title is too long';
	    }
	    return $error;
		}	
	}


?>