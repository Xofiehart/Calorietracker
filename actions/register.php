 <?php
    require "./db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $pass = $_POST['password'];
        $repass = $_POST['repassword'];
        $role = "";

        $hash = md5($pass);
        if (empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($pass) || empty($repass)) {
            echo "Fields most not be empty";
            return false;
        } else {
            if ($pass !== $repass) {

                $response = json_encode(array("message" => "Password does not match", "status" => 404));
                echo $response;
                return false;
                
            }
            // create a SQL query as a string
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                //echo "success";
            } else {
                // echo ($fname . " " . $lname . " " . $hash . " " . $role);

                $fullname = $fname . "-" . $lname;
                $sql_query = "INSERT INTO user (`email`,`phone`,`fullname`,`role`,`password`) VALUES ('$email','$mobile','$fullname','$role','$hash')";
                // execute the SQL query
                $result = $conn->query($sql_query);
                $conn->commit();
                if ($row = $result) {

                    $response = json_encode(array("message" => "successfully registered", "status" => 200));
                    echo ($response);
                } else {
                    $response = json_encode(array("message" =>  "failed to register, User Already Exist", "status" => 404));
                    echo ($response);
                }

                
            }
        }
    }
    ?>
