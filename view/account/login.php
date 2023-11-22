
      <!-- form login -->
      <div class="form-login" style="padding-top: 30px; text-align: center">
        <form action="?act=login" method="post" class="form_login">
          <h1 style="padding-bottom: 20px; font-size: 28px">ĐĂNG NHẬP</h1>
          <div class="user" style="padding-bottom: 20px">
            <p style="padding-bottom: 10px; font-size: 20px; font-weight: 500;">
              Tên đăng nhập
            </p>
            <input
              style="height: 45px; width: 500px; padding: 0 10px"
              type="text"
              name="username"
            />
          </div>
          <div class="pass" style="padding-bottom: 20px">
            <p style="padding-bottom: 10px; font-size: 20px; font-weight: 500">
              Mật khẩu
            </p>
            <input
              style="height: 45px; width: 500px; padding: 0 10px"
              type="password"
              name="pass"
            />
          </div>
          <?php if(isset($thongbao) && $thongbao != ""): ?>
            <p style = "color: red">
            <?php echo $thongbao; ?>
          </p>
          <?php endif; ?>  
          <p>
            Bạn chưa có tài khoản?
            <a style="color: red" href="?act=register">Đăng ký ngay</a>
          </p>
          <p>
            Không thể đăng nhập?
            <a style="color: red" href="?act=quenpass">Quên mật khẩu</a>
          </p>
          <br />
          <input type="submit" value ="Đăng nhập" name="btn_login" class="btn btn-success">
          <br><br>
        </form>
      </div>
 
