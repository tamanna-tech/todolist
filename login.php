<?php
include('header.php');
?>

<?php
session_start();
$conn = new mysqli('localhost','root','','todolist');
if(isset($_POST['btnLogin'])){
    $email = $_POST['txtEmail'];
    $pass =$_POST['txtPassword'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

    $result =$conn->query($sql);
    while($row =$result->fetch_assoc()){
        $_SESSION['user_id'] =$row['id'];
        $_SESSION['fullname'] =$row['fullname'];

        if($row['user_type']== 1)
            header('Location:display.php');

            if($row['user_type']== 2)
            header('Location:task.php');
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">


<form method="post" action="login.php" method="post">
	
	Email<input type="text" name="txtEmail" class="form-control">
	Password<input type="text" name="txtPassword" class="form-control">
    <input type="submit" name="btnLogin" value="LOGIN" class="btn btn-primary">
</form>
	
