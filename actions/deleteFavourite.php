 <?php
    require "./db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        session_start();
        // create a SQL query as a string
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $id = $_POST['id'];
        // echo ($fname . " " . $lname . " " . $pass . " " . $role);
        $query = "delete from meals where groupid='" . $id . "';";
        $conn->query($query);
        $conn->commit();
        $query2 = "delete from food_group where id='" . $id . "';";
        $conn->query($query2);
        $conn->commit();
        // if ($row) {
        $response = json_encode(array("message" =>  "failed to login", "status" => 404, "data" => $data));
        echo $response;
        // } else {
        //     $response = json_encode(array("message" =>  "failed to login", "status" => 404));
        //     echo $response;
        // }
    }
    ?>