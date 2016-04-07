<?php
include('functions.php');

$response["success"] = false;

if (isset($_POST['action']) && $_POST['action'] == "create") {
	//create item
	$todo = $_POST['todo'];


	//validate income data
	
	$servise = new ToDoListService();
	$newTodo = $servise->createToDo($todo);
	$response["success"] = true;
	$response["todo"] = $newTodo;

}

else if (isset($_POST['action']) && $_POST['action'] == "update") {
	//update item
}

else if (isset($_POST['action']) && $_POST['action'] == "get") {
	//return item info
}

echo json_encode($response);
