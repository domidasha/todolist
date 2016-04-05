<?php include('header.php') 

$allTodo = array();

function my_autoloader($class) {
    include 'lib/' . $class . '.php';
}

spl_autoload_register('my_autoloader');


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
	$allTodo= getTodoList();
if (!empty($allTodo)) {
	foreach ($allTodo as $todo) : ?>
		<tr>
			<td><?php echo $todo["id"]?></td>
			<td><?php echo $todo["title"]?></td>
			<td><?php echo $todo["created_at"]?></td>
			<td><?php echo $todo["priority"]?></td>
			<td><?php echo $todo["state"]?></td>		
		</tr>
	 <?php endforeach;
}
?>

<tr>
<td>
</td>
</tr>

<tr>
<td>
</td>
</tr>


</table>

<button class="addNew">Add New</button>

<?php include('footer.php') ?>


