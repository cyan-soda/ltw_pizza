<?php

  $showError = "false";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
      include '../../../core/Database.php';
      $phone = $_POST['phone'];
      $pass = $_POST['password'];

      $sql = "SELECT * from 'Customer' where Phone='$phone'";
      $result = mysqli_query($con, $sql);
      $numRows = mysqli_num_rows($result);
      if($numRows == 1)
      {
          $row = mysqli_fetch_assoc($result);
          $hash = password_hash($pass, PASSWORD_DEFAULT); 
          if(password_verify($pass, $row['password'])){
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['sno'] = $row['sno'];
              $_SESSION['phone'] = $phone;
              // echo "logged in";
          } 
          header("Location: /Home/index.php");  
      }
      header("Location: /Home/index.php");  
  }

?>

<div class="page-wrapper">
    
    <?php 
      require_once "./app/views/" . $data["header"] . ".php";
    ?>

    <main class="page-main">
      <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
          <div class="center-tab">
            <div class="col-md-12" id="register">
              <div style="margin-bottom: 20px;"><h2>Đăng nhập</h2></div>
              <form action="" method="POST">
                <div class="form-group">
                    <label for="phone">Số điện thoại</label> <p style="color: red; display: inline;">*</p>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label> <p style="color: red; display: inline;">*</p>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <br>
                <div><a href="#">Quên mật khẩu</a></div>
                <div><p style="display: inline;">Bạn đã có tài khoản chưa?</p> <a style="display: inline;" href="#">Tạo tài khoản</a></div>
                <br>
                <div style="display: flex; align-items: center; padding: 5px;">
                    <input type="checkbox" name="agree" id="agree" style="margin: 5px;">
                    <label for="agree" style="display: inline; cursor: pointer;">Khách hàng đồng ý cung cấp Thông Tin Cá Nhân và cho phép The Pizza Company sử dụng Thông Tin Cá Nhân phù hợp với Chính sách bảo mật này.</label>
                    <a href="https://thepizzacompany.vn/chinh-sach-bao-mat" style="display: inline; color: rgb(86, 194, 62);">(đọc)</a>
                </div>
                <div class="d-grid gap-2">
                  <input type="submit" value="Đăng Nhập" class="btn btn-primary register-button">
                </div>
              </form>
            </div>
          </div>
      </div>
    </main>

    <?php 
      require_once "./app/views/" . $data["footer"] . ".php";
    ?>

</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var header = document.querySelector('.page-header');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
            header.classList.add('sticky-header');
        } else {
            header.classList.remove('sticky-header');
        }
    });
});
</script>