<?php
    $showAlert = false;  
    $showError = false;  
    $exists = false;

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        // add to database
        $sql = "SELECT * from `users` where phone='$phone'"; 
        
        $result = mysqli_query($con, $sql); 
    
        $num = mysqli_num_rows($result); 

        if($num == 0) { 
            if(($password == $confirm_password) && $exists==false) { 
                $hash = password_hash($password, PASSWORD_DEFAULT); 
                $sql = "INSERT INTO `users` ( `name`, `phone`, `email`, `password`) 
                        VALUES ('$name', '$phone', '$email', '$hash')"; 
        
                $result = mysqli_query($con, $sql); 
        
                if ($result) { 
                    $showAlert = true;  
                } 
            }  
            else {  
                $showError = "Passwords do not match";  
            }
        }

        if($num > 0) {
            $exists = "Phone number already exists";
        }
    }

    if($showAlert)
    {
        echo ' <div class="alert alert-success  
            alert-dismissible fade show" role="alert"> 
            <strong>Success!</strong> Your account is  
            now created and you can login.  
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">×</span>  
            </button>  
        </div> ';
    }

    if($showError) 
    { 
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert">  
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close"> 
            <span aria-hidden="true">×</span>  
       </button>  
     </div> ';  
   } 

   if($exists) 
   { 
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert"> 

        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close">  
            <span aria-hidden="true">×</span>  
        </button> 
        </div> ';  
    } 
?>


<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="center-tab">
      <div class="col-md-12" id="register">
        <div style="margin-bottom: 20px;"><h2>Tạo tài khoản</h2></div>
        <form action="" method="POST">
          <div class="form-group">
              <label for="name">Họ và Tên</label> <p style="color: red; display: inline;">*</p>
              <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group">
              <label for="phone">Số điện thoại</label> <p style="color: red; display: inline;">*</p>
              <input type="text" class="form-control" name="phone" id="phone">
          </div>
          <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" name="email" id="email">
          </div>
          <div class="form-group">
              <label for="password">Mật khẩu</label> <p style="color: red; display: inline;">*</p>
              <input type="password" class="form-control" name="password" id="password">
          </div>
          <div class="form-group">
              <label for="confirm-password">Xác nhận mật khẩu</label> <p style="color: red; display: inline;">*</p>
              <input type="password" class="form-control" name="confirm-password" id="confirm-password">
          </div>
          <div style="display: flex; align-items: center; padding: 5px;">
              <input type="checkbox" name="agree" id="agree" style="margin: 5px;">
              <label for="agree" style="display: inline; cursor: pointer;">Khách hàng đồng ý cung cấp Thông Tin Cá Nhân và cho phép The Pizza Company sử dụng Thông Tin Cá Nhân phù hợp với Chính sách bảo mật này.</label>
              <a href="https://thepizzacompany.vn/chinh-sach-bao-mat" style="display: inline; color: rgb(86, 194, 62);">(đọc)</a>
          </div>
          <div class="d-grid gap-2">
            <input type="submit" value="Đăng Ký" class="btn btn-primary register-button">
          </div>
        </form>
      </div>
    </div>
</div>  