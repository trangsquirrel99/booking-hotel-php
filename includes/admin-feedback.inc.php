<?php
    session_start();
    require_once('dbh.inc.php');
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
	require_once('header_Admin.inc.php');
	if(isset($_GET['action']) && $_GET['action']='delete'){
            $del = $_GET['id'];
        $sql= "DELETE FROM feedback WHERE id='$del' ";
        $stmt= $conn -> prepare($sql);
	    $stmt->execute();
    }
 ?>
<div class="container-fluid body-section container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-secondary"><i class="fa fa-plus-square"></i>Phản hồi khách hàng <small>Trả lời, xóa phản hồi</small></h2>
            
                    <table class="table table-bordered table-striped text-center">
                        <tr class="text-info" >
                        	<th>Họ tên</th>
                        	<th>Email</th>
                        	<th>Phone</th>
                        	<th>Message</th>
                        	<th></th>
                        	<th>Xóa</th>
                        </tr>
                        <?php 
                        	$sql = "SELECT id,Ten,Email,Phone,Message,Trangthai FROM feedback ORDER BY Trangthai";
                        	$stmt= $conn -> prepare($sql);
	    					$stmt->execute();
	    					$run =$stmt->get_result();
	    					if(mysqli_num_rows($run) > 0){
                                while($row = mysqli_fetch_array($run)){
                        ?>
                        	<tr>
                        		<td><?php echo $row['Ten'];?> </td>
                        		<td><?php echo $row['Email'];?></td>
                        		<td><b><?php echo $row['Phone']; ?></b></td>
                        		<td><?php echo $row['Message']; ?></td>
                        		<?php if(!$row['Trangthai']){ ?>
                        				<td>
		                        			<form action="sendmail-AnsCus.inc.php" method = "post">
		                        			<input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>" />
		                        			<input type="hidden" name="hidden_email" value="<?php echo $row['Email']; ?>" />
		                        			<button type="submit" class="btn btn-danger" name="ans">Trả lời</button>
		                        			</form>
                        				</td>';
                        		<?php } else {
                        			echo'<td><i class="fas fa-check fa-2x" style="color:green;"></i></td>';
                        		} ?>
                        		<td><a href="admin-feedback.inc.php?action=delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Bạn thực sự muốn xóa?')"><i class="fas fa-trash" style="color:blue"></i></a></td>
                        	</tr>
                        <?php        }
                            }
                         ?>
                    </table>
        </div>
    </div>
</div>
 <?php mysqli_close($conn);} ?>