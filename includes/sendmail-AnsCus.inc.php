<?php
    session_start();
    require_once('dbh.inc.php');
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
	require_once('header_Admin.inc.php');
	if(isset($_POST['ans'])){
	$_SESSION['id']= intval($_POST['hidden_id']);
	$_SESSION['to_email']= $_POST['hidden_email'];}
	if(isset($_POST['submit'])){
	$subject = $_POST['subject'];
	$body= $_POST['body'];
	$headers= "From: dinhnhan0905@gmail.com";
	if(mail($_SESSION['to_email'],$subject,$body,$headers)){
		echo "Send success!";
		$id_fb = $_SESSION['id'];
		$sql = "UPDATE feedback SET Trangthai = '1' WHERE id = '$id_fb' ";
		$stmt= $conn -> prepare($sql);
	    $stmt->execute();}
	else{echo "Send fail!";}
	}
 ?>
 <h4 class="text-center text-info mt-auto">Trả lời Email khách hàng</h4>
 <div class="row justify-content-center">
 	<div class="col-5">
		<form role="form" method="post">
		    <div class="form-group">    
		    <input type="text" class="form-control" name="toemail" value ="<?php echo $_SESSION['to_email']; ?>" disabled>
		    </div>
		    <div class="form-group">
		    <input type="text" class="form-control" name="subject"  placeholder="Chủ đề" required>
		    </div>
		    <div class="form-group">
		    <textarea type="text" class="form-control" name="body" placeholder="Nội dung" rows="5" required></textarea>
		    </div>  
		    <input type="submit" class="btn btn-primary" value="Gửi" name="submit">
		</form>
	</div>
</div>
<?php } ?>