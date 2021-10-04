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
    <section class="form signup ">
        <header>Chat App</header>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="error-txt">this is an error</div>
            <div class="name-details">
                <div class="field input">
                    <label for="firstname">First Name</label>
                    <input id="firstname" name="fname" type="text" placeholder="First Name" required>
                </div>

                <div class="field input">
                    <label for="LastName">Last Name</label>
                    <input id="LastName" name="lname" type="text" placeholder="Last Name" required>
                </div>
            </div>
            <div class="field input">
                <label for="EmailAddress">Email Address</label>
                <input id="EmailAddress" name="email" type="text" placeholder="Email Address" required >
            </div>
            <div class="field input">
                <label for="password">password</label>
                <input id="password" name="password" type="password" placeholder="password" required>
                <i class="fa fa-eye"></i>

            </div>
            <div class="field image">
                <label for="Image">Select Image</label>
                <input id="Image" name="image" type="file">
            </div>
            input
            <div class="field button ">
                <input type="submit">
            </div>

        </form>
        <div class="link">Already Signed up ? <a href="login.php">Login Now</a></div>
    </section>
</div>


<script src="javascript/pass-hide-show.js"></script>
<script src="javascript/signup.js"></script>


</body>
</html>