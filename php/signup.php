<?php
session_start();
include_once "config.php";

global $conn;
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = sha1($password);
//$image = mysqli_real_escape_string($conn, $_POST['image']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // CHECK EMAIL IF EXIST IN DATABASE  //
        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            echo "$email - already exist";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                // only jpg and png allowed //
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpg', 'jpeg'];
                if (in_array($img_ext, $extensions) === true) {
                    $time = time(); // we name users image with uploaded tie //

                    $new_image_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "../storage/".$new_image_name)) {

                        $status = "Active now";
                        $random_id = rand(time(), 10000000);


                        $sql2 = "INSERT INTO users (unique_id,	fname,lname,email,password,user_ip,img,status) 
                VALUES('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$_SERVER['REMOTE_ADDR']}','{$new_image_name}','{$status}') ";
                        $result2 = mysqli_query($conn, $sql2);

                        if ($result2) {

                            $sql3 = "SELECT * FROM users WHERE email = '{$email}'";
                            $result3 = mysqli_query($conn, $sql3);

                            if ($result3->num_rows) {
                                $row = mysqli_fetch_assoc($result3);
                              $_SESSION["unique_id"] = $row["unique_id"];
                       echo "SUCCESS";

                            }
                        } else {
echo "Something went wrong";
                        }
                    }


                } else {
                    echo "Please select an image file - jpg ,  jpeg ,png";
                }
            }
        }
    } else {
        echo "$email - This is not a valid Email";
    }
} else {
    echo "All input required";
}