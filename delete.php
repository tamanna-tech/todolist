<?php 
	$conn = new mysqli('localhost','root','','todolist');

	$id = $_GET["id"];

	$sql = "DELETE FROM task WHERE task_id=".$id;

	$ret = $conn->query($sql);

	if($ret)
		header("Location:display.php");
?>