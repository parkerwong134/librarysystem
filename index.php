<?php
session_start();
include('includes/config.php');
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
echo "<script type='text/javascript'> document.location ='test.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<head>
	<title>LBS</title>
	<!-- BOOTSTRAP CORE STYLE  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		h1 {color:blue;
			text-align:center;
		}

		h3 {text-align:center;}

		.button {
			background-color: #F48F42;
			border: none;
			color: white;
			padding: 20px 30px;
			text-align: center;
			font-size: 18px;
			cursor: pointer;
			display:inline-block;

		}
		.button:hover {
			background-color: #EA761E;
		}
		.container {
			text-align:center;
		}
		p {
			text-align:center;
			font-size:18px;
		}

	</style>
</head>

<body>
	<div class ="jumbotron">
	<h1>Library Management System</h1>
	<h3>By: Grace, Parker and Sara</h3><br>
	</div>
	<p>Welcome! Please choose one of the following:</p><br><br>
	<div class="container">
	<a href="user-login.php"><button class="button">User</button></a>
	<a href="admin-login.php"><button class="button">Admin</button></a>
	</div>


</body>



</html>
