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
$publisherid=intval($_GET['publisherid']);
$publisher=$_POST['publisher'];
$sql="update publishers set publishName=:publisher where id=:publisherid";
$query = $dbh->prepare($sql);
$query->bindParam(':publisher',$publisher,PDO::PARAM_STR);
$query->bindParam(':publisherid',$publisherid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Publisher updated successfully";
header('location:manage-publishers.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Publishers</title>
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
                <h4 class="header-line">Edit Publisher</h4>
                    </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">

<?php
$publisherid=intval($_GET['publisherid']);
$sql = "SELECT * from publishers where id=:publisherid";
$query = $dbh -> prepare($sql);
$query->bindParam(':publisherid',$publisherid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>



<div class="form-group">
<label>Publisher Name</label>
<input class="form-control" type="text" name="publisher" value="<?php echo htmlentities($result->publishName);?>" required />
</div>


<?php }} ?>
</div>

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
