<?php
include('functions.php');

$response["success"] = 'no task added';


if (isset($_POST['action']) && $_POST['action'] == "save") {
 	$todo = $_POST['todo'];		
	$servise = new ToDoListService();
	//create item
		$errorTitle = array();
		$errorTitle = $servise->validateTitle($todo['title']);
		if (empty($errorTitle)) {
			if ($todo['id']==0) {
			$newTodo = $servise->createTodo($todo);
			$response["success"] = "Success";
			}  else {
			$newTodo = $servise->updateTodo($todo);	
			$response["success"] = "Task is changed";
			//как вывести $response["success"]????????????
			}
			$response["todo"] = $newTodo;
		} else {
			$responce["success"] = 'error';
		}
	}


else if (isset($_POST['action']) && $_POST['action'] == "get") {
		$newId = $_POST['todo'];		
		$serv = new ToDoListService();
		
		
		$newTodo = $serv->getTodo($newId['id']);
		$response["success"] = "Success";
		$response["todo"] = $newTodo;	
		
}

else if (isset($_POST['action']) && $_POST['action'] == "delete") {
	$newId = $_POST['todo'];
	$serv = new ToDoListService();

	$newTodo = $serv->deleteTodo($newId['id']);
	$response["success"] = "Success";
	$response["todo"] = $newTodo;

}

echo json_encode($response);