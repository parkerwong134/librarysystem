<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
	<style>
		h4 {
			color:blue;
			padding:20px;
			text-align:center;
			}
	</style>
<!-- MENU SECTION END-->

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line" style="text-align:center;">User Registration</h4>
            </div>
        </div>
             <div class="row">

<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();">
<div class="form-group">
<label>Full Name</label>
<input class="form-control" type="text" name="fullname" autocomplete="off" required />
</div>

<div class="form-group">
<label>Username</label>
<input class="form-control" type="username" name="username" id="username" autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span>
</div>

<div class="form-group">
<label>Enter Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>

<button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

                              </form>
                        </div>
                </div>
</div>
        </div>
    </div>
</div>

</body>
</html>
