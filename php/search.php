<?php
session_start();
include_once "config.php";
global $conn;
$outgoing_id = $_SESSION['unique_id'];

$searchTerm = mysqli_real_escape_string($conn, $_POST["searchTerm"]);
$output = "";
$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' )";

$result = mysqli_query($conn, $sql);
if ($result->num_rows) {

    include_once "data.php";


}else{
    $output .= "NO USER FOUND";
}

echo $output;

?>