<?php require('header.inc.php');
	  require('dbh.inc.php');
 ?>


	    	<div class = "row justify-content-center" style="margin-top: 60px;">
            	<div class="col-xs-10 col-sm-10 col-md-7 col-lg-7 col-xl-7">
	                <div class="display-4">RESTAURANT</div>
				    <?php
				    	$sql =  "SELECT image1,image2,image3,des FROM dichvu WHERE TenDv= 'Restaurant'";
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
						  	</ol>
						 	<div class="carousel-inner">
							    <div class="carousel-item active">
							     	<img src="../images/home_gallary/<?php echo $row['image1']; ?>" >
							    </div>
							    <div class="carousel-item">
							       	<img src="../images/home_gallary/<?php echo $row['image2']; ?>">	      
							    </div>
							    <div class="carousel-item">
							     	<img src="../images/home_gallary/<?php echo $row['image3']; ?>" alt="...">
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
						<div>
							<p>
							<?php echo "<br>".$row['des']; ?>
							</p>
						</div>
						
				           
				 	<?php } mysqli_close($conn);?>
	            </div>
				
		       <!--BookingBox-->
				<?php require('verform_search.inc.php'); ?>
	    	</div>
<?php require('footer.inc.php'); ?>