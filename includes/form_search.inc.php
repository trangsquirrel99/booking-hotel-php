<?php
	require_once('dbh.inc.php');
?>

 <form method="post" class="form-search" action="search_room.inc.php">
 	<div class="row">
		<div class="col-md-2 booking-title text-white" align="center">
	       <h5>ĐẶT PHÒNG NGAY</h5><h6>Liên lạc theo số (024) 6259 8807</h6>	        
	    </div>
		<div class="col-md-2 col-sm-4 col-xs-6" style="margin-left:40px;">
			<label for="CheckIn">Ngày đến<span class="required" aria-required="true">*</span></label>
		      <input class="form-control" type="date" name="CheckIn" min="<?php echo date("yy-m-d"); ?>" value ="<?php echo $_SESSION['Checkin']; ?>">
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6">
			 <label for="CheckOut">Ngày đi<span class="required" aria-required="true">*</span></label>
		      <input class="form-control" type="date"  name="CheckOut" min="<?php echo strftime("%Y-%m-%d", strtotime(date("Y-m-d", strtotime($_SESSION['Checkin'])) . " +1 day")); ?>" value="<?php echo  $_SESSION['Checkout']; ?>">
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6">
	        <label for="Adult">Người lớn<span class="required" aria-required="true">*</span></label>
	        <select class="form-control" id="Adult" name="Adult" >
	        	<?php for ($i =1; $i<10;$i++) { if($i == $_SESSION['adults']) { ?>
	        	<option selected="selected" value="<?php echo $i;?>"><?php echo  $i;?></option>
	        	<?php } else { ?>
	        	<option value="<?php echo $i; ?>"><?php echo $i ;?></option>
				<?php } }?>
			</select>                           
	    </div>
	    <div class="col-md-2 col-sm-4 col-xs-6">
	        <label for="Child">Trẻ con<span class="required" aria-required="true">*</span></label>
	        <select class="form-control" id="Child" name="Child" >
	        	<?php for ($i =0; $i<10;$i++) { if($i == $_SESSION['childs']) { ?>
	        	<option selected="selected" value="<?php echo $i;?>"><?php echo $i;?></option>
	        	<?php } else { ?>
	        	<option value="<?php echo $i; ?>"><?php echo $i ;?></option>
				<?php } }?>
			</select>                           
	    </div>
	    <div class="col-md-1 col-sm-3 col-xs-6" align="left">
	    	<button name ="submit" class="btn btn btn-outline-light" type="submit"><h5>Tìm phòng</h5></button>
	    </div>
    </div>
</form>

