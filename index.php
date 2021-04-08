
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
  <link rel="stylesheet" type = "text/css" href="css/style.css">
</head>
<body>
<!-- Menu -->
<nav id = "navbar" class="navbar navbar-expand-md navbar-light bg-light sticky-top">
  <div class ="container-fluid">
    <span class="navbar-branch">
        <img src="images/home_gallary/logo-hotel-2.jpg" height="50" > Welcome Hotel 
    </span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="nav-link" href="#">Trang chủ<span class="sr-only">(current)</span></a>
            </li>     
            <li class="nav-item dropdown">
              <a class="nav-link " href="includes/Room.inc.php" id="navbarDropdown">Phòng</a>
              <div class="dropdown-menu" >
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="includes/Room.inc.php#Standard">Loại Standard</a>               
                <a class="dropdown-item" href="includes/Room.inc.php#Superior">Loại Superior</a>               
                <a class="dropdown-item" href="includes/Room.inc.php#Deluxe">Loại Deluxe</a>               
              </div>
          </li>
            <li class="nav-item dropdown">
              <a class="nav-link" >Dịch vụ</a>
              <div class="dropdown-menu" >
                <!-- <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="includes/Spa.inc.php">Spa</a>               
                <a class="dropdown-item" href="includes/Restaurant.inc.php">Restaurant</a>                              
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="includes/About.inc.php">Giới thiệu</a>
            </li>
            <li class="nav-item">             
                <a class="nav-link" href="includes/loginAdmin.inc.php">Đăng nhập</a>;
            </li>
        </ul>
      </div>
  </div>
</nav>
<!-- Carousel -->

<?php
	require('includes/dbh.inc.php');
	$sql =  "SELECT image1,image2,image3,image4,Shortabout FROM abouthotel";
	$stmt= $conn -> prepare($sql);
    $stmt->execute();
    $query1 =$stmt->get_result();
    if($row = mysqli_fetch_array($query1)){
 ?>
 	<div id="slide" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		    <li data-target="#slide" data-slide-to="0" class="active"></li>
		    <li data-target="#slide" data-slide-to="1"></li>
		    <li data-target="#slide" data-slide-to="2"></li>
		    <li data-target="#slide" data-slide-to="3"></li>
	  	</ol>
	 	<div class="carousel-inner">
		    <div class="carousel-item active">
		     	<img src="images/home_gallary/<?php echo $row['image1']; ?>" >
		    </div>
		    <div class="carousel-item">
		       	<img src="images/home_gallary/<?php echo $row['image2']; ?>">	      
		    </div>
		    <div class="carousel-item">
		     	<img src="images/home_gallary/<?php echo $row['image3']; ?>" >
		    </div>
		    <div class="carousel-item">
		     	<img src="images/home_gallary/<?php echo $row['image4']; ?>">
		    </div>
		 
	  	</div>
		  	<a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" ></span>
		    <span class="sr-only">Previous</span>
	  		</a>
		  	<a class="carousel-control-next" href="#slide" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" ></span>
		    <span class="sr-only">Next</span>
	  		</a>
		</div>
	
<!-- jumbotron -->
<div class="about">
    <div class="container-fluid">
        <div class="jumbotron">
	    	<div class = "row">
            	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8">
	                <h1 class="display-4">Chào mừng đến với Capital Hotel</h1>
				    <div class="home-des">
				        <div style="text-align:justify;"><img  src="images/home_gallary/<?php echo $row['image3']; ?>"/>

				        	<p><?php echo $row['Shortabout'];  } mysqli_close($conn); ?><br></p>

		                <a href="includes/About.inc.php"><button type ="button" class="btn btn btn-outline-secondary">Đọc thêm</button></a>		                               
				        </div>
				    </div>
	            </div>
				
		       <!--BookingBox-->
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3" id="box">					
					<h5>Đặt phòng ngay</h5>					
					<hr>
					<form class="form-horizontal" action="includes/search_room.inc.php" method="post">
						<fieldset>					
							<div class="form-group">
		    					<label>Ngày đến</label>
		    					<input class="form-control-range" type = "date" name="Checkin" min="<?php echo date("yy-m-d"); ?>" value = "<?php echo date("yy-m-d"); ?>" >
		  					</div>
		  					<div class="form-group">
		    					<label>Ngày đi</label>
		    					<input  class="form-control-range" type = "date" name="Checkout" min= "<?php $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));echo date("yy-m-d",$tomorrow); ?>" value ="<?php $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));echo date("yy-m-d",$tomorrow); ?>">
							</div>
							<div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" >Người lớn</label>
                                    <div class="">
                                        <select class="form-control input-sm" name="adult">
                                            <option value="1" selected="selected">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Trẻ con</label>
                                    <div class="">
                                        <select class="form-control input-sm"  name="child">
                                            <option value="0" selected="selected">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row Welcome text-center">
                            	<div class="col-12">
                            	<button name ="search" class="btn btn btn-success" type="submit"><h5>Tìm phòng</h5></button>
                            	</div>
                            </div>
						</fieldset>
					</form>
				</div>
	    	</div>
        </div>
    </div>
</div>

<!-- Room-list -->
<div class="room-list">   
    <h1 class="display-4">Phòng khách sạn</h1>
    <div class="container-fluid">
        <div class="clearfix">        	
        	<div class="row" id ="room-box">
				<div class="col-md-4 col-sm-4">
                    <div class="card">
                   		<div class="card-top">
					  	<img class="card-img-top" src="./images/home_gallary/1.3.jpg" alt="Card image cap">
					    </div>
					  	<div class="card-body">
						    <a title="Loại DELUXE " href="includes/Room.inc.php#Deluxe"><h5 class="card-title">Phòng Deluxe</h5></a>
						    <p class="card-text">
						    	<!-- <i class="fa fa-eye" aria-hidden="true"></i>
						    	<i class="fa fa-bed" aria-hidden="true"></i> 
						    	<i class="fas fa-spa"></i>
								<i class="fas fa-utensils"></i>
								<i class="fas fa-swimmer"></i>-->
								<div class="row text-center padding">
									<div class="col-md-4 col-sm-4">
										<img alt="" src="./images/home_gallary/dientich.png"
		                               /><p>40-50m<sup>2</sup></p>
	                            	</div>
									<div class="col-md-4 col-sm-4">
										<i class="fa fa-bed fa-2x" aria-hidden="true"></i><p>1 giường lớn hoặc 2 giường đơn</p>
	                            	</div>
	                            	<div class="col-md-4 col-sm-4">
										<i class="fa fa-eye fa-2x" aria-hidden="true"></i><p>Hướng thành phố</p>
	                            	</div>						
								</div>
							</p>							   
					  	</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
                    <div class="card">
                    	<div class="card-top">
					  	<a href="#"><img class="card-img-top" src="./images/home_gallary/8.jpg" alt="Card image cap"></a>
					  	</div>
					  	<div class="card-body">
					    	<a title="Loại Superior" href="includes/Room.inc.php#Superior"><h5 class="card-title">Phòng Superior</h5></a>
					    	<p class="card-text">
					    		<div class="row text-center padding">
									<div class="col-md-4 col-sm-4">
										<img alt="" src="./images/home_gallary/dientich.png"
		                                 /><p>40m<sup>2</sup></p>
	                            	</div>
									<div class="col-md-4 col-sm-4">
										<i class="fa fa-bed fa-2x" aria-hidden="true"></i><p>1 giường lớn hoặc 2 giường đơn</p>
	                            	</div>
	                            	<div class="col-md-4 col-sm-4">
										<i class="fa fa-eye fa-2x" aria-hidden="true"></i><p>Hướng thành phố</p>
	                            	</div>						
								</div>
							</p>
					  	</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
                    <div class="card">
                    	<div class="card-top">
					  	<a href="#"><img class="card-img-top" src="./images/home_gallary/5.jpg" alt="Card image cap"></a>
					  	</div>
					  	<div class="card-body">
					    	<a title="Loại Standard " href="includes/Room.inc.php#Standard"><h5 class="card-title">Phòng Standard</h5></a>
					    	<p class="card-text">
					    	<div class="row text-center padding">
									<div class="col-md-4 col-sm-4">
										<img alt="" src="./images/home_gallary/dientich.png"><p>35m<sup>2</sup></p>
	                            	</div>
									<div class="col-md-4 col-sm-4">
										<i class="fa fa-bed fa-2x" aria-hidden="true"></i><p>3 hoặc 2 giường đơn</p>
	                            	</div>
	                            	<div class="col-md-4 col-sm-4">
										<i class="fa fa-eye fa-2x" aria-hidden="true"></i><p>Hướng thành phố</p>
	                            	</div>						
							</div>
							</p>														    	
						</div>
					</div>
				</div>	            
        	</div>                                
        </div>
    </div>   
</div>
<div class="room-list">
 	<h1 class="display-4">Dịch vụ</h1>
    <div class="container-fluid">
        <div class="clearfix">   
		    <div class="row" id="services">
		    	<?php
		    		require('includes/dbh.inc.php');
		    		 	$sql = "SELECT * FROM dichvu";
		    		  	$stmt= $conn -> prepare($sql);
				        $stmt->execute();
				        $query1 =$stmt->get_result();
				        if(mysqli_num_rows($query1) > 0){
				        while($row = mysqli_fetch_array($query1)){ 
		    	 ?>
				        	<div class="col-md-6">
					           <div id="carousel<?php echo $row['TenDv']; ?>" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
								    	<div class="carousel-item active">
									        <img src="images/home_gallary/<?php echo $row['image1']; ?>" alt="...">
									        <div class="carousel-caption">
										        <a href="includes/<?php echo $row['TenDv'];?>.inc.php"><?php echo $row['TenDv']; ?></a>
										    </div>
								    	</div>
									    <div class="carousel-item">
										      <img src="images/home_gallary/<?php echo $row['image2']; ?>" alt="...">
										      <div class="carousel-caption">
										        <a href="includes/<?php echo $row['TenDv'];?>.inc.php"><?php echo $row['TenDv']; ?></a>
										    </div>
									    </div>
									    <div class="carousel-item">
										      <img src="images/home_gallary/<?php echo $row['image3']; ?>" alt="...">
										      <div class="carousel-caption">
										        <a href="includes/<?php echo $row['TenDv'];?>.inc.php"><?php echo $row['TenDv']; ?></a>
										    </div>
									    </div>
									</div>
								</div>
					        </div>
		    <?php } } mysqli_close($conn);?>
		    </div>
		</div>
	</div>
</div>
<?php require_once('includes/footer.inc.php'); ?>
</body>

</html>
