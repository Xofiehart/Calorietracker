<?php
session_start();
session_destroy()
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Login</title>

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <script type="module" src="assets/js/jquery.min.js"></script>



</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row col-md-12 d-flex justify-content-around align-items-center">

                            <div class="col-lg-7">
                                <div class="p-5 ">
                                    <div class="text-center">
                                        <h1 id="alert" class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <p class="alert">

                                        </p>
                                    </div>

                                    <div class="user d-flex justify-content-around align-items-center">
                                        <div class="form-group row  p-3">
                                            <div class="form-group ">
                                                <input type="email" class="email form-control form-control-user" id="exampleInputEmail" placeholder=" Email">
                                            </div>
                                            <div class="form-group p-3">
                                                <div class="form-group">
                                                    <input type="password" class="password form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                                </div>
                                                <div class="form-group row  p-3 col-md-12 row p-3 d-flex  justify-content-around align-items-center">
                                                    <div class="form-group ">
                                                        <div class="custom-control custom-checkbox small">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                                            <label class="custom-control-label" for="customCheck">Remember
                                                                Me</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12 d-flex justify-content-around align-items-center">
                                                        <div class="row p-3 d-flex justify-content-around align-items-center ">
                                                            <button onclick="login()" class="btn btn-danger">Login</button>
                                                        </div>

                                                    </div>


                                                </div>
                                                <hr>
                                                <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                                <div class="text-center">
                                                    <a href="../index.php">Home</a><br>
                                                    <a class="small" href="./register.php">Create an Account!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div id="preloader"></div>

                <!-- Vendor JS Files -->
                <script type="module" src="assets/js/jquery.min.js"></script>
                <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="assets/vendor/aos/aos.js"></script>
                <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
                <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
                <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
                <script src="assets/vendor/php-email-form/validate.js"></script>

                <!-- Template Main JS File -->
                <script src="assets/js/main.js"></script>
                <script>
                    const login = () => {
                        localStorage.removeItem('user')



                        var email = $(".email").val()
                        var password = $(".password").val()
                        console.log('email,password', email, password)
                        if (email != '' && password != '') {
                            var data = {
                                email,
                                password
                            }

                            $.post("./actions/login.php", data, function(data, status) {
                                // 
                                console.log('data', data)
                                var jdata = JSON.parse(data)
                                if (jdata['status'] == 200) {
                                    localStorage.setItem("user", JSON.stringify(jdata['data']))
                                    $(".alert").html(jdata['message'])
                                    setTimeout(() => {
                                        window.location.replace("./caloriechecker.php");
                                    }, 2000);


                                } else {
                                    alert("wrong email or password")
                                }

                            });
                        } else {
                            alert("Please fill all fields")
                        }


                    }
                </script>
</body>

</html>