<!DOCTYPE html>
<html>
	<head>
		
		<title>Admin Login</title>
		<style>
			.container {
				text-align:center;
				font-size:16px;
			}
			h1 {
				color:blue;
		</style>
	</head>
		<body>
			
				<h1 style="text-align:center; color=blue;">Admin/Librarian Login</h1>
				
				<form style="text-align:center;" action="login_check.php" method="post">
					Username:
					<input type="text" name="username"><br><br>
					Password:
					<input type="text" name="password"><br><br>
					<input type="submit" value="Login">
				</form><br>
				<div class="container">
				<a href="admin-register.php">New user? Register here</a>
				</div>
				
			
		</body>
	
</html>
