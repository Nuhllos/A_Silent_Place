<?php
session_start();

include("../../db/connection.php");

if (empty($_POST["user"]) || empty($_POST["password"])) {
    $_SESSION["empty_field"] = true;
    header("Location: ../signin.php#start");
    exit();
}

$user = mysqli_real_escape_string($connection, $_POST["user"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);

$query = "select user_id, user, user_status from users where user = '{$user}' and password = md5('$password')";

$result = mysqli_query($connection, $query);

$row0 = mysqli_fetch_assoc($result);

$u_s = $row0["user_status"];

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION["user"] = $user;
    $_SESSION["authenticated"] = true;
    if ($u_s == 0) {
        $_SESSION["admin"] = true;
    }
    header("Location: ../../index.php#start");
    exit();
} else {
    $_SESSION["unauthenticated"] = true;
    header("Location: ../signin.php#start");
    exit();
}
?>
