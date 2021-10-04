<?php
session_start();
include_once "config.php";
global $conn;
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = sha1($password);

if (!empty($email) && !empty($password)) {

    $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows) {
        $row = mysqli_fetch_assoc($result);
        $status = "Active now";
        $sql2 = "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}";
        $result2 = mysqli_query($conn,$sql2);
        if($sql2){
            $_SESSION["unique_id"] = $row["unique_id"];
            echo "SUCCESS";
        }


    } else {
        echo "Email or Password in incorrect";
    }
} else {
    echo "All input must be field";
}
?>