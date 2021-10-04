<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once "config.php";
global $conn;
$outgoing_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}";
$result = mysqli_query($conn, $sql);
$output = "";
if ($result->num_rows < 1) {
$output .= "NO USERS ARE AVAILABLE TO CHAT";
}elseif ($result->num_rows > 0){
    include_once "data.php";
}
echo $output;

?>

