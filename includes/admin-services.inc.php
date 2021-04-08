<?php
    session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
    	require_once('header_Admin.inc.php');
        require_once ('dbh.inc.php');
    	if(isset($_GET['del'])){
            $del = $_GET['del'];
            $sql = "DELETE FROM dichvu WHERE MADV = $del";
            $stmt= $conn -> prepare($sql);
            $stmt->execute();
        } 
     ?>
    <div class="container-fluid body-section container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-8">
                        <h2><i class="fa fa-plus-square"></i> Dịch vụ <small>Cập nhật hoặc xóa dịch vụ</small></h2>
                    </div>
                    <div class="col-4" align="right">
                        <a href="add-services.inc.php"><h4><i class="fas fa-plus"></i> Thêm dịch vụ</h4></a>
                    </div>
                </div>
                
                
                <div class="card">
                    <div class="card-content table-responsive table-full-width">
                        <table class="table">
                            <thead class="text-danger">
                            	<th></th>
                                <th><center>MADV</center></th>
                                <th><center>Tên dịch vụ</center></th>
                                <th ><center>Chi tiết</center></th>
                                <th><center>Cập nhật</center></th>
                                <th><center>Xóa</center></th>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM dichvu";
                                    $stmt= $conn -> prepare($sql);
    						        $stmt->execute();
    						        $query1 =$stmt->get_result();
    						        if(mysqli_num_rows($query1) > 0){
    						        while($row = mysqli_fetch_array($query1)){                                 
                                ?>
                                <tr>
                                	<td><i class="far fa-plus-square" data-toggle="collapse" href="#collapseroom_<?php echo $row['MADV']; ?>" role="button" aria-expanded="false" aria-controls="collapseroom_<?php echo $row['MADV']; ?>"></i></td>
                                    <td><center><?php echo $row['MADV']; ?></center></td>
                                    <td><center><?php echo $row['TenDv']; ?></center></td>
                                    <td>
										<p>
											<?php echo $row['des']; ?>
										</p>
                                    </td>
                      
                                    <td><center><a href="edit-services.inc.php?id=<?php echo $row['MADV']; ?>"><i class="fa fa-pencil-alt"></i></a></center></td>
                                    <td><center><a href="admin-services.inc.php?del=<?php echo $row['MADV']; ?>"><i class="fa fa-times"></i></a></center></td>
                                </tr>
                                <tr class="collapse" id="collapseroom_<?php echo $row['MADV']; ?>">
                        
                                	<td colspan="6">
                                		<div class="row">
                                			<div class="col-4">
                                				<img src="../images/home_gallary/<?php echo $row['image1']; ?>">
                                			</div>
                                			<div class="col-4">
                                				<img src="../images/home_gallary/<?php echo $row['image2']; ?>">
                                			</div>
                                			<div class="col-4">
                                				<img src="../images/home_gallary/<?php echo $row['image3']; ?>">
                                			</div>
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
                
                <div class="row">
                    <div class="col-xs-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php mysqli_close($conn);} ?>