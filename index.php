<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Đăng nhập</h3>
                        </a>
                    </div>
                        <section class="form login">
                            <form action="#" autocomplete="off">
                                <div class="error-txt"></div>
                                <div class="form-floating mb-3">
                                    <input type="text" name ="Username" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Tên đăng nhập</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" name ="Password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Mật khẩu</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Lưu thông tin tài khoản</label>
                            </div>
                            <a href="">Quên mật khẩu</a>
                        </div>
                                <div class="field button">
                                    <input type="submit" class="btn btn-primary py-3 w-100 mb-4" value="Đăng nhập">
                                </div>
                            </form>
                        </section>
                </div>
            </div>
        </div>
    </div>
  <!-- Sign In Start -->
</div>
 <!-- JavaScript Libraries -->
 <?php
    include('footer.php')
 ?>

    <script src="js/login.js"></script>
    <script src="js/showPass.js"></script>

</body>

</html>
