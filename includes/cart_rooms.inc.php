
<?php
    session_start();

    // delete item_rooms
    if(isset($_GET['action'])AND (isset($_GET['id']))){  
      if($_GET['action'] == "delete"){  
           foreach($_SESSION['cart_rooms'] as $keys => $values)  
           {  
                if($values['item-id'] == $_GET['id'])  
                {  
                     unset($_SESSION['cart_rooms'][$keys]);  
                     header('location:cart_rooms.inc.php');
                     exit();  
                }  
           }  
      }  
    }
    function number_day(){
        if(strtotime($_SESSION['Checkout']) > strtotime($_SESSION['Checkin']))
        {$tmt = strtotime($_SESSION['Checkout']) - strtotime($_SESSION['Checkin']);
        return (int) $tmt/(60*60*24);}
    }
    //update cart
    if (isset($_POST['update']) && isset($_SESSION['cart_rooms'])) {
    // Vòng lặp lấy dữ liệu để cập nhật cho các sản phẩm trong giỏ hàng
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') != false && is_numeric($v)) {
            $id = (int)str_replace('listquantity-', '', $k);
            $quantity = (int)$v;
            // kiểm tra kiểu dữ liệu
            if (is_numeric($id) && isset($_SESSION['cart_rooms'][$id]) && $quantity > 0) {
                // Cập nhật số lượng mới
                $_SESSION['cart_rooms'][$id]['item-quantity'] = $quantity;
               
            }
        }
    }
    // Prevent form resubmission...
    header('location: cart_rooms.inc.php');
    exit();
    }
    // order
    if (isset($_POST['order']) && isset($_SESSION['cart_rooms']) && !empty($_SESSION['cart_rooms'])) {
        $_SESSION['subtotal'] = $_POST['subtotal'];
        header('location: orders.inc.php');
    exit();
    }
   require('header.inc.php');
   require('form_search.inc.php');    
 ?>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-10 col-sm-10 border-radius" style="border-radius:5px;height:100%;">
        <!-- <div class="col-md-5 col-sm-5 ml-auto">
        <a class="btn btn-secondary btn-block text-right "  data-toggle="collapse" href="#cart" role="button" aria-expanded="false" aria-controls="cart">
        Đơn đặt phòng
        </a>
        </div> -->
        <h4 class="text-center text-info">Đơn đặt phòng</h4>      
        <form method="post" > <!-- class="collapse" id="cart" -->
            <table class="table table-bordered table-striped text-center" >
                    <tr>
                    <th style="width:30%">Loại phòng</th>
                    <th style="width:10%">Số lượng đặt</th>
                    <th style="width:10%">Số đêm</th>
                    <th style="width:15%">Đơn giá</th>
                    <th style="width:25%">Thành tiền</th>
                    <th style="width:10%"></th>
                    </tr>                                                            
            <?php
                if(!empty($_SESSION['cart_rooms'])){
                    $subtotal =0;
                    foreach($_SESSION['cart_rooms'] as $keys => $values){ ?>
                        <tr>
                            <td><?php echo $values['item-name']?></td>
                            <td><input class="form-control" type="number" value="<?php echo $values['item-quantity']; ?>" name="listquantity-<?php echo $keys; ?>" min="1" max="<?php echo $values['item-maxroom']; ?>"></td>
                            <td><?php $numberday =number_day(); echo $numberday; ?></td>
                            <td><?php echo number_format($values['item-price'])." VNĐ"; ?></td>
                            <td><?php  $total=$values['item-price']*$values['item-quantity']*$numberday; echo number_format($total);?> VNĐ</td>
                            <td><a href="cart_rooms.inc.php?action=delete&id=<?php echo $values['item-id'] ?>"><span class="text-danger" align="right"><i class="fas fa-trash"></i>  Xóa</span></a></td>
                        </tr>
                <?php
                        $subtotal += $total;
                    }
                ?>
                    <tr>
                        <td colspan="4" align="right">Tổng tiền</td>
                        <td colspan="2" ><?php echo number_format($subtotal);?> VNĐ</td>
                    </tr>
            <?php   
                } 
            ?>      <tr>                       
                        <td ><i class="fas fa-cart-plus"></i><a href="search_room.inc.php">Quay lại trang chọn phòng</a></td>
                        <td colspan="5" align="right">
                            <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>" />
                            <input class="btn btn btn-outline-warning" type="submit" value="Cập nhật thay đổi" name="update">
                            <input class="btn btn btn-outline-danger" type="submit" value="Chốt đơn" name="order">
                        </td>
                    </tr>
            </table>
        </form>
    </div>
</div>
</div>