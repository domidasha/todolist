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


<button class='open'>Add New</button>

 	<div class="popup-window">	<!--//форма для заполнения -->
		<p class="close">x</p>	
		<form method="POST">
		<table>
			<tr>
				<td>
					Title:
				</td>
				<td>
					<input type="text" class="title"/>
				</td>
			</tr>
			<tr>
				<td>Description:</td>
				<td>
					<textarea type="text" class="description"></textarea>
				</td>
			</tr>
			<tr>
				<td >Prioriy:</td>
				<td>					
					<select class="priority">
     				<option>HIGH</option>
     				<option>MIDDLE</option>
     				<option>LOW</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>State:</td>
				<td><input type="checkbox" class="state"/></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="submit"/>
				</td>
			</tr>
		</table>
		</form>
	</div>

<?php include('footer.php') ?>


