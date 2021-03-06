<?php
include('functions.php');
include('header.php'); 


$allTodo = array();
$singleId = array();

?>
<button class='open'>Add New</button>

<table class="main">
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
			<tr > 
				<td ><?php echo $td['id']?></td>
				<td data-id=<?php echo $td["id"]?>><a href="#" class="singleItem"><?php echo $td["title"]?></a></td>
				<td><?php echo $td["created_at"]?></td>
				<td><?php echo PriorityType::typeName($td["priority"])?></td>
				<td><?php echo $td["state"]?></td>		
				<td data-id=<?php echo $td["id"]?>><a href='#' class="delete">x</a></td>
			</tr>
	 <?php endforeach;
}
	//Одна запись
	/*$singleId=$todo->getTodo(3);
	echo $singleId['description'];
	
	$example['id'] = 50;
	$example['title'] = 'i am Dumbledor';
	$example['description'] = 'no, I am Harry';
	$example['priority'] = 2;
	$example['state'] = true;
	
	$todo->updateTodo($example);
	*/
?>
</table>



 	<div class="popup-window">	<!--//форма для заполнения -->
		<p class="close">x</p>	
		<form method="POST">
		<p class='mode'></p>
		<table>
			<tr>
				<td>Title:</td>
				<td>
					<input type="hidden" class="id" value="0"/>
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
					<?php foreach(PriorityType::getTypes() as $id => $name):?>>
     					<option value="<?php echo $id ?>"><?php echo $name ?></option>
     				<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>State:</td>
				<td><input type="checkbox" class="state" value/></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="submit"/>
					<p class='message'></p>
				</td>
			</tr>
		</table>
		</form>
	</div>
	

<?php include('footer.php') ?>