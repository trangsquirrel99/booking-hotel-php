<?php
	session_start();
	function cart_item_number(){
    	if(isset($_SESSION['cart_rooms'])){
    		return count($_SESSION['cart_rooms']);
    	}
    	else{
    		return 0;
    	}
    }
	
    function Checkday($checkin,$checkout){
   if (strtotime($_SESSION[$checkin]) < strtotime($_SESSION[$checkout])) {
    	return true;
	  } else {
	    $_SESSION[$checkout] = strtotime(date("Y-m-d", strtotime($_SESSION[$checkin])) . " +1 day");
  		$_SESSION[$checkout] = strftime("%Y-%m-%d", $_SESSION[$checkout]);
	    return true;
	  }
    }
    //xử lý tìm phòng
	if(isset($_POST['search'])){
    $_SESSION['Checkin'] = $_POST['Checkin'];
    $_SESSION['Checkout'] = $_POST['Checkout'];
    $_SESSION['adults']	 = $_POST['adult'];
    $_SESSION['childs']  = $_POST['child'];
	Checkday('Checkin','Checkout');}

    //Xử lý thay đổi điều kiện tìm phòng
    if(isset($_POST['submit'])) {
    	if(isset($_SESSION['cart_rooms'])AND ($_SESSION['Checkin']!= $_POST['CheckIn'] OR $_SESSION['Checkout'] != $_POST['CheckOut'])){
    	foreach($_SESSION['cart_rooms'] as $keys => $values){
    		 unset($_SESSION['cart_rooms'][$keys]); 
    		}
    	}
	    $_SESSION['Checkin'] = $_POST['CheckIn'];
	    $_SESSION['Checkout'] = $_POST['CheckOut'];
	    $_SESSION['adults'] = $_POST['Adult'];
	    $_SESSION['childs'] = $_POST['Child'];
	    Checkday('Checkin','Checkout');
	}
    $Checkin  =  $_SESSION['Checkin'];
    $Checkout = $_SESSION['Checkout'];
     //add item to cart  
    if(isset($_POST['add_to_cart'])AND $_POST['quantity'] > 0){
        // Kiểm tra có sản phẩm nào lưu trong giỏ không?
        if(isset($_SESSION ['cart_rooms']) && !empty($_SESSION['cart_rooms'])){
            // Lấy ra mã của các sản phẩm trong giỏ
            $item_array_id = array_column($_SESSION['cart_rooms'],'item-id');
            if(!in_array($_POST['hidden_id'],$item_array_id)){
                $count = count($_SESSION ['cart_rooms']);
                $item_array= array(
                    'item-id' => $_POST['hidden_id'],
                    'item-name'=> $_POST['hidden_name'],
                    'item-price'=> $_POST['hidden_price'],
                    'item-quantity'=> $_POST['quantity'],
                    'item-maxroom'=>$_POST['hidden_maxroom']
                );
                $_SESSION['cart_rooms'][$count] = $item_array;
                echo    '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Đã thêm vào đơn đặt phòng.</strong>
                </div>';  
                }

            else{ 
            echo    '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Loại phòng này đã có trong đơn đặt phòng.</strong>
                </div>';   
            }
        }
        //Thêm item đầu tiên vào giỏ
        else{
            $item_array= array(
                'item-id' => $_POST['hidden_id'],
                'item-name'=> $_POST['hidden_name'],
                'item-price'=> $_POST['hidden_price'],
                'item-quantity'=> $_POST['quantity'],
                'item-maxroom'=>$_POST['hidden_maxroom']
            );
            $_SESSION['cart_rooms'][0] = $item_array;
            echo    '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Đã thêm vào đơn đặt phòng.</strong>
                </div>';  
        }
    }
    function Ischecked($chboxname,$value){
    	{
        if(!empty($_POST[$chboxname]))
        {
            foreach($_POST[$chboxname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    	}
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type = "text/css" href="../css/style.css">
	<title>Hotel</title>
</head>
<body>
<!-- Menu -->
<nav id = "navbar" class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class ="container-fluid">
		<span class="navbar-branch">
	    	<img src="../images/home_gallary/logo-hotel-2.jpg" height="50"> Welcome Hotel 
		</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav ml-auto">
		    	<li class="nav-item ">
		        	<a class="nav-link" href="../index.php">Trang chủ</a>
		        </li>		  
		      	<li class="nav-item">
		        	<a class="nav-link " href="search_room.inc.php">Đặt phòng</a>
		     	</li>
      			<li class="nav-item">
        			<a class="nav-link" href="cart_rooms.inc.php"><i class="fas fa-shopping-cart"><span id="cart-item" class="badge badge-danger"><?php echo cart_item_number(); ?></span></i></a>
      			</li>
		    </ul>
		   <!--  <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form> -->
  		</div>
	</div>
</nav>	
<?php
    require('form_search.inc.php');
?>
<!-- Lọc phòng theo điều kiện -->

<div class="container-fluid" style="margin-top: 60px;">
<div class="row justify-content-center">
<div class="col-md-2 col-sm-3" >
	<form method="post">
		<div class="row">
			<div class="col-6 mt-auto" align="left"><button type="submit" name="filter_rooms"><i class="fas fa-glass-martini text-info fa-2x" ></i></button></div>
			<div class="col-6 text-info"><b><h4>Lọc phòng</h4></b></div>
		</div>
		<hr>
		<h6 class="text-info">Chọn loại phòng</h6>
		<ul class="list-group">
			<?php
				$sql= "SELECT TenLoaiPhong FROM loaiphong ";
				$TLP=[];
				$stmt= $conn -> prepare($sql);
		        $stmt -> execute();
		        $query1 = $stmt->get_result();
		        if(mysqli_num_rows($query1) > 0){
		        while($row = mysqli_fetch_array($query1)){ 
		        	array_push($TLP, $row['TenLoaiPhong']);
			 ?>
			 <li class="list-group-item">
			 	<div class="form-check">
			 		<?php if(Ischecked('TLP',$row['TenLoaiPhong'])) {?>
			 		<input type="checkbox" class="form-check-input" value= "<?php echo $row['TenLoaiPhong']; ?>" name="TLP[]" checked>
			 	<?php } else { ?> <input type="checkbox" class="form-check-input" value= "<?php echo $row['TenLoaiPhong']; ?>" name="TLP[]"> <?php } ?> 
			 		<label class="form-check-label"><?php echo $row['TenLoaiPhong']; ?></label>
			 	</div>
			 </li>
			<?php } }?>
		</ul>

		<hr>
		<h6 class="text-info">Chọn số người lớn tối đa trong một phòng</h6>
		<ul class="list-group">
			<?php
				$sql= "SELECT DISTINCT NuMaxAdult FROM loaiphong";
				$NuMaxAdult=[];
				$stmt= $conn -> prepare($sql);
		        $stmt->execute();
		        $query= $stmt->get_result();
		        if(mysqli_num_rows($query) > 0){
		        while($row = mysqli_fetch_array($query)){
		        	array_push($NuMaxAdult, $row['NuMaxAdult']);
			 ?>
			 <li class="list-group-item">
			 	<div class="form-check">
			 		<?php if(Ischecked('NuMaxAdult',$row['NuMaxAdult'])) {?>
			 		<input type="checkbox" class="form-check-input" value= "<?php echo $row['NuMaxAdult']; ?>" name="NuMaxAdult[]" checked>
			 	<?php } else { ?> <input type="checkbox" class="form-check-input" value= "<?php echo $row['NuMaxAdult']; ?>" name="NuMaxAdult[]"> <?php } ?>
			 		<label class="form-check-label"><?php echo $row['NuMaxAdult']; ?></label>
			 	</div>
			 </li>
			<?php } }?>
		</ul>
	</form>
</div>

<!--Xử lí bộ lọc  -->

<?php
if(isset($_POST['filter_rooms']) AND !(empty($_POST['TLP']) AND empty($_POST['NuMax']))) { ?>
	<div class="col-md-8 col-sm-9" >
	<h3 class="text-center text-info" id="room_title">Kết quả lọc các phòng</h3>
	 <table class="table table-bordered table-hover" id="result" style=" border-radius:5px; margin-top:15px;">
        <thead class = "thead-light" >
        	<tr>
            <th style="width:70%"><center>Loại phòng</center></th>
            <th style="width:10%"><center>Số lượng người tối đa</center></th>
            <th style="width:10%"><center>Giá phòng</center></th>               
            <th style="width:10%;"></th>
            </tr>                                    
        </thead>            
<?php	$sql= "SELECT CTP.MALP,TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NuMaxChild,GiaPhong,image1,
        (Sum_rooms - SUM(Soluong)) AS Sum_rooms FROM chitietphieu AS CTP INNER JOIN loaiphong AS LP ON CTP.MALP = LP.MALP WHERE MAPHIEU IN (SELECT MAPHIEU FROM phieudatphong WHERE (CheckOut >='$Checkin') AND (CheckIn<= '$Checkout')) GROUP BY CTP.MALP,TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NuMaxChild,GiaPhong,image1 
        	UNION 
        	SELECT MALP,TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NuMaxChild,GiaPhong,image1,Sum_rooms FROM loaiphong WHERE MALP NOT IN (SELECT distinct MALP FROM chitietphieu  WHERE MAPHIEU IN (SELECT MAPHIEU FROM phieudatphong WHERE (CheckOut >='$Checkin') AND (CheckIn<= '$Checkout')))";
		if(isset($_POST['TLP'])){
			$TLP = $_POST['TLP'];
		}
		if(isset($_POST['NuMaxAdult'])){
			$NuMaxAdult = $_POST['NuMaxAdult'];
		}
		$stmt= $conn -> prepare($sql);
	    $stmt->execute();
	    $query1 =$stmt->get_result();
	    if(mysqli_num_rows($query1) > 0){
	   		$flag= true;
	    while($row = mysqli_fetch_array($query1)){ 
	    	if(in_array( $row['TenLoaiPhong'],$TLP ) AND in_array($row['NuMaxAdult'],$NuMaxAdult)){
	    		$flag= false; ?>
	    		<tbody>               
	            <tr>
	    		<form method ="post" action="">    
	                <td>
	                	<div class="row">
	                		<div class="col-md-6 col-sm-6 card-top">
	                			<image src=" ../images/home_gallary/<?php echo $row['image1'] ?>">
	                		</div>
	                		<div class="col-md-6 col-sm-6">
			                	<div>
			                		<a href="#" id = "Thongtin"><?php echo $row['TenLoaiPhong']; ?></a>
			                	</div>
			                	<div>
			                		MALP: <?php echo $row['MALP']; ?>
			                	</div>
			                	<?php if($row['Sum_rooms']==0){ ?>
			                	<div class="text-danger">
			                		HẾT PHÒNG
			                	</div>		            
			                	 <?php } else {?>
			                	<div class="text-danger">
			                		Chỉ còn lại: <?php echo $row['Sum_rooms']; ?> phòng.
			                	</div><?php } ?>
			                	<div>
			                		<?php echo "Diện tích:". $row['Dientich'];?>
			                	</div>
			                	<div>
			                		<?php echo $row['TienNghi'] ?>
			                	</div>
			                </div>	
			            </div>	
	                </td>
	                <td><center><h5 style="margin-top:50%;"><?php echo 'Người lớn:<br>'; 
						                for ($i = 1; $i <=  $row['NuMaxAdult']; $i++) {
										    echo '<i class="fas fa-user"></i>';
										} ?>					
								</h5>
								<h6>
									<?php
									if($row['NuMaxChild']){
									 echo 'Trẻ con:<br>';
									 for ($i = 1; $i <=  $row['NuMaxChild']; $i++) {
										    echo '<i class="fas fa-user"></i>';
									} }?>						
								</h6>
					</center></td>
	                <td><center><h4 class="text-danger" style="margin-top:50%;"><?php echo number_format($row['GiaPhong']); ?> VNĐ</h4></center></td>
	                <input type="hidden" name="hidden_name" value="<?php echo $row['TenLoaiPhong']; ?>" />
	                <input type="hidden" name="hidden_id" value="<?php echo $row['MALP']; ?>" />  
	                <input type="hidden" name="hidden_price" value="<?php echo $row['GiaPhong']; ?>" />
	                <input type="hidden" name="hidden_maxroom" value="<?php echo $row['Sum_rooms']; ?>">                   
					<input type="hidden" name="quantity" value="1"> 
	                <?php if($row['Sum_rooms']==0){ ?>
	                	<td><button name ="add_to_cart" class="btn btn-secondary btn-lg" disabled style="margin-top:50%;" type="submit"><h5>Đặt phòng</h5></button></center></td>
	                 <?php } else {?>
	                <td><button name ="add_to_cart" class="btn btn btn-outline-success"style="margin-top:50%;" type="submit"><h5>Đặt phòng</h5></button></center></td> <?php } ?>
	            </form>   
	            </tr>      
 
    <?php	}
    } } if($flag) {?> <tbody>               
            	<tr>
				 <td colspan="4" class= "text-danger" align="center">Không tìm thấy kết quả phù hợp</td><?php } ?>
				</tr>
            </tbody>
    </table>
</div>
 <?php } else{?>
			<div class="col-md-8 col-sm-9" >
				<h3 class="text-center text-info" id="room_title" >Danh sách các phòng</h3>
				 <table class="table table-bordered table-hover" id="result" style=" border-radius:5px; margin-top: 15px;">
			        <thead class="thead-light">
			        	<tr>
			            <th style="width:70%"><center>Loại phòng</center></th>
			            <th style="width:10%"><center>Số lượng người tối đa</center></th>
			            <th style="width:10%"><center>Giá phòng</center></th>               
			            <th style="width:10%;"></th>
			            </tr>                                    
			        </thead>            
			        <tbody>               
			            <tr>
				<?php
			        $r = "SELECT CTP.MALP,TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NuMaxChild,GiaPhong,image1,
			        (Sum_rooms - SUM(Soluong)) AS Sum_rooms FROM chitietphieu AS CTP INNER JOIN loaiphong AS LP ON CTP.MALP = LP.MALP WHERE MAPHIEU IN (SELECT MAPHIEU FROM phieudatphong WHERE (CheckOut >='$Checkin') AND (CheckIn<= '$Checkout')) GROUP BY CTP.MALP,TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NuMaxChild,GiaPhong,image1 
			        	UNION 
			        	SELECT MALP,TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NumaxChild,GiaPhong,image1,Sum_rooms FROM loaiphong WHERE MALP NOT IN (SELECT distinct MALP FROM chitietphieu  WHERE MAPHIEU IN (SELECT MAPHIEU FROM phieudatphong WHERE (CheckOut >='$Checkin') AND (CheckIn<= '$Checkout')))"; 
			        $stmt= $conn ->prepare($r);
			        $stmt-> execute();
			        $query =$stmt->get_result();                              
			        if(mysqli_num_rows($query) > 0){
			            while($row = mysqli_fetch_array($query)){                                
			    ?>
						<form method ="post" action="">    
			                <td>
			                	<div class="row">
			                		<div class="col-md-6 col-sm-6 card-top">
			                			<image src=" ../images/home_gallary/<?php echo $row['image1'] ?>">
			                		</div>
			                		<div class="col-md-6 col-sm-6">
					                	<div>
					                		<a href="#" id = "Thongtin"><?php echo $row['TenLoaiPhong']; ?></a>
					                	</div>
					                	<div>
					                		MALP: <?php echo $row['MALP']; ?>
					                	</div>
					                	<?php if($row['Sum_rooms']==0){ ?>
					                	<div class="text-danger">
					                		HẾT PHÒNG
					                	</div>		            
					                	 <?php } else {?>
					                	<div class="text-danger">
					                		Chỉ còn lại: <?php echo $row['Sum_rooms']; ?> phòng.
					                	</div><?php } ?>
					                	<div>
					                		<?php echo "Diện tích:". $row['Dientich'];?>
					                	</div>
					                	<div>
					                		<?php echo $row['TienNghi'] ?>
					                	</div>
					                </div>	
					            </div>	
			                </td>
			                <td><center><h5 style="margin-top:50%;"><?php echo 'Người lớn:<br>'; 
						                for ($i = 1; $i <=  $row['NuMaxAdult']; $i++) {
										    echo '<i class="fas fa-user"></i>';
										}?>						
								</h5>
								<h6>
									<?php
									if($row['NuMaxChild']){
									 echo 'Trẻ con: <br>';
									 for ($i = 1; $i <=  $row['NuMaxChild']; $i++) {
										    echo '<i class="fas fa-user"></i>';
									} }?>					
								</h6>
							</center></td>
			                <td><center><h4 class="text-danger" style="margin-top:50%;"><?php echo number_format($row['GiaPhong']); ?> VNĐ</h4></center></td>
			                <input type="hidden" name="hidden_id" value="<?php echo $row['MALP']; ?>" />
			                <input type="hidden" name="hidden_name" value="<?php echo $row['TenLoaiPhong']; ?>" />  
			                <input type="hidden" name="hidden_price" value="<?php echo $row['GiaPhong']; ?>" />
			                <input type="hidden" name="hidden_maxroom" value="<?php echo $row['Sum_rooms']; ?>">                   
							<input type="hidden" name="quantity" value="1"> 
			                <?php if($row['Sum_rooms']==0){ ?>
			                	<td><button name ="add_to_cart" class="btn btn-secondary btn-lg" disabled style="margin-top:50%;" type="submit"><h5>Đặt phòng</h5></button></center></td>
			                 <?php } else {?>
			                <td><button name ="add_to_cart" class="btn btn btn-outline-success"style="margin-top:50%;" type="submit"><h5>Đặt phòng</h5></button></center></td> <?php } ?>
			            </form>   
			            </tr>      
			            <?php
			               }
			                }                                
			            ?>                      
			        </tbody>
			    </table>
			</div>
<?php  mysqli_close($conn);} ?>

    </div>
</div>


