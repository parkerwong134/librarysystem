<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['checkout']))
{
$userid=$_SESSION['userid'];
$collectionid=intval($_GET['collectionid']);
$sql="INSERT INTO rent(UserID,CollectionID) VALUES(:userid,:collectionid)";
$query = $dbh->prepare($sql);
$query->bindParam(':userid',$userid,PDO::PARAM_STR);
$query->bindParam(':collectionid',$collectionid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Item borrowed successfully";
header('location:user-items.php');
}
else
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:user-items.php');
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
    <title>Edit Collection</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap4.js"></script>
    <script src="assets/js/custom.js"></script>

</head>
<body>
<?php include('user-navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Checkout Item</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-body">
<form role="form" method="post">
<?php
$collectionid=intval($_GET['collectionid']);
$sql = "SELECT collection.Title,genre.GenreName,Genre.id as genreid,
authors.AuthorName,authors.id as authorid,
publishers.publishName,publishers.id as publishid,
collection.ISBN,collection.Price,collection.itemType,collection.id as collectionid
from collection join genre on genre.id=collection.GenreID
join authors on authors.id=collection.AuthorID
join publishers on publishers.id=collection.PublishID
where collection.id=:collectionid";
$query = $dbh -> prepare($sql);
$query->bindParam(':collectionid',$collectionid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>

<div class="form-group">
<label>Item Name</label>
<input class="form-control" type="text" name="title" value="<?php echo htmlentities($result->Title);?>" readonly/>
</div>

<div class="form-group">
<label>Genre</label>
<input class="form-control" type="text" name="genre" value="<?php echo htmlentities($result->GenreName);?>" readonly>
</div>

<div class="form-group">
<label>Author/Producer</label>
<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->AuthorName);?>" readonly>
</div>


<div class="form-group">
<label>Publisher</label>
<input class="form-control" type="text" name="publish" value="<?php echo htmlentities($result->publishName);?>" readonly>
</div>

<div class="form-group">
<label>Item Type</label>
<input class="form-control" type="text" name="type" value="<?php echo htmlentities($result->itemType);?>" readonly />
</div>

 <?php }} ?>


<button type="submit" name="checkout" id="submit" class="btn btn-info">Checkout</button>

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
