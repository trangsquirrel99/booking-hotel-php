<?php
    session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
	require_once('header_Admin.inc.php'); 
 ?>
 <div class="container-fluid body-section container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-square"></i> Cập nhật</h2>
                    <?php
                    require_once('dbh.inc.php');
                    if(isset($_GET['id'])){
                        $t_id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            $TenDv = mysqli_real_escape_string($conn,$_POST['Name_ser']);
                            $Des = mysqli_real_escape_string($conn,$_POST['des']);
                            $flag=1;
                            $allowed = array("jpg","jpeg","png");
                            $FilenameNew = $_POST['hidden_filename'];
                           
                              if(isset($_FILES['image1'])&&$_FILES['image2']['name']!=""){
                                $fileExt= explode(".",$_FILES['image1']['name']);
                                $fileActExt= strtolower(end($fileExt));
                                if(in_array($fileActExt,$allowed)){
                                    if($_FILES['image1']['error']===0){
                                        if($_FILES['image1']['size'] < 1000000){
                                            $FilenameNew[0] = uniqid('',true).'.'.$fileActExt;
                                            $FileDes = '../images/home_gallary/'.$FilenameNew[0];
                                            move_uploaded_file($_FILES['image1']['tmp_name'], $FileDes);
                                        }else {echo "Kích thước file quá lớn!" ; $flag=0;}
                                    }else{echo "Có lỗi khi upload file này!" ; $flag=0;}
                                }else{
                                    echo "Bạn không thể upload file loại này!"; $flag=0;
                                }
                              } 
                               if(isset($_FILES['image2'])&&$_FILES['image2']['name']!=""){
                                $fileExt= explode(".",$_FILES['image2']['name']);
                                $fileActExt= strtolower(end($fileExt));
                                if(in_array($fileActExt,$allowed)){
                                    if($_FILES['image2']['error']===0){
                                        if($_FILES['image2']['size'] < 1000000){
                                            $FilenameNew[1] = uniqid('',true).'.'.$fileActExt;
                                            $FileDes = 'images/home_gallary/'.$FilenameNew[1];
                                            move_uploaded_file($_FILES['image2']['tmp_name'], $FileDes);
                                        }else {echo "Kích thước file quá lớn!" ; $flag=0;}
                                    }else{echo "Có lỗi khi upload file này!" ; $flag=0;}
                                }else{
                                    echo "Bạn không thể upload file loại này!";$flag=0;
                                }
                              } 
                               if(isset($_FILES['image3'])&&$_FILES['image3']['name']!=""){
                                $fileExt= explode(".",$_FILES['image3']['name']);
                                $fileActExt= strtolower(end($fileExt));
                                if(in_array($fileActExt,$allowed)){
                                    if($_FILES['image3']['error']===0){
                                        if($_FILES['image3']['size'] < 1000000){
                                            $FilenameNew[2] = uniqid('',true).'.'.$fileActExt;
                                            $FileDes = 'images/home_gallary/'.$FilenameNew[2];
                                            move_uploaded_file($_FILES['image3']['tmp_name'], $FileDes);
                                        }else {echo "Kích thước file quá lớn!" ; $flag=0;}
                                    }else{echo "Có lỗi khi upload file này!" ; $flag=0;}
                                }else{
                                    echo "Bạn không thể upload file loại này!";$flag=0;
                                }
                              } 
                            if($flag){                                                               
                            $update_query = "UPDATE dichvu SET TenDv ='$TenDv',des = '$Des', image1='$FilenameNew[0]',image2='$FilenameNew[1]',image3='$FilenameNew[2]' WHERE MADV = '$t_id' ";
                            $stmt= $conn -> prepare($update_query);
                            $stmt->execute();
                            header("Location:admin-services.inc.php?uploadsuccess");}
                        }

                     
                        $sql = "SELECT * FROM dichvu WHERE MADV = $t_id";
                        $stmt= $conn -> prepare($sql);
                        $stmt->execute();
                        $query1 =$stmt->get_result();
                        $row = mysqli_fetch_array($query1);
                              
                    }
                        
                    ?>
                    <div class="container-fluid body-section container">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Tên dịch vụ</label>
                                    <input type="text" name="Name_ser"  value="<?php echo $row['TenDv']; ?>" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label >Chi tiết</label>
                                    <textarea name="des"  rows="10" class="form-control" required><?php echo $row['des']; ?></textarea>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image1:</label>
                                            <input type="file" name="image1" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image2:</label>
                                            <input type="file" name="image2">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image3:</label>
                                            <input type="file" name="image3">
                                        </div>
                                    </div>
                                    
                                </div>
                                <input type="hidden" name="hidden_filename[]" value="<?php echo $row['image1']; ?>">
                                <input type="hidden" name="hidden_filename[]" value="<?php echo $row['image2']; ?>">
                                <input type="hidden" name="hidden_filename[]" value="<?php echo $row['image3']; ?>">
                                <input type="submit" class="btn btn-primary" value="Edit Room" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<?php mysqli_close($conn);} ?>