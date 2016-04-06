<?php
include('functions.php');
include('header.php'); 


$allTodo = array();
$singleId = array();

?>
<table>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Created At</th>
		<th>Priority</th>
		<th>State</th>
	</tr>

<?php
	$todo = new ToDoListService;
	$allTodo = $todo->getToDoList();
	

	
if (!empty($allTodo)) {
	foreach ($allTodo as $td) : ?>
			<tr> 
				<td><?php echo $td['id']?></td>
				<td><?php echo $td["title"]?></td>
				<td><?php echo $td["created_at"]?></td>
				<td><?php echo $td["priority"]?></td>
				<td><?php echo $td["state"]?></td>		
			</tr>
	 <?php endforeach;
}
	//Одна запись
	$singleId=$todo->getTodo(3);
	echo $singleId['description'];
	
	//удаление по ID
	$todo->deleteTodo(6);
	
	//Update
	$example['title']="item";
	$example['description']="description of an item";
	$example['priority']=2;
	$example['state']='fasle';

	//$todo->updateTodo($example);
?>
</table>


<button class="addnew">Add New</button>
<p id="title"></p>
<p id="description"></p>

<?php include('footer.php') ?>


