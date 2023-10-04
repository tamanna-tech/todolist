<?php 
	include('header.php');
?>
<?php
#object oriented

$conn=new mysqli('localhost','root','','todolist'); 
if($conn->connect_error)
	echo "Connection failed.";
else
	echo "Connected successfully.";

if(isset($_POST['btnsave'])){
	//localhost/my project/create.php
	//insert query
	$taskname=$_POST['txtTaskName'];
	$startdate=$_POST['txtStartDate'];
	$enddate=$_POST['txtEndDate'];
	$user=$_POST['txtUser'];

//run: localhost/my project/create.php
$sql="INSERT INTO task(task_name,start_date,end_date,user_id)VALUES('$taskname','$startdate','$enddate',$user)";

//execute query and return true or false
$ret=$conn->query($sql);
if($ret)
	echo "Inserted sucessfully.";
else
	echo "Inserting failed.";
}
	
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<form method="post" action="create.php">
	Task Name<input type="text" name="txtTaskName" class="form-control">
	Start Date<input type="text" name="txtStartDate" class="form-control">
	End Date<input type="text" name="txtEndDate" class="form-control">
	User ID<input type="number" name="txtUser" class="form-control">
	<input type="submit" name="btnsave" value="Save" class="btn btn-primary">
</form>

<?php 
	include('footer.php');
?>