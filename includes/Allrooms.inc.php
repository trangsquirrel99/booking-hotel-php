<?php
    session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
    	require_once('header_Admin.inc.php');
        require_once ('dbh.inc.php');
    	if(isset($_GET['del'])){
            $del = $_GET['del'];
            $sql = "DELETE FROM loaiphong WHERE MALP = $del";
            $stmt= $conn -> prepare($sql);
            $stmt->execute();
        } 
     ?>
    <div class="container-fluid body-section container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-8">
                        <h2><i class="fa fa-plus-square"></i> Loại phòng <small>Cập nhật hoặc xóa loại phòng</small></h2>
                    </div>
                    <div class="col-4" align="right">
                        <a href="add-room.inc.php"><h4><i class="fas fa-plus"></i> Thêm loại phòng</h4></a>
                    </div>
                </div>
                
                
                <div class="card">
                    <div class="card-content table-responsive table-full-width">
                        <table class="table">
                            <thead class="text-danger">
                            	<th></th>
                                <th><center>MALP</center></th>
                                <th><center>Tên Loại Phòng</center></th>
                                <th><center>Diện tích</center></th>
                                <th><center>Giá phòng</center></th>
                                <th><center>Tổng số lượng phòng</center></th>
                                <th><center>Cập nhật</center></th>
                                <th><center>Xóa</center></th>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM loaiphong";
                                    $stmt= $conn -> prepare($sql);
    						        $stmt->execute();
    						        $query1 =$stmt->get_result();
    						        if(mysqli_num_rows($query1) > 0){
    						        while($row = mysqli_fetch_array($query1)){                                 
                                ?>
                                <tr>
                                	<td><i class="far fa-plus-square" data-toggle="collapse" href="#collapseroom_<?php echo $row['MALP']; ?>" role="button" aria-expanded="false" aria-controls="collapseroom_<?php echo $row['MALP']; ?>"></i></td>
                                    <td><center><?php echo $row['MALP']; ?></center></td>
                                    <td><center><?php echo $row['TenLoaiPhong']; ?></center></td>
                                    <td><center><?php echo $row['Dientich']; ?></center></td>
                                    <td class="text-primary"><center><?php echo number_format($row['GiaPhong']); ?> VNĐ</center></td>
                                    <td><center><?php echo $row['Sum_rooms']; ?></center></td>
                                    <td><center><a href="edit-room.inc.php?id=<?php echo $row['MALP']; ?>"><i class="fa fa-pencil-alt"></i></a></center></td>
                                    <td><center><a href="Allrooms.inc.php?del=<?php echo $row['MALP']; ?>"><i class="fa fa-times"></i></a></center></td>
                                </tr>
                                <tr class="collapse" id="collapseroom_<?php echo $row['MALP']; ?>">
                                    <td colspan="2">
                                        <div class="card-top " style="width: 400px;">
                                            <image src="../images/home_gallary/<?php echo $row['image1'] ?>">
                                        </div>
                                    </td>
                                	<td colspan="6">                            																				   
    								    <h5><?php echo 'Người lớn:  '; 
                                        for ($i = 1; $i <=  $row['NuMaxAdult']; $i++) {
                                            echo '<i class="fas fa-user"></i>';
                                        } ?>                    
                                        </h5>
                                        <h6>
                                            <?php
                                            if($row['NuMaxChild']){
                                             echo 'Trẻ con: ';
                                             for ($i = 1; $i <=  $row['NuMaxChild']; $i++) {
                                                    echo '<i class="fas fa-user"></i>';
                                            } }?>                       
                                        </h6>
    								    <h6>Tiện nghi phòng: </h6> <?php echo $row['TienNghi']; ?>							    									  		
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