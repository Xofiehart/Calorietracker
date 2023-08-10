 <?php
    require "./db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $data = $_POST['data'];
        $user = $_POST['user'];
        $notes = $_POST['notes'];



        if (empty($data)) {
            echo "Fields most not be empty";
            return false;
        } else {
            // create a SQL query as a string
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                //echo "success";
            } else {
                // echo ($fname . " " . $lname . " " . $hash . " " . $role);
                $group_sql_query = "INSERT INTO food_group (`user_id`,`timeofday`) VALUES ('" . $user . "','')";
                $gresult = $conn->query($group_sql_query);
                $iid = $conn->insert_id;
                $conn->commit();



                foreach ($data as $item) {

                    $sql_query = "INSERT INTO meals (`name`,`calories`,`day`,`quantity`,`groupid`,`userid`,`notes`) VALUES ('" . $item['food'] . "','" . $item['calories'] . "','','" . $item['quantity'] . "','" . $iid . "','" . $user . "','" . $notes . "')";
                    $result = $conn->query($sql_query);
                    $conn->commit();
                }
                if ($row = $result) {

                    $response = json_encode(array("message" => "successfully registered", "status" => 200));
                    echo ($response);
                } else {
                    $response = json_encode(array("message" =>  "failed to register", "status" => 404));
                    echo ($response);
                }
                // execute the SQL query


            }
        }
    }
    ?>
