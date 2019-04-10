<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['update']))
{
$authorid=intval($_GET['authorid']);
$author=$_POST['author'];
$birthday=$_POST['birthday'];
$status=$_POST['status'];
$sql="update authors set AuthorName=:author, Birthday=:birthday,Status=:status where id=:authorid";
$query = $dbh->prepare($sql);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':birthday',$birthday,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':authorid',$authorid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Author/Producer updated successfully";
header('location:manage-authors.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Authors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>

</head>
<body>
<?php include('admin-navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Author/Producer</h4>
                    </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">

<?php
$authorid=intval($_GET['authorid']);
$sql = "SELECT * from authors where id=:authorid";
$query = $dbh -> prepare($sql);
$query->bindParam(':authorid',$authorid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>



<div class="form-group">
<label>Author/Producer Name</label>
<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->AuthorName);?>" required />
</div>

<div class="form-group">
<label>Date of Birth</label>
<input class="form-control" type="text" name="birthday" value="<?php echo htmlentities($result->Birthday);?>" required />
</div>

<div class="radio">
  <label>Status<br><input type="radio" name="status" checked="checked" value="Active" required >Active</label>
</div>
<div class="radio">
  <label><input type="radio" name="status" value="Deceased" required >Deceased</label>
</div>



<?php }} ?>


<button type="submit" name="update" class="btn btn-info">Update </button>

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
