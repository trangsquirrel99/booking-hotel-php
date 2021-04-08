<?php
    session_start();
    if(!isset($_SESSION['idadmin'])) {header("Location:loginAdmin.inc.php") ;}
    else {
	require_once('header_Admin.inc.php'); 
 ?>
 <div class="container-fluid body-section container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-square"></i>Thêm loại phòng</h2>
                    
                    <?php
                    require_once('dbh.inc.php');
                        if(isset($_POST['addroom'])) {
                            $flag=1;
                            $TenLoaiPhong = mysqli_real_escape_string($conn,$_POST['Name_room']);
                            $TienNghi = mysqli_real_escape_string($conn,$_POST['post-data']);
                            $size = mysqli_real_escape_string($conn,$_POST['size']);
                            $price = intval($_POST['price']);
                            $NuMaxAdult = intval($_POST['NuMaxAdult']);
                            $NuMaxChild = intval($_POST['NuMaxChild']);
                            $Sum_rooms= intval($_POST['Sum_rooms']);
                            
                            $allowed = array("jpg","jpeg","png");
                            $FilenameNew= array('','','');
                              if(isset($_FILES['image1'])&& $_FILES['image1']['name']!= '0'){
                                $fileExt= explode(".",$_FILES['image1']['name']);
                                $fileActExt= strtolower(end($fileExt));
                                if(in_array($fileActExt,$allowed)){
                                    if($_FILES['image1']['error']===0){
                                        if($_FILES['image1']['size'] < 1000000){
                                            $FilenameNew[0] = uniqid('',true).'.'.$fileActExt;
                                            $FileDes = '../images/home_gallary/'.$FilenameNew[0];
                                            move_uploaded_file($_FILES['image1']['tmp_name'], $FileDes);
                                        }else {echo "Kích thước file quá lớn!" ; $flag=0;}
                                    }else{echo "Có lỗi khi upload file này!" ;  $flag=0;}
                                }else{
                                    echo "Bạn không thể upload file loại này!";  $flag=0;
                                }
                              } 
                               if(isset($_FILES['image2'])&&$_FILES['image2']['name']!=""){
                                $fileExt= explode(".",$_FILES['image2']['name']);
                                $fileActExt= strtolower(end($fileExt));
                                if(in_array($fileActExt,$allowed)){
                                    if($_FILES['image2']['error']===0){
                                        if($_FILES['image2']['size'] < 1000000){
                                            $FilenameNew[1] = uniqid('',true).'.'.$fileActExt;
                                            $FileDes = '../images/home_gallary/'.$FilenameNew[1];
                                            move_uploaded_file($_FILES['image2']['tmp_name'], $FileDes);
                                        }else {echo "Kích thước file quá lớn!" ;  $flag=0;}
                                    }else{echo "Có lỗi khi upload file này!" ;  $flag=0;}
                                }else{
                                    echo "Bạn không thể upload file loại này!";  $flag=0;
                                }
                              } 
                               if(isset($_FILES['image3'])&&$_FILES['image3']['name']!=""){
                                $fileExt= explode(".",$_FILES['image3']['name']);
                                $fileActExt= strtolower(end($fileExt));
                                if(in_array($fileActExt,$allowed)){
                                    if($_FILES['image3']['error']===0){
                                        if($_FILES['image3']['size'] < 1000000){
                                            $FilenameNew[2] = uniqid('',true).'.'.$fileActExt;
                                            $FileDes = '../images/home_gallary/'.$FilenameNew[2];
                                            move_uploaded_file($_FILES['image3']['tmp_name'], $FileDes);
                                        }else {echo "Kích thước file quá lớn!" ;  $flag=0;}
                                    }else{echo "Có lỗi khi upload file này!" ;  $flag=0;}
                                }else{
                                    echo "Bạn không thể upload file loại này!"; $flag=0;
                                }
                              } 
                            if($flag) {                                                             
                            $insert_query = "INSERT INTO loaiphong(TenLoaiPhong,Dientich,TienNghi,NuMaxAdult,NuMaxChild,GiaPhong,Sum_rooms,
                            image1,image2,image3) VALUES ('$TenLoaiPhong','$size','$TienNghi','$NuMaxAdult','$NuMaxChild','$price','$Sum_rooms','$FilenameNew[0]','$FilenameNew[1]','$FilenameNew[2]') ";
                            $stmt= $conn -> prepare($insert_query);
                            $stmt->execute();
                            mysqli_close($conn);
                            header("Location: Allrooms.inc.php");}

                        }
                        
                    ?>
                    <div class="container-fluid body-section container">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Tên loại phòng</label>
                                    <input type="text" name="Name_room"  class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label >Tiện nghi</label>
                                    <textarea name="post-data"  rows="10" class="form-control" required></textarea>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Diện tích:</label>
                                            <input type="text" name="size" class="form-control" value="<sup>2</sup>"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Giá phòng</label>
                                            <input type="text" name="price" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Số lượng người lớn tối đa:</label>
                                            <input type="text" name="NuMaxAdult"  class="form-control" required>
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Số lượng trẻ em tối đa:</label>
                                            <input type="text" name="NuMaxChild"  class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >Tổng số lượng phòng:</label>
                                            <input type="text" name="Sum_rooms"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image1:*</label>
                                            <input type="file" name="image1"  required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image2:</label>
                                            <input type="file" name="image2" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Image3:</label>
                                            <input type="file" name="image3">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <input type="submit" class="btn btn-primary" value="Thêm loại phòng" name="addroom">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
</div>
<?php } ?>