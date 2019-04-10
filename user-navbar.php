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

  <nav class="navbar navbar-dark bg-primary navbar-expand-md py-md-2">
      <a class="navbar-brand">User Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item py-md-2"><a href="user-items.php" class="nav-link" style="color:white;">My Items</a></li>
              <li class="nav-item py-md-2"><a href="user-profile.php" class="nav-link" style="color:white;">My Profile</a></li>
              <li class="nav-item py-md-2"><a href="user-view.php" class="nav-link" style="color:white;">View Collection</a></li>
              <li class="nav-item py-md-2"><a href="event-list.php" class="nav-link" style="color:white;">Event List</a></li>
          </ul>
<?php if($_SESSION['login'])
  {
?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item py-md-2 "><a href="logout.php" class="nav-link" style="color:white;">Logout</a></li>
          </ul>
<?php }?>
      </div>
  </nav>
<br>
</body>
</html>
