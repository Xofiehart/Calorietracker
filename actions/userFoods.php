 <?php
    require "./db.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // collect value of input field
        session_start();
        // create a SQL query as a string
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // echo ($fname . " " . $lname . " " . $pass . " " . $role);
        $query = "select id,user_id from food_group where user_id='" . $_SESSION['id'] . "';";
        $result = $conn->query($query);
        // // iterate over $result object one $row at a time // use fetch_array() to return an associative array while($row = $result->fetch_array()){
        $row = $result->fetch_all();
        $data = [];
        foreach ($row as $item) {
            $fquery = "select name,calories,groupid,notes,created from meals where groupid='" . $item[0] . "';";
            $fresult = $conn->query($fquery);
            array_push($data, $fresult->fetch_all());
        }
        if ($row) {
            $response = json_encode(array("message" =>  "failed to login", "status" => 404, "data" => $data));
            echo $response;
        } else {
            $response = json_encode(array("message" =>  "failed to login", "status" => 404));
            echo $response;
        }
    }
    ?>