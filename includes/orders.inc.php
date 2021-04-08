 <?php
      session_start();
      $sessionid = session_id();
      require_once('dbh.inc.php');
      function get_date($date) {
        $weekday = date("l",strtotime($date));
        $weekday = strtolower($weekday);
        switch($weekday) {
          case 'monday':
            $weekday = 'T2';
            break;
          case 'tuesday':
            $weekday = 'T3';
            break;
          case 'wednesday':
            $weekday = 'T4';
            break;
          case 'thursday':
            $weekday = 'T5';
            break;
          case 'friday':
            $weekday = 'T6';
            break;
          case 'saturday':
            $weekday = 'T7';
            break;
          default:
            $weekday = 'CN';
            break;
      }
          return $weekday.' Ngày '.date("d", strtotime($date)).' Tháng '.date("m",strtotime($date)).' Năm '.date("Y",strtotime($date));
      }

      function number_day(){
        if(strtotime($_SESSION['Checkout']) > strtotime($_SESSION['Checkin']))
        {$tmt = strtotime($_SESSION['Checkout']) - strtotime($_SESSION['Checkin']);
        return (int) $tmt/(60*60*24);}      
      }


    if(!isset($_SESSION['cart_rooms']) OR empty($_SESSION['cart_rooms'])){header("Location: ../index.php");}
    else {
      if(isset($_POST['orders'])) {
          if($_POST['email']!= $_POST['re-email']){header("Location:orders.inc.php?mes=nsame") ; exit();}
          elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
              header("Location:orders.inc.php?mes=wrong") ; exit();
              } else {
                  header("Location: orders.inc.php?mes=right");
           // Gửi mail xác nhận hóa đơn 
                  $cf_khoitao = bin2hex(random_bytes(8));
                  $cf_token = random_bytes(32);

                  $url = "http://192.168.1.4:8080/demo_booking_hotel/includes/confirmOrders.php?khoitao=" . $cf_khoitao. "&token=".bin2hex($cf_token)."&sessionid=".$sessionid;

                  
                  $email = $_POST['email'];
                  $_SESSION['FullName'] = $_POST['FullName'];
                  $_SESSION['Phone'] = $_POST['Phone'];
                 

                  $sql   = "DELETE FROM confirmorders WHERE cf_username = ?";
                  $stmt = $conn -> prepare($sql);
                  if(!$stmt){
                    echo " Đã xảy ra lỗi !"; exit();
                  }else{
                    $stmt -> bind_param('s',$email);
                    $stmt -> execute();
                  }

                  $subject = "Xác nhận phiếu đặt phòng khách sạn";
                  $body = "Xin chào " . $email . ",<br /><br />";
                  $body .='<!DOCTYPE html>
                          <html>
                              <head>
                                  <style type="text/css">
                                      table {
                                          width:100%;
                                      }
                                      table, th, td {
                                          border: 2px solid #ffffff;
                                          border-collapse: collapse;
                                      }
                                  </style>
                              </head>
                              <body>
                                  <div>
                                    Capital hotel gửi tới bạn thông tin đặt phòng:<br><br>
                                  </div>
                                  <div class="table">
                                      <table id="t01">
                                          <tr>
                                            <th style="width:10%"><center>TenKh</center></th>
                                            <th style="width:10%"><center>SĐT</center></th>
                                            <th style="width:10%"><center>Ngày đến - Ngày đi</center></th>
                                            <th style="width:10%"><center>Người lớn</center></th>
                                            <th style="width:10%"><center>Trẻ em</center></th>
                                            <th style="width:30%"><center>Chi tiết phòng đặt</center></th>
                                            <th style="width:20%">Tổng tiền</th>
                                          </tr>
                                          <tr>
                                              <td><center>'.$_SESSION["FullName"].'</center></td>
                                              <td><center>'.$_SESSION["Phone"].'</center></td>
                                              <td><center>'.$_SESSION["Checkin"].' đến '.$_SESSION["Checkout"].'</center></td>                                        
                                              <td><center>'.$_SESSION["adults"].'</center></td>
                                              <td><center>'.$_SESSION["childs"].'</center></td>
                                              <td><center>';
                        $sum_rooms=0;
                        if(!empty($_SESSION['cart_rooms'])){
                        foreach($_SESSION['cart_rooms'] as $keys => $values){

                        $body.= ''.$values['item-quantity'].' x '.$values['item-name'].'<br/>';
                         }}
                  
                                       $body.=       '</center></td>
                                              <td><center>'.number_format(1.1*$_SESSION["subtotal"]).' VNĐ</center></td>
                                          </tr>
                                      </table>
                                  </div> <!-- table -->
                              </body>
                          </html>';
       
                  $body .= "<p>Nhấn vào nút bên dưới để xác nhận đơn đặt phòng của bạn.<br /><br /><br /></p>";
                  $body .= "<a href='{$url}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Xác nhận</a><br /><br /><br />";

                  $headers = "From: myhotel <dinhnhan0905@gmail.com>\r\n";
                  $headers .= "Content-type: text/html\r\n";
                  $expires= date("U") + 300;
                  if( mail($email, $subject, $body, $headers) ){
                        $mes= '<div class= "text-primary"><i>Email xác nhận đã gửi tới địa chỉ <b> '. $email .'</b>, vui lòng kiểm tra và click vào link để xác nhận đặt phòng.</i></div>';
                        $sql = "INSERT INTO confirmorders ( cf_username, cf_khoitao, cf_token, cf_expires) VALUES (?,?,?,?)";
                        $stmt = $conn -> prepare($sql);
                        if(!$stmt){
                          echo " Đã xảy ra lỗi !"; exit();
                        }else{
                          $hashToken = password_hash($cf_token, PASSWORD_DEFAULT);
                          $stmt -> bind_param('ssss',$email,$cf_khoitao,$hashToken,$expires);
                          $stmt -> execute();
                          }
                        mysqli_close($conn);
                        header("Location: orders.inc.php?mess=".$mes.""); exit();
                       
                  }else{
                          die("Gửi thất bại.");
                        }     
                }
            }
    require('header.inc.php');
   ?>

<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 col-sm-12 border-radius" style="height:100%; margin-top: 60px;">
        <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="card">
                <div class="card-header" style="background-color: #ebf3ff;">
                  Chi tiết đặt phòng của bạn
                </div>
                </ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-6">
                        Ngày nhận phòng
                      </div>
                      <div class="col-6">
                        Ngày trả phòng
                      </div>
                      <div class="col-6" style="margin-top: 10px;" >
                        <b><?php echo get_date($_SESSION['Checkin']); ?></b>
                      </div>
                      <div class="col-6 border-left" style="margin-top:10px;">
                        <b><?php echo get_date($_SESSION['Checkout']); ?></b>
                      </div>
                      <div class="col-12"  style="margin-top:10px;">
                        Tổng thời gian lưu trú:<br> <b><?php echo number_day();?> đêm</b>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <p>
                      <b>Phòng đã chọn:</b><br/>
                      <?php
                        $sum_rooms=0;
                        if(!empty($_SESSION['cart_rooms'])){
                        foreach($_SESSION['cart_rooms'] as $keys => $values){

                        echo $values['item-quantity'].' x '.$values['item-name'].'<br/>';
                        $sum_rooms+= $values['item-quantity']; } }
                      ?>
                    </p>
                    <a href="search_room.inc.php" style="text-decoration: none;">Đổi lựa chọn của bạn</a>
                  </li>
                </ul>
              </div>
            <div class="card" style="margin-top: 20px;">
              <div class="card-header" style="background-color: #ebf3ff;">
                  Tóm tắt giá
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-6" style="margin-right: auto;">
                      <p><?php echo $sum_rooms ?> phòng<br>10% Thuế GTGT</p>
                    </div>
                    <div class="col-6">
                      <p style="text-align:right;"><?php echo number_format($_SESSION['subtotal']); ?> VNĐ<br><?php echo number_format(0.1 * $_SESSION['subtotal']); ?> VNĐ</p>
                    </div>
                  </div>
                </li>
                <li class="list-group-item" style="background-color: #ebf3ff;">
                  <div class="row">
                    <div class="col-6"><h4>Giá</h4></div>
                    <div class="col-6"><h4 style="text-align: right;"> <?php echo number_format(1.1*$_SESSION['subtotal']); ?> VNĐ</h4></div>
                  </div>
                </li>

              </ul>
            </div>
            <div class="card" style="margin-top: 20px;">
              <div class="card-header"style="background-color: #ebf3ff;">
                Chi phí hủy phòng?
              </div>            
              <div class="col-12" style="color: green; padding:10px;">MIỄN PHÍ hủy đến 17h00 
                <?php $Checkin = strtotime(date("Y-m-d", strtotime($_SESSION['Checkin'])) . " -1 day");
                       $Checkin = strftime("%Y-%m-%d", $Checkin); 
                       echo 'Ngày '.date("d",strtotime($Checkin)).' Tháng '.date("m",strtotime($Checkin)).' Năm '.date("Y",strtotime($Checkin))
                ?>
              </div>                                   
            </div>
          </div>


            <div class="col-md-8 col-sm-12">
              <h5>Nhập thông tin chi tiết của bạn</h5>
              <div class="card" style="background-color: #ebf3ff;">
                <div class="card-header" style="background-color: rgb(150,198,198);">
                  Vui lòng điền thông tin bằng Tiếng Anh hoặc Tiếng Việt. Phần thông tin <span style="color:red;">*</span> là bắt buộc.
                </div>
                <form  method="post" style="margin:20px;">
                  <div class="row" >
                     <div class="form-group col-6">
                      <label for="FullName"><b>Họ tên</b><span style="color:red;" >*</span></label>
                      <input type="text" name="FullName" value="" size="40" class="form-control" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label><b>Địa chỉ Email</b><span style="color:red;">*</span></label>
                        <?php if(isset($_GET['mes'])&&($_GET['mes']=='wrong')){ 
                          echo '<input type="email" name="email" value="" size="40" placeholder="name@gmail.com" class="form-control is-invalid" aria-describedby="validationFeedback" required>
                                  <div  id="validationFeedback" class="invalid-feedback">
                                    Email không khớp.Vui lòng kiểm tra lại.  
                                  </div>';
                        } else {?>
                          <input type="email" name="email" value="" placeholder="name@gmail.com" size="40" class="form-control" required> <?php ;} ?>
                      </div>
                      <div class="form-group">
                        <label for="Email"><b>Xác nhận địa chỉ Email</b><span style="color:red;">*</span></label>
                        <?php 
                        if(isset($_GET['mes'])&&($_GET['mes']=='nsame')){ 
                          echo '<input type="email" name="re-email" placeholder="name@gmail.com" value="" size="40" class="form-control is-invalid" aria-describedby="validationFeedback" required>
                                  <div  id="validationFeedback" class="invalid-feedback">
                                    Email không khớp.Vui lòng kiểm tra lại.  
                                  </div>';
                        } else {?>
                          <input type="email" name="re-email" value="" placeholder="name@gmail.com" size="40" class="form-control" required> <?php ;} ?>
                      </div>
                    </div>
                    <div class="col-6" style="margin-top:20px;">
                      <i>Email xác nhận đặt phòng sẽ được gửi đến địa chỉ này</i>
                    </div>
                  </div>
                  <div class='row'>
                    <div class="form-group col-6">
                      <label for="Phone"><b>SĐT</b><span style="color:red;">*</span></label>
                      <input type="text" name="Phone" value="" size="12" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value=""  required>
                      <label class="form-check-label">
                        Tôi đã đọc và đồng ý với các chính sách và điều khoản của khách sạn.
                      </label>
                    </div>
                  </div>
                  <?php if(isset($_GET['mess'])){
                            echo $_GET['mess'];
                            echo '<a href="../index.php" class="text-success">Quay lại trang chủ</a>';
                        }
                          else{echo '<button class="btn btn-primary" type="submit" name="orders">Đặt phòng</button>';} ?>
                  

                </form> 
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>
<?php require('footer.inc.php'); } ?>