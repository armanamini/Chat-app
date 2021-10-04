<?php
session_start();
if (isset($_SESSION['unique_id'])){
    header("location: users.php");
}

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
    <section class="form login ">
        <header>Chat App</header>
        <form action="#">
            <div class="error-txt"></div>

            <div class="field input">
                <label for="EmailAddress">Email Address</label>
                <input id="EmailAddress" type="text" placeholder="Email Address" name="email">
            </div>
            <div class="field input">
                <label for="password">password</label>
                <input id="password" name="password" type="password" placeholder="password">
                <i class="fa fa-eye"></i>
            </div>

            <div class="field button ">
                <input type="submit" value="Continue to chat">
            </div>

        </form>
        <div class="link">Not yet signed up ? <a href="index.php">Signup Now</a></div>
    </section>
    </section>
</div>

<script src="javascript/pass-hide-show.js"></script>
<script src="javascript/login.js"></script>
</body>
</html>