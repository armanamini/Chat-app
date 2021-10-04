<?php

if(!isset($_SESSION))
{
    session_start();
}
if (!isset($_SESSION['unique_id'])){
    include_once "config.php";
    global $conn;
    $my_id = $_SESSION['unique_id'];
    $status = "Offline now";
    $sql = "UPDATE users SET status = '{$status}' WHERE `unique_id` = {$my_id}";
    $result = mysqli_query($conn, $sql);
}
if (!isset($_SESSION["unique_id"])) {
    header("location: login.php");
}
$session = $_SESSION["unique_id"];
?>
<?php include_once "header.php"; ?>
<?php include_once "php/config.php";
global $conn;
?>

<body>

<div class="wrapper">
    <section class="users">
        <header>
            <?php
            $sql = "SELECT * FROM users WHERE unique_id = {$session}";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows) {
                $row = $result->fetch_array(MYSQLI_ASSOC);

            }


            ?>
            <div class="content">
                <img src="storage/<?php echo $row["img"] ?>" alt="">
                <div class="details">
                    <span><?php echo $row["fname"] . " " . $row["lname"] ?></span>
                    <p><?php echo $row["status"] ?></p>
                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row["unique_id"] ?>" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">select an user to start chat</span>
            <input type="text" placeholder="Enter name to search">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="user-list">
            <?php include_once "php/users.php"; ?>
        </div>

    </section>
</div>

<script src="javascript/users.js"></script>
</body>
</html>