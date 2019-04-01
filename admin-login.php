<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='admin-view.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>

		<title>Admin Login</title>
		<style>
			.container {
				text-align:center;
				font-size:16px;
			}
			h1 {
				color:blue;
				padding:20px;
				text-align: center;
			}
		</style>
	</head>
		<body>
			<?php include('navbar.php');?>
			<div class="container">
			<div class="row pad-botm">
			<div class="col-md-12">
				<h1 class = "header-line">Admin/Librarian Login</h1>
			</div>
			</div>
				<form style="text-align:center;" method="post">
					<div class="form-group">
					<label>Username:</label>
					<input type="text" name="username" autocomplete="off"><br><br>
					</div>
					<div class="form-group">
					<label>Password:</label>
					<input type="password" name="password" autocomplete="off"><br><br>
					</div>
					<button type="submit" name="login" class="btn btn-info">LOGIN </button>
				</form><br>
			</div>

	</script>
		</body>

</html>
