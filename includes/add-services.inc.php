<?php
    session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
	require_once('header_Admin.inc.php'); 
 ?>
 <div class="container-fluid body-section container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-square"></i>Thêm dịch vụ</h2>
                    
                    <?php
                    require_once('dbh.inc.php');
                        if(isset($_POST['submit'])) {
                            $TenDv = mysqli_real_escape_string($conn,$_POST['Name_ser']);
                            $Des = mysqli_real_escape_string($conn,$_POST['des']);
                            $flag=1;
                            $allowed = array("jpg","jpeg","png");
                           
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
                            $insert_query = "INSERT INTO  dichvu (TenDv,des,image1,image2,image3) VALUES ('$TenDv','$Des','$FilenameNew[0]','$FilenameNew[1]','$FilenameNew[2]') ";
                            $stmt= $conn -> prepare($insert_query);
                            $stmt->execute();
                            mysqli_close($conn);
                            header("Location:admin-services.inc.php");} } ?>

                     
                    <div class="container-fluid body-section container">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Tên dịch vụ</label>
                                    <input type="text" name="Name_ser"  class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label >Chi tiết</label>
                                    <textarea name="des"  rows="15" class="form-control" required></textarea>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image1:*</label>
                                            <input type="file" name="image1" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image2:*</label>
                                            <input type="file" name="image2" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image3:*</label>
                                            <input type="file" name="image3" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <input type="submit" class="btn btn-primary" value="Thêm dịch vụ" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<?php } ?>