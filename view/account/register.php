     <!-- form register -->
     <div class="form-register" style="padding: 20px">
         <div class="mask d-flex align-items-center h-100 gradient-custom-3">
             <div class="container h-100">
                 <div class="row d-flex justify-content-center align-items-center h-100">
                     <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                         <div class="card" style="border-radius: 15px;">
                             <div class="card-body p-5">
                                 <h2 class="text-uppercase text-center mb-5">ĐĂNG KÝ TÀI KHOẢN</h2>

                                 <form action="?act=register" method="post">

                                     <div class="form-outline mb-4">
                                         <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                             name="username" />
                                         <label class="form-label" for="form3Example1cg">Tên đăng nhập</label>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <input type="email" id="form3Example3cg" class="form-control form-control-lg"
                                             name="email" />
                                         <label class="form-label" for="form3Example3cg">Email xác minh</label>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <input type="password" id="form3Example4cg"
                                             class="form-control form-control-lg" name="pass" />
                                         <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <input type="password" id="form3Example4cdg"
                                             class="form-control form-control-lg" name="repeat_pass" />
                                         <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                                     </div>
                                     <div class="form-outline mb-4">
                                         <input type="hidden" id="form3Example4cdg" class="form-control form-control-lg"
                                             name="vai_tro" value="0" />
                                     </div>
                                     <?php if(isset($err) && $err !=""): ?>
                                     <p style="color: red">
                                         <?php echo $err; ?>
                                     </p>
                                     <?php endif; ?>
                                     <div class="d-flex justify-content-center">
                                         <input type="submit" value="Đăng ký" name="btn_insert" class="btn btn-success">
                                     </div>
                                     <?php if(isset($thongbao) && $thongbao !=""): ?>
                                     <p class="text-center text-muted mt-5 mb-0">
                                         <?php echo $thongbao; ?>
                                         <a href="?act=login" class="fw-bold text-danger ">Đăng nhập ngay</a>
                                     </p>
                                     <?php endif; ?>
                                     <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản? <a
                                             href="?act=login" class="fw-bold text-danger "><u>Đăng nhập</u></a></p>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>