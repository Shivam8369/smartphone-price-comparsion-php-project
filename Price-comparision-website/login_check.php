<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "database123";

    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    //now check the connection
    if (!$conn) {
        die("Connection Failed:" . mysqli_connect_error());

    }

if (isset($_POST['Login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "select* from entry_details where Email = '$username' and Password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            header("Location: search.html");
            exit();
        } 
        else {
            echo "Wrong Input Please enter valid Username and Password";
        }
    }

?>