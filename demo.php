<?php ?>
<form action="#" method="POST">
    <div class="pttt__group">
        <input type="radio" name="tt_code" class="pttt__check" value="0">
        <span>Thanh toán khi nhận hàng</span>
    </div>
    <div class="pttt__group">
        <input type="radio" name="tt_code" value="1">
        <span>Chuyển khoản</span>
    </div>
    <input type="submit" value='gui' name='gui'>
</form>
<?php
 if(isset($_POST['gui'])){
    $httt=$_POST['tt_code'];
    echo $httt;

} 
?>