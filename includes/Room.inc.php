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
 <nav class="navbar navbar-light bg-light">
 	<div class="navbar-brand text-white" ><img src="../images/home_gallary/logo-hotel-2.jpg" height="50" > Welcome Hotel </div>
  	<ul class="nav nav-pills ml-auto">
  		<li class="nav-item active">
	      <a class="nav-link" href="../index.php">Trang chủ</a>
	    </li> 
	    <li class="nav-item">
	      <a class="nav-link" href="#Deluxe">Phòng Deluxe</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#Superior">Phòng Superior</a>
	    </li>
	     <li class="nav-item">
	      <a class="nav-link" href="#Standard">Phòng Standard</a>
	    </li>
  	</ul>
</nav>
<form method="post" class="form-search" action="search_room.inc.php">
  <div class="row">
    <div class="col-md-2 booking-title text-white" align="center">
         <h5>ĐẶT PHÒNG NGAY</h5><h6>Liên lạc theo số (024) 6259 8807</h6>         
      </div>
    <div class="col-md-2 col-sm-4 col-xs-6" style="margin-left:40px;">
      <label>Ngày đến</label>
          <input class="form-control-range" type = "date" name="Checkin" min="<?php echo date("yy-m-d"); ?>" value = "<?php echo date("yy-m-d"); ?>" >
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6">
       <label>Ngày đi</label>
          <input  class="form-control-range" type = "date" name="Checkout" min= "<?php $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));echo date("yy-m-d",$tomorrow); ?>" value ="<?php $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));echo date("yy-m-d",$tomorrow); ?>">
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6">
          <label for="Adult">Người lớn</label>
          <select class="form-control input-sm" name="adult">
            <option selected="selected" value="1">1</option>
            <?php for ($i =2; $i<10;$i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i ;?></option>
        <?php }?>
      </select>                           
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6">
          <label for="Child">Trẻ con</label>
          <select class="form-control input-sm"  name="child">
            <option selected="selected" value="0">0</option>
            <?php for ($i =1; $i<10;$i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i ;?></option>
        <?php }?>
      </select>                         
      </div>
      <div class="col-md-1 col-sm-3 col-xs-6" align="left">
        <button name ="search" class="btn btn btn-success" type="submit"><h5>Tìm phòng</h5></button>
      </div>
    </div>
</form>


<div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="detailrooms">
  <h4 id="Deluxe">Phòng Deluxe</h4>
  <div>
  	 <div class="row justify-content-center">
  	<?php
  		require('dbh.inc.php');
  		$sql = "SELECT * FROM loaiphong WHERE TenLoaiPhong LIKE '%Deluxe%'";
  		$stmt= $conn -> prepare($sql);
        $stmt -> execute();
        $query1 = $stmt->get_result();
        if(mysqli_num_rows($query1) > 0){
        while($row = mysqli_fetch_array($query1)){
  	 ?>
  	 	<div class="col-md-5">
  	 		<h5><center><?php echo $row['TenLoaiPhong']; ?></center></h5>
  	 		<div>
                <image src="../images/home_gallary/<?php echo $row['image1'] ?>">
            </div>
            <div class="detail">
            	<?php echo 'MALP: '.$row['MALP'].'<br>';
            		  echo 'Diện tích: '.$row['Dientich'].'<br>';
            		  echo 'Số lượng người tối đa: '.$row['NuMax'].'<br>';
            		  echo 'Tiện nghi: '.$row['TienNghi'];
            	 ?>
            </div>
  	 	</div>
  	<?php } } ?> 	
  	 </div>  	
  </div>
  <h4 id="Superior">Phòng Superior</h4>
  <div>
  	 <div class="row justify-content-center">
  	<?php
  		require('dbh.inc.php');
  		$sql = "SELECT * FROM loaiphong WHERE TenLoaiPhong LIKE '%Superior%'";
  		$stmt= $conn -> prepare($sql);
        $stmt -> execute();
        $query1 = $stmt->get_result();
        if(mysqli_num_rows($query1) > 0){
        while($row = mysqli_fetch_array($query1)){
  	 ?>
  	 	<div class="col-md-5">
  	 		<h5><center><?php echo $row['TenLoaiPhong']; ?></center></h5>
  	 		<div class="m-auto">
                <image src="../images/home_gallary/<?php echo $row['image1'] ?>">
            </div>
            <div class="detail">
            	<?php echo 'MALP: '.$row['MALP'].'<br>';
            		  echo 'Diện tích: '.$row['Dientich'].'<br>';
            		  echo 'Số lượng người tối đa: '.$row['NuMax'].'<br>';
            		  echo 'Tiện nghi: '.$row['TienNghi'];
            	 ?>
            </div>
  	 	</div>
  	<?php } } ?> 	
  	 </div>  	
  </div>
  <h4 id="Standard">Phòng Standard</h4>
  <div>
  	 <div class="row justify-content-center">
  	<?php
  		require('dbh.inc.php');
  		$sql = "SELECT * FROM loaiphong WHERE TenLoaiPhong LIKE '%Standard%'";
  		$stmt= $conn -> prepare($sql);
        $stmt -> execute();
        $query1 = $stmt->get_result();
        if(mysqli_num_rows($query1) > 0){
        while($row = mysqli_fetch_array($query1)){
  	 ?>
  	 	<div class="col-md-5">
  	 		<h5><center><?php echo $row['TenLoaiPhong']; ?></center></h5>
  	 		<div class="m-auto">
                <image src="../images/home_gallary/<?php echo $row['image1'] ?>">
            </div>
            <div class="detail">
            	<?php echo 'MALP: '.$row['MALP'].'<br>';
            		  echo 'Diện tích: '.$row['Dientich'].'<br>';
            		  echo 'Số lượng người tối đa: '.$row['NuMax'].'<br>';
            		  echo 'Tiện nghi:<br> '.$row['TienNghi'];
            	 ?>
            </div>
  	 	</div>
  	<?php } } ?> 	
  	 </div>  	
  </div>
</div>
<?php require('footer.inc.php'); ?>