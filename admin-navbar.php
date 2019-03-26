<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Navbar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-dark bg-danger navbar-expand-md py-md-2">
      <a class="navbar-brand">Admin Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item py-md-2"><a href="admin-view.php" class="nav-link">Manage Books</a></li>
              <li class="nav-item py-md-2"><a href="list-users.php" class="nav-link">View Users</a></li>
              <li class="nav-item py-md-2"><a href="#" class="nav-link">Add Books</a></li>
          </ul>
<?php if($_SESSION['alogin'])
  {
?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item py-md-2 "><a href="logout.php" class="nav-link">Logout</a></li>
          </ul>
<?php }?>
      </div>
  </nav>
<br>

</body>
</html>
