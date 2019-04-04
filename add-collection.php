<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['add']))
{
$title=$_POST['title'];
$genre=$_POST['genre'];
$author=$_POST['author'];
$publish=$_POST['publish'];
$type=$_POST['type'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];

$sql="INSERT INTO collection(title,GenreID,AuthorID,ISBN,Price,itemType,PublishID) VALUES(:title,:genre,:author,:isbn,:price,:type,:publish)";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':genre',$genre,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':publish',$publish,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Added successfully!";
header('location:admin-view.php');
}
else
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:admin-view.php');
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
    <title>Add Collection</title>
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
  <?php include('admin-navbar.php');?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Item</h4>
            </div>
        </div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">

<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Item Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" autocomplete="off"  required />
</div>

<div class="form-group">
<label>Genre<span style="color:red;">*</span></label>
<select class="form-control" name="genre" required="required">
<option value="">Select Genre</option>

<?php
$sql = "SELECT * from genre";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->GenreName);?></option>
 <?php }} ?>
</select>
</div>

<div class="form-group">
<label>Author/Producer<span style="color:red;">*</span></label>
<select class="form-control" name="author" required="required">
<option value="">Select Author/Producer</option>
<?php

$sql = "SELECT * from authors";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->AuthorName);?></option>
 <?php }} ?>
</select>
</div>

<div class="form-group">
<label>Publisher<span style="color:red;">*</span></label>
<select class="form-control" name="publish" required="required">
<option value="">Select Publisher</option>
<?php

$sql = "SELECT * from publishers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->publishName);?></option>
 <?php }} ?>
</select>
</div>

<div class="form-group">
<label>Item Type<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="type" autocomplete="off"  required />
</div>

<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn"  required="required" autocomplete="off"  />
</div>

 <div class="form-group">
 <label>Price<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" autocomplete="off" required="required" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add </button>
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
