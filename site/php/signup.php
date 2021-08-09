<?php
session_start();

include("../../db/connection.php");

$user = mysqli_real_escape_string($connection, trim($_POST["user"]));
$date = strtotime(mysqli_real_escape_string($connection, trim($_POST["date"])));
$date = date("Y-m-d", $date);
$email = mysqli_real_escape_string($connection, trim($_POST["email"]));
$password = mysqli_real_escape_string($connection, trim(md5($_POST["password"])));

if (empty($_POST["user"]) || empty($_POST["date"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    $_SESSION["empty_field"] = true;
    header("Location: ../signup.php#start");
    exit();
}

$sql = "select count(*) as total from users where user = '$user'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if ($row["total"] == 1) {
    $_SESSION["signed_user"] = true;
    header("Location: ../signup.php");
    exit();
}

$sql = "insert into users (user, year, email, password, signup_date) values ('$user', '$date', '$email', '$password', now())";

if ($connection -> query($sql) === true) {
    $_SESSION["signup_status"] = true;
    header("Location: ../signup.php");
}

$connection -> close();
exit();
?>