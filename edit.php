<?php

$conn=new mysqli('localhost','root','','todolist'); 

$sql = "SELECT * FROM task WHERE task_id=".$_GET['id'];
$result = $conn->query($sql);
$tname="";$sdate="";$edate="";$uid="";

while($row = $result->fetch_assoc()){
	$tname=$row['task_name'];
	$sdate=$row['start_date'];
	$edate=$row['end_date'];
	$uid=$row['user_id'];
}


if(isset($_POST['btnSave'])){
	$taskname=$_POST['txtTaskName'];
	$startdate=$_POST['txtStartDate'];
	$enddate=$_POST['txtEndDate'];
	$user=$_POST['txtUser'];

	$sql="";

$sql = "UPDATE task SET task_name='$taskname',start_date='$start_date',end_date='$enddate',user_id='$user' WHERE task_id=".$_GET['id'];

	$ret=$conn->query($sql);
	if($ret)
		header('Location:display.php'); //echo "Updated sucessfully.";
	else
		echo "Updating failed.";
	}
	
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<h2>Update Form</h2>
<form method="post" action="edit.php?id=<?php echo $_GET['id']; ?>">
	Task Name<input type="text" name="txtTaskName" class="form-control" value="<?php echo $tname; ?>">
	Start Date<input type="text" name="txtStartDate" class="form-control" value="<?php echo $sdate; ?>">
	End Date<input type="text" name="txtEndDate" class="form-control" value="<?php echo $edate; ?>">
	User ID<input type="number" name="txtUser" class="form-control" value="<?php echo $uid; ?>">
	<input type="submit" name="btnSave" value="Update" class="btn btn-primary">
</form>