<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link href="assets/css/style.css" rel="stylesheet" />
		<!-- GOOGLE FONT -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
				<form style="text-align:center;" action="login_check.php" method="post">
					<div class="form-group">
					<label>Username:</label>
					<input type="text" name="username" autocomplete="off"><br><br>
					</div>
					<label>Password:</label>
					<input type="text" name="password" autocomplete="off"><br><br>
					<input type="submit" value="Login">
				</form><br>
				<div class="container">
				<a href="admin-register.php">New admin? Register here</a>
				</div>
			</div>

		</body>

</html>
