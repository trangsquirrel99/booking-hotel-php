<?php
	session_start();
	require_once('dbh.inc.php');
	if(isset($_SESSION['idadmin'])) {
		if(isset($_POST['updatelogin'])){
			if($_POST['password']!= $_POST['re-password']){header("Location:changepw.inc.php?mes=wrong") ; exit();}
			else{
				$admin = $_POST['admin'];
				$pw = $_POST['password'];
				$pw_hash = password_hash($pw, PASSWORD_DEFAULT);
				$sql = "UPDATE adminlogin SET admin='$admin', password='$pw_hash' ";
				$stmt= $conn -> prepare($sql);
                $stmt->execute();
                echo 'Đã cập nhật thay đổi.';
                header("Location:Allrooms.inc.php");
			}
		}
		require_once('header_Admin.inc.php'); ?>
		<div class="container">
	      <div class="row">
	          <div class="col-md-4"></div>
	          <div class="col-md-4">
	              <form class="form" action="" method="post">
	                <h2 align="center">Cập nhật tài khoản</h2>
	                <div class="form-group">
		                <label class="sr-only">Username</label>
		                <input type="text" name="admin" class="form-control" value= "<?php echo $_SESSION['admin'];?>" required autofocus>
	            	</div>
	            	<div class="form-group">
		                <label class="sr-only">Password</label>
		                <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		                <label class="sr-only">Re-Password</label>
		                <?php if(isset($_GET['mes'])){ ?>
			                <input type="password" name="re-password"  class="form-control is-invalid" placeholder="Re-Password" aria-describedby="validationFeedback" required>
			                <div  id="validationFeedback" class="invalid-feedback">
					       		Password không khớp.Vui lòng kiểm tra lại.	
					      	</div>
				      <?php } else{ echo '<input type="password" name="re-password" class="form-control" placeholder="Re-Password" required>';} ?>
		            </div>
	                <input type="submit" name="updatelogin" value="Update" class="btn btn-lg btn-primary btn-block">
	              </form>
	          </div>
	          <div class="col-md-4"></div>
	      </div>
	    </div> <!-- /container -->

<?php	} else { header("Location: ../index.php"); }
 ?>
