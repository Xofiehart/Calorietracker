 <?php
    require "./db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        $cat = $_POST['category'];
        $cal = $_POST['calories'];
        $user = $_POST['userid'];



        if (empty($name) || empty($cat) || empty($cal)) {
            echo "Fields most not be empty";
            // return false;
        } else {
            // create a SQL query as a string
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                //echo "success";
            } else {
                // echo ($name . " " . $cal . " " . $cat . " here");
                $group_sql_query = "INSERT INTO favourite (`food`,`calories`,`category`,`userid`) VALUES ('" . $name . "','" . $cal . "','" . $cat . "','" . $user . "')";
                $gresult = $conn->query($group_sql_query);
                $conn->commit();

                if ($gresult) {

                    $response = json_encode(array("message" => "successfully added", "status" => 200));
                    echo ($response);
                } else {
                    $response = json_encode(array("message" =>  "failed to add", "status" => 302));
                    echo ($response);
                }
                // execute the SQL query


            }
        }
    }
    ?>
