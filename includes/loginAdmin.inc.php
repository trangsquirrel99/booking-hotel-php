<?php
  session_start();
	require_once('dbh.inc.php');
	if(isset($_POST['admin-submit'])){
		
		$admin= $_POST['admin'];
		$pw = $_POST['password'];
    $pw_hash = password_hash($pw, PASSWORD_DEFAULT);
    // $sql= "INSERT INTO adminlogin VALUES (1,'$admin','$pw_hash')";
    // $stmt = $conn -> prepare($sql);
    // $stmt->execute();
    $sql = "SELECT * FROM adminlogin WHERE admin= '$admin'";
    $stmt = $conn -> prepare($sql);
    $stmt->execute();
    $query1 =$stmt->get_result();

    if($row = mysqli_fetch_array($query1)){
      if(password_verify($pw, $row['password'])){
        $_SESSION['admin'] = $row['admin'];
        $_SESSION['idadmin'] = $row['id'];
        header("Location:Allrooms.inc.php");
      }
      else{
        header("Location:loginAdmin.inc.php?error=wrongpw");
        exit();
      }
    }
    else{header("Location:loginAdmin.inc.php?error=wronguser");
          exit();}

	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
</head>
<body>
<!-- Menu -->
<nav id = "navbar" class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class ="container-fluid">
		<span class="navbar-branch">
	    	<img src="../images/home_gallary/logo-hotel-2.jpg" height="50" > Welcome Hotel 
		</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav ml-auto">
		    	<li class="nav-item">
		        	<a class="nav-link" href="../index.php">Trang chủ</a>
		      </li>	
          <li class="nav-item active">	                
             <a class="nav-link" href="#">Đăng nhập</a>;
      		</li>
		    </ul>
		   <!--  <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form> -->
  		</div>
	</div>
</nav>
<main>
	<div class="container">
      <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
              <form class="form-signin animated shake" action="" method="post">
                <h2 class="form-signin-heading">Admin Login</h2>
                <label class="sr-only">Username</label>
                <input type="text" name="admin" class="form-control" placeholder="Admin" required autofocus>
                <label class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input type="submit" name="admin-submit" value="Sign In" class="btn btn-lg btn-primary btn-block">
              </form>
          </div>
          <div class="col-md-4"></div>
      </div>
    </div> <!-- /container -->

</main>
