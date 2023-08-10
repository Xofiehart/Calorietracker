 <?php
    require "./db.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field

        $cat = $_POST['category'];




        if (empty($cat)) {
            echo "Fields most not be empty";
            return false;
        } else {
            // create a SQL query as a string
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                //echo "success";
            } else {
                // echo ($name . " " . $cal . " " . $cat . " here");
                $query = "select id,food,calories from favourite where category  ='" . $cat . "' and userid ='" . $_SESSION['id'] . "'";
                $result = $conn->query($query);
                // // iterate over $result object one $row at a time // use fetch_array() to return an associative array while($row = $result->fetch_array()){
                $row = $result->fetch_all();

                if ($row) {

                    $response = json_encode(array("message" => "successfully added", "status" => 200, "data" => $row));
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
