<?php 
	include('header.php');
?>
<?php

$conn=new mysqli('localhost','root','','todolist'); 

if(isset($_POST['btnsave'])){
	$fullname=$_POST['txtFullname'];
	$email=$_POST['txtEmail'];
	$pass=$_POST['txtPassword'];
	$type=$_POST['ddlUserType'];

$sql="INSERT INTO user(fullname,email,password,user_type) VALUES('$fullname','$email','$pass',$type)";
//die($sql);

$ret=$conn->query($sql);
if($ret)
	echo "User Created sucessfully.";
else
	echo "User Creating failed.";
}	
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

<form method="post" action="create_user.php">
	Fullname<input type="text" name="txtFullname" class="form-control">
	Email<input type="text" name="txtEmail" class="form-control">
	Password<input type="text" name="txtPassword" class="form-control">
	User Type<select name="ddlUserType" class="form-control">
		<option value="1">Admin User</option>
		<option value="2">Normal User</option>
	</select>

	<input type="submit" name="btnsave" value="Save" class="btn btn-primary">
</form>

<?php 
	include('footer.php');
?>