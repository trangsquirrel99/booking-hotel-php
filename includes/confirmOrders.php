<?php
session_id($_GET['sessionid']);
session_start();
require('header.inc.php');
require('dbh.inc.php');
$CheckIn = $_SESSION['Checkin'];
$CheckOut = $_SESSION['Checkout'];
$adults = $_SESSION['adults'];
$children =  $_SESSION['childs'];
$FullName = $_SESSION['FullName'];
$Phone = $_SESSION['Phone'];

$cf_khoitao = $_GET['khoitao'];
$cf_token = $_GET['token'];


$currentdate = date("U");


if(empty($_SESSION['cart_rooms'])) {header("Location: ../index.php");}
else{

      $sql= "SELECT * FROM confirmorders WHERE cf_khoitao =? AND cf_expires >= ?";
      $stmt= $conn -> prepare($sql);
      if(!$stmt){
        echo " Đã xảy ra lỗi !"; exit();
      }else{
        $stmt -> bind_param('ss',$cf_khoitao,$currentdate);
        $stmt -> execute();
        $run =$stmt->get_result();
        if($row= mysqli_fetch_array($run)){
                  $token = hex2bin($cf_token);
                  $tokenCheck = password_verify($token, $row['cf_token']);

                  if($tokenCheck===false){
                         // thông báo gửi lại xác nhận
                        echo '<div class="jumbotron text-danger col-8 offset-2 bg-warning display-4" style="margin-top: 100px;">Bạn cần gửi lại yêu cầu đặt phòng!</div>'; exit();
                       
                           
                  }elseif($tokenCheck===true){
                        // $email = $row['cf_username'];
                        // $sql= "UPDATE confirmorders SET cf_trangthai ='1' WHERE cf_username= ?";
                        // $stmt= $conn -> prepare($sql);
                        // if(!$stmt){
                        //   echo " Đã xảy ra lỗi !"; exit();
                        // }else {
                        // $stmt -> bind_param('s',$row['cf_username']);
                        // $stmt->execute();}
                        
                        $sql = "SELECT MAKH FROM khachhang WHERE Email = ? AND SĐT= ? AND TenKH = ? ";
                        $stmt= $conn -> prepare($sql);
                        $stmt -> bind_param('sss', $row['cf_username'] , $Phone, $FullName);
                        $stmt->execute();
                        $rel =$stmt->get_result();
                        if($row1= mysqli_fetch_array($rel)){
                              $MAKH = $row1['MAKH'];
                        }else {
                              $sql= "INSERT INTO khachhang (TenKH,SĐT,Email) VALUES (?,?,?)";
                              $stmt= $conn -> prepare($sql);
                              $stmt -> bind_param('sss',$FullName,$Phone,$row['cf_username']);
                              $stmt->execute();
                              $MAKH = mysqli_insert_id($conn);
                        }
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $created = date('Y-m-d H:i:s');
                        $sql = "INSERT INTO phieudatphong (MAKH,CheckIn,CheckOut, NuAdults, NuChildren,Ngaylapphieu) VALUES ('$MAKH','$CheckIn','$CheckOut','$adults','$children','$created')";
                        $stmt= $conn -> prepare($sql);
                        $stmt->execute();
                        $MAPHIEU =  mysqli_insert_id($conn);
                        $sql="INSERT INTO chitietphieu (MAPHIEU,MALP,Soluong) VALUES ";
                        foreach($_SESSION['cart_rooms'] as $keys => $values)  
                        {   
                        $sql .= "(".$MAPHIEU.",".$values['item-id'].",".$values['item-quantity']."),";
                        }
                        $sql = substr_replace($sql, "", -1);  
                        $stmt= $conn -> prepare($sql);
                        $stmt->execute();
                         $sql   = "DELETE FROM confirmorders WHERE cf_username = ?";
                        $stmt = $conn -> prepare($sql);
                        if(!$stmt){
                          echo " Đã xảy ra lỗi !"; exit();
                        }else{
                          $stmt -> bind_param('s',$row['cf_username']);
                          $stmt -> execute();
                        }
                        mysqli_close($conn);
                        foreach($_SESSION['cart_rooms'] as $keys => $values)  
                             {  
                                 unset($_SESSION['cart_rooms'][$keys]);    
                             }  
                        echo'<div class="jumbotron text-success col-8 offset-2 bg-light display-4" style="margin-top: 100px;">Đặt phòng thành công!<br><small class="lead">Cảm ơn bạn đã sử dụng dịch vụ của khách sạn.</small></div>';
                        
                  }
            }else{
                // thông báo gửi lại xác nhận
                  echo '<div class= "jumbotron display-4 text-danger col-8 offset-2 bg-warning" style="margin-top: 100px;">Bạn cần gửi lại yêu cầu đặt phòng!</div>'; exit();
            }

      }
}

require('footer.inc.php');
 ?>
