<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:../index.php');
}
else{

if(isset($_POST['create']))
{
$genre=$_POST['genre'];
$sql="INSERT INTO genre(GenreName) VALUES(:genre)";
$query = $dbh->prepare($sql);
$query->bindParam(':genre',$genre,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Genre added successfully!";
header('location:manage-genres.php');
}
else
{
$_SESSION['error']="Something went wrong. Please try again.";
header('location:manage-genres.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Genre</title>
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

<?php include('admin-navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Genre</h4>

            </div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Genre Name</label>
<input class="form-control" type="text" name="genre" autocomplete="off" required />
</div>

<button type="submit" name="create" class="btn btn-info">Create </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>

    </div>
    </div>

</body>
</html>
<?php } ?>
