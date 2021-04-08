<?php
    session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
    	require_once('header_Admin.inc.php');
        require_once ('dbh.inc.php');
     ?>
    <div class="container-fluid body-section container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-8">
                        <h2><i class="fa fa-plus-square"></i> Dịch vụ </h2>
                    </div>
                    <div class="col-4" align="right">
                        <a href="update-info.inc.php"><h4><i class="fas fa-plus"></i>Cập nhật</h4></a>
                    </div>
                </div>
                
                
                        <table class="table " style="margin-bottom: 100px;">
                            <thead class="text-danger">
                                <th style="width:3%"></th>
                                <th style="width:30%"><center>Giới thiệu ngắn gọn</center></th>
                                <th style="width:67%"><center>Giới thiệu chi tiết</center></th>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM abouthotel";
                                    $stmt= $conn -> prepare($sql);
    						        $stmt->execute();
    						        $query1 =$stmt->get_result();
    						        if(mysqli_num_rows($query1) > 0){
    						        while($row = mysqli_fetch_array($query1)){                                 
                                ?>
                                <tr>
                                	<td><i class="far fa-plus-square" data-toggle="collapse" href="#collapser_ser" role="button" aria-expanded="false" aria-controls="collapser_ser?>"></i></td>
                                    <td><p><?php echo $row['Shortabout']; ?></p></td>
                                    <td><p><?php echo $row['Longabout']; ?></p></td>
                                </tr>
                                <tr class="collapse" id="collapser_ser">
                        
                                	<td colspan="3">
                                		<div id="slide" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div  class="carousel-item active">
                                                    <img src="../images/home_gallary/<?php echo $row['image1']; ?>" alt="...">
                                                
                                                </div>
                                                <div  class="carousel-item">
                                                      <img src="../images/home_gallary/<?php echo $row['image2']; ?>" alt="...">
                                                      
                                                </div>
                                                <div  class="carousel-item">
                                                      <img src="../images/home_gallary/<?php echo $row['image3']; ?>" alt="...">
                                                      
                                                </div>
                                                 <div   class="carousel-item">
                                                      <img src="../images/home_gallary/<?php echo $row['image4']; ?>" alt="...">
                                                      
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
                   
                                	</td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                                
                            </tbody>
                        </table>
        </div>
    </div>
<?php mysqli_close($conn);} ?>