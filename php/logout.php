<?php
include_once "config.php";

session_start();
 $session = $_SESSION['unique_id'];
if (isset($session)) {
    global $conn;
    $logout_id = mysqli_real_escape_string($conn, $_GET["logout_id"]);

    if (isset($logout_id)) {

        $status = "Offline now";
        $sql = "UPDATE users SET status = '{$status}' WHERE `unique_id` = {$logout_id}";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows == 0) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }


    } else {
        header("location: ../users.php");

    }

} else {
    header("location :../login.php");
}
