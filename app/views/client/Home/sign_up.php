<?php
    $showAlert = "";  
    $showError = "";  
    $exists = "";

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        // $data["model"] = new Database();

        // if (!$data["model"]->con) {
        //     die('Connection failed: ' . mysqli_connect_error());
        // }

        if(($data["model"]->con)->query("INSERT INTO Customer (Name, Email, Phone, Password) VALUES ('$name', '$email','$phone', '$password')")){
            echo "<script type='text/javascript'>alert('tao tai khoan thanh cong');
            window.location.href = 'http://localhost/Home/index';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>alert('tao tai khoan that bai');
            window.location.href = 'http://localhost/Home/sign_up';
            </script>";
        }


        // add to database
        // $sql = "SELECT * from `Customer` where Phone='$phone'"; 
        
        // $result = mysqli_query($data["model"]->con, $sql); 
    
        // $num = mysqli_num_rows($result); 

        // if($num == 0) { 
        //     if(($password == $confirm_password) && $exists==false) { 
        //         $sql = "INSERT INTO `Customer` ( `Name`, `Phone`, `Email`, `Password`) 
        //                 VALUES ('$name', '$phone', '$email', '$password')"; 
        
        //         $result = mysqli_query($data["model"]->con, $sql); 
        
        //         if ($result) { 
        //             $showAlert = true;  
        //         } 
        //     }  
        //     else {  
        //         $showError = "Passwords do not match";  
        //     }
        // }

        // if($num > 0) {
        //     $exists = "Phone number already exists";
        // }
    }

?>

<?php if ($showError): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $showError; ?>
    </div>
<?php endif; ?>

<?php if ($showAlert): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $showAlert; ?>
    </div>
<?php endif; ?>

<?php if ($exists): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $exists; ?>
    </div>
<?php endif; ?>

 

<div class="page-wrapper">
    
    <?php 
      require_once "./app/views/" . $data["header"] . ".php";
    ?>

    <main class="page-main">
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="center-tab">
        <div class="col-md-12" id="register">
            <div style="margin-bottom: 20px;"><h2>Tạo tài khoản</h2></div>
            <form action="" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Họ và Tên</label> <p style="color: red; display: inline;">*</p>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label> <p style="color: red; display: inline;">*</p>
                <input type="text" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label> <p style="color: red; display: inline;">*</p>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Xác nhận mật khẩu</label> <p style="color: red; display: inline;">*</p>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password" required>
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

    function validate()
    {
        if(!(document.getElementById("password").value == document.getElementById("confirm-password").value))
            alert("Passwords do not match!");
        return (document.getElementById("password").value == document.getElementById("confirm-password").value);
    }
</script>

<script>
    function validateForm() {
        var agreeCheckbox = document.getElementById('agree');
        if (!agreeCheckbox.checked) {
            alert('Bạn phải đồng ý với điều khoản để đăng nhập.');
            return false; 
        }
        return true; 
    }
</script>