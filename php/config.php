<?php

const LOCALHOST = "localhost";
const ROOT = "root";
const PASS = "";
const DBNAME = "chat";


try {

    $conn = mysqli_connect(LOCALHOST, ROOT, PASS, DBNAME);

} catch (mysqli_sql_exception $e) {
    die("ERROR WHILE CONNECTION" . mysqli_connect_error());

}