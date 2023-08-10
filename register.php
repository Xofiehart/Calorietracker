<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PHRead - Register</title>

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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row  d-flex justify-content-around align-items-center">
                    <div class="col-lg-7 ">
                        <div class="p-5 ">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                <p class="alert">

                                </p>
                            </div>

                            <div class="user" method="post" action="./register.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 p-3">
                                        <input type="text" name="fname" class="fname form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6  p-3">
                                        <input type="text" name="lname" class="lname form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group  p-3">
                                    <input type="email" name="email" class="email form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group  p-3">
                                    <input type="mobile" name="mobile" class="mobile form-control form-control-user" id="exampleInputmobile" placeholder="mobile">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0  p-3">
                                        <input type="password" name="password" class="password form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6  p-3">
                                        <input type="password" name="repassword" class="repassword form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>

                                <div class="form-group row  p-3 col-md-12 p-3 d-flex justify-content-around align-items-center">
                                    <div class="col-md-3">
                                        <button onclick="register()" class="btn btn-danger">Register</button>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="../index.php">Go Home</a>
                            </div>
                            <div class="text-center">

                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Vendor JS Files -->
    <script type="module" src="assets/js/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script>
        const register = () => {

            // e.preventDefault()
            var fname = $(".fname").val()
            var lname = $(".lname").val()
            var email = $(".email").val()
            var mobile = $(".mobile").val()
            var password = $(".password").val()
            var repassword = $(".repassword").val()

            var data = {
                fname,
                lname,
                email,
                repassword,
                password,
                mobile,

            }
            $.post("./actions/register.php", data, function(data, status) {
                console.log('data', data)
                var jdata = JSON.parse(data)
                if (jdata['status'] == 200) {
                    $(".alert").html(jdata['message'])
                    setTimeout(() => {
                        window.location.replace("./login.php");
                    }, 2000);


                } else {
                    $(".alert").html(jdata['message'])
                }
            });

        }
    </script>
</body>

</html>