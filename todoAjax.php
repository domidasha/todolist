<?php
include('functions.php');

$response["success"] = 'no task added';


if (isset($_POST['action']) && $_POST['action'] == "create") {
 	$todo = $_POST['todo'];		
	$servise = new ToDoListService();
	//create item
		$errorTitle = array();
		$errorTitle = $servise->validateTitle($todo['title']);
		if (empty($errorTitle)) {
			$newTodo = $servise->createTodo($todo);
			
			$response["success"] = "Success";
			$response["todo"] = $newTodo;
		} else {
			$responce["success"] = 'error';
		}
	}


else if (isset($_POST['action']) && $_POST['action'] == "update") {
	
	
}

else if (isset($_POST['action']) && $_POST['action'] == "get") {
		$newId = $_POST['todo'];		
		$serv = new ToDoListService();
		
		//print_r($newId['id']);
		$newTodo = $serv->getTodo($newId['id']);
		$response["success"] = "Success";
		$response["todo"] = $newTodo;	
		//print_r($newTodo);
}

echo json_encode($response);



