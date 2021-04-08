
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel | ADMIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type = "text/css" href="../css/style.css">
</head>
<body>
<!-- Menu -->
<nav id = "navbar" class="navbar navbar-expand-md navbar-light sticky-top bg-info" >
	<div class ="container-fluid">
		<span class="navbar-branch">
	    	<img src="../images/home_gallary/logo-hotel-2.jpg" height="50" > Welcome Hotel 
		</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav ml-auto">	  
		      	<li class="nav-item dropdown">
		        	<a class="nav-link " href="Allrooms.inc.php" id="navbarDropdown">Phòng</a>
		     	  </li>
      			<li class="nav-item">
        			<a class="nav-link" href="admin-services.inc.php">Dịch vụ</a>
      			</li>
            <li class="nav-item">
              <a class="nav-link" href="admin-Hotel.inc.php">Thông tin</a>
            </li>
      			<li class="nav-item">
        			<a class="nav-link" href="admin-orders.inc.php">Phiếu đặt phòng</a>
      			</li>
            <li class="nav-item">
              <a class="nav-link" href="admin-feedback.inc.php">Phản hồi khách hàng</a>
            </li>
      			<li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>  <?php echo $_SESSION['admin']; ?></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="logoutadmin.inc.php">Đăng xuất</a>               
                <a class="dropdown-item" href="changepw.inc.php">Đổi mật khẩu</a>                             
              </div>              
      			</li>
		    </ul>
  		</div>
	</div>
</nav>