<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("location: login.php");
}
$session = $_SESSION["unique_id"];
include_once "php/config.php";
global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <link rel="stylesheet" href="css/style.css">


</head>
<body>

<div class="wrapper">
    <section class="chat-area">
        <header>

            <?php
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = "SELECT * FROM users WHERE unique_id = {$user_id}";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

            }


            ?>


            <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="storage/<?php echo $row["img"] ?>" alt="">
            <div class="details">
                <span><?php echo $row["fname"] . " " . $row["lname"] ?></span>
                <p><?php echo $row["status"] ?></p>
            </div>
        </header>
        <div class="chat-box">
        </div>
        <form action="" class="typing-area">
            <input type="text" hidden name="outgoing_id" value="<?php echo $session  ?>">
            <input type="text" hidden name="incoming_id" value="<?php echo $user_id  ?>">
            <input type="text" name="message" class="input-field" placeholder="Type a message here ..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>

<script src="javascript/chat.js"></script>
</body>
</html>