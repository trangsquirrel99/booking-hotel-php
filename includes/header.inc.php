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
  <link rel="stylesheet" type = "text/css" href="../css/style.css">
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
          <li class="nav-item active">
              <a class="nav-link" href="../index.php">Trang chủ<span class="sr-only">(current)</span></a>
            </li>     
            <li class="nav-item dropdown">
              <a class="nav-link " href="Room.inc.php" id="navbarDropdown">Phòng</a>
              <div class="dropdown-menu" >
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="Room.inc.php#Standard">Loại Standard</a>               
                <a class="dropdown-item" href="Room.inc.php#Superior">Loại Superior</a>               
                <a class="dropdown-item" href="Room.inc.php#Deluxe">Loại Deluxe</a>               
              </div>
          </li>
          </li>
           <li class="nav-item dropdown">
              <a class="nav-link" >Dịch vụ</a>
              <div class="dropdown-menu" >
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="Spa.inc.php">Spa</a>               
                <a class="dropdown-item" href="Restaurant.inc.php">Restaurant</a>                              
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.inc.php">Giới thiệu</a>
            </li>
            <li class="nav-item">             
                <a class="nav-link" href="loginAdmin.inc.php">Đăng nhập</a>;
            </li>
        </ul>
       <!--  <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
  </div>
</nav>
