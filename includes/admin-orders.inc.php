<?php
	 session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else { require_once('header_Admin.inc.php'); 
    	   require_once ('dbh.inc.php');
           if(isset($_GET['action']) && $_GET['action']='delete'){
            $del = $_GET['id'];
            $sql1 = "DELETE FROM chitietphieu WHERE MAPHIEU = '$del'";
            $stmt= $conn -> prepare($sql1);
            $stmt->execute();
            $sql3 = "DELETE FROM phieudatphong WHERE MAPHIEU = '$del'";
            $stmt= $conn -> prepare($sql3);
            $stmt->execute();           
    }
?>
    	<div class="container-fluid body-section container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-info"><i class="fa fa-plus-square"></i>Phiếu đặt phòng <small>Xem, xóa phiếu đặt phòng</small></h2>
                    
                            <table class="table table-bordered table-striped text-center">
                                <tr class="text-danger" >
                                    <th style="width:5%"><center>MAKH</center></th>
                                    <th style="width:5%"><center>MAPHIEU</center></th>
                                    <th style="width:10%">Ngày lập</th>
                                    <th style="width:8%"><center>TenKh</center></th>
                                    <th style="width:10%"><center>Email</center></th>
                                    <th style="width:10%"><center>SĐT</center></th>
                                    <th style="width:10%"><center>Ngày đến - Ngày đi</center></th>
                                    <th style="width:4%"><center>Người lớn</center></th>
                                    <th style="width:4%"><center>Trẻ em</center></th>
                                    <th style="width:30%"><center>Chi tiết phòng đặt</center></th>
                                    <th style="width:4%"></th>
                                </tr>
                              
                                    <?php
                                        $sql = "SELECT PDP.MAKH,MAPHIEU,TenKH,Email,SĐT,CheckIn,CheckOut,NuAdults,NuChildren,Ngaylapphieu FROM khachhang AS KH INNER JOIN phieudatphong AS PDP  ON KH.MAKH = PDP.MAKH ORDER BY MAKH ASC";
                                        $r = "SELECT TenLoaiPhong, Soluong FROM loaiphong INNER JOIN chitietphieu ON loaiphong.MALP = chitietphieu.MALP WHERE MAPHIEU = ?";
                                        $stmt= $conn -> prepare($sql);
	    								$stmt->execute();
                                        $run =$stmt->get_result();
                                        $stmt= $conn -> prepare($r);
                                        if(mysqli_num_rows($run) > 0){
                                            while($row = mysqli_fetch_array($run)){
                                        
                                    ?>
                                    <tr>
                                        <td><center><?php echo $row['MAKH']; ?></center></td>
                                        <td><center><?php echo $row['MAPHIEU']; ?></center></td>
                                        <td><?php echo $row['Ngaylapphieu'];  ?></td>
                                        <td><center><?php echo $row['TenKH']; ?></center></td>                                         
                                        <td><center><b><?php echo $row['Email']; ?></b></center></td>
                                        <td class="text-info"><center><?php echo $row['SĐT']; ?></center></td>
                                        <td><center><?php echo $row['CheckIn']." đến " . $row['CheckOut']; ?></center></td>
                                        <td><center><?php echo $row['NuAdults']; ?></center></td>
                                        <td><center><?php echo $row['NuChildren']; ?></center></td>
                                        <td align="right"><b>
                                        	<?php 
                                        	$stmt -> bind_param('i',$row['MAPHIEU']);
                                        	$stmt -> execute();
                                        	$rel= $stmt-> get_result();
                                        	while($row2 = mysqli_fetch_array($rel)){
                                        		echo  $row2['TenLoaiPhong']."&nbsp;&nbsp;x".$row2['Soluong']."<br>";
                                        	}
                                         	?>
                                        </b></td>                                                                                      
                                       <td><a href="admin-orders.inc.php?action=delete&id=<?php echo $row['MAPHIEU'] ?>" onclick="return confirm('Bạn thực sự muốn xóa?')"><span class="text-danger" align="right"><i class="fas fa-trash"></i></span></a></td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                            </table>
                    
                    
                </div>
            </div>
        </div>
 <?php mysqli_close($conn); } 
 ?>