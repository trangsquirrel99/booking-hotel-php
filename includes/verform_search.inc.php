<div class="col-xs-10 col-sm-10 col-md-3 col-lg-3 col-xl-2 " id="box" style="margin-top: 100px;">					
	<h5>Đặt phòng ngay</h5>					
	<hr>
	<form class="form" action="search_room.inc.php" method="post">
		<fieldset>					
			<div class="form-group">
				<label>Ngày đến</label>
				<input class="form-control-range" type = "date" name="Checkin" min="<?php echo date("yy-m-d"); ?>" value = "<?php echo date("yy-m-d"); ?>" >
				</div>
				<div class="form-group">
				<label>Ngày đi</label>
				<input  class="form-control-range" type = "date" name="Checkout" min= "<?php $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));echo date("yy-m-d",$tomorrow); ?>" value ="<?php $tomorrow = mktime(0,0,0,date("m"),date("d")+1,date("Y"));echo date("yy-m-d",$tomorrow); ?>">
			</div>
			<div class="row">
                <div class="col-md-6">
                    <label class="control-label" >Người lớn</label>
                    <div class="">
                        <select class="form-control input-sm" name="adult">
                            <option value="1" selected="selected">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="control-label">Trẻ con</label>
                    <div class="">
                        <select class="form-control input-sm"  name="child">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row Welcome text-center">
            	<div class="col-12">
            	<button name ="search" class="btn btn btn-success" type="submit"><h5>Tìm phòng</h5></button>
            	</div>
            </div>
		</fieldset>
	</form>
</div>