<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{

$username=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT Password,UserName FROM users WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='user-view.php'; </script>";
}
else{
echo "<script>alert('Invalid Details');</script>";
}

}

?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLE  -->
		<link href="assets/css/style.css" rel="stylesheet" />
		<!-- GOOGLE FONT -->
		<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
		<title>User Login</title>
		<style>
			.container {
				text-align:center;
				font-size:16px;
			}
			h1 {
				color:blue;
				padding:20px;
				text-align:center;
				}
		</style>
	</head>
		<body>
			<?php include('navbar.php');?>
			<div class="container">
			<div class="row pad-botm">
			<div class="col-md-12">
				<h1 class = "header-line">User Login</h1>
			</div>
		</div>
				<form style="text-align:center;" method="post">
					<div class="form-group">
					<label>Username:</label>
					<input type="text" name="username" autocomplete="off"><br><br>
					</div>
					<label>Password:</label>
					<input type="password" name="password" autocomplete="off"><br><br>
					<button type="submit" name="login" class="btn btn-info">LOGIN</button>
				</form><br>
				<div class="container">
				<a href="user-register.php">New user? Register here</a>
				</div>
</div>

		</body>

</html>
