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
$title=$_POST['title'];
$genre=$_POST['genre'];
$author=$_POST['author'];
$publish=$_POST['publish'];
$type=$_POST['type'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];
$collectionid=intval($_GET['collectionid']);
$sql="update collection set Title=:title,GenreID=:genre,AuthorID=:author,PublishID=:publish,itemType=:type, ISBN=:isbn,Price=:price where id=:collectionid";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':genre',$genre,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':publish',$publish,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':collectionid',$collectionid,PDO::PARAM_STR);
$query->execute();
$_SESSION['msg']="Item updated successfully!";
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

<?php include('admin-navbar.php');?>
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Collection</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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
<label>Item Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="title" value="<?php echo htmlentities($result->Title);?>" required />
</div>

<div class="form-group">
<div class="form-group">
<label>Genre<span style="color:red;">*</span></label>
<select class="form-control" name="genre" required="required">
<option value="<?php echo htmlentities($result->genreid);?>"> <?php echo htmlentities($genrename=$result->GenreName);?></option>

<?php
$sql = "SELECT * from genre";
$query = $dbh -> prepare($sql);
$query->execute();
$resultgen=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($resultgen as $row)
{
if($genrename==$row->GenreName)
{
  continue;
}
else {
?>
<option value="<?php echo htmlentities($row->id);?>"><?php echo htmlentities($row->GenreName);?></option>
<?php }}} ?>
</select>
</div>


<div class="form-group">
<label>Author/Producer<span style="color:red;">*</span></label>
<select class="form-control" name="author" required="required">
<option value="<?php echo htmlentities($result->authorid);?>"> <?php echo htmlentities($athrname=$result->AuthorName);?></option>
<?php

$sql2 = "SELECT * from authors";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($result2 as $ret)
{
if($athrname==$ret->AuthorName)
{
continue;
} else{

    ?>
<option value="<?php echo htmlentities($ret->id);?>"><?php echo htmlentities($ret->AuthorName);?></option>
 <?php }}} ?>
</select>
</div>

<div class="form-group">
<label>Publisher<span style="color:red;">*</span></label>
<select class="form-control" name="publish" required="required">
<option value="<?php echo htmlentities($result->publishid);?>"> <?php echo htmlentities($publishername=$result->publishName);?></option>
<?php

$sql = "SELECT * from publishers";
$query3 = $dbh -> prepare($sql);
$query3->execute();
$fetchpublish=$query3->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query3->rowCount() > 0)
{
foreach($fetchpublish as $next)
{
if($publishername==$next->publishName)
{
  continue;
}
else
{      ?>
<option value="<?php echo htmlentities($next->id);?>"><?php echo htmlentities($next->publishName);?></option>
<?php }}} ?>
</select>
</div>

<div class="form-group">
<label>Item Type<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="type" value="<?php echo htmlentities($result->itemType);?>" required"required" />
</div>

<div class="form-group">
<label>ISBN<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->ISBN);?>"  required="required" />
</div>

 <div class="form-group">
 <label>Price in USD<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" value="<?php echo htmlentities($result->Price);?>"   required="required" />
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
