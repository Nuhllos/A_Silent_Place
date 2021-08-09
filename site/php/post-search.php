<?php
session_start();

include("../../db/connection.php");

$keyWord = mysqli_real_escape_string($connection, trim($_POST["key-word"]));

$_SESSION['keyWord'] = $keyWord;

if (empty($_POST["key-word"])) {
    header("Location: ../../index.php");
    $sql2 = "";
    unset($_SESSION['sql2']);
    unset($_SESSION['keyWord']);
    exit();
} else {
    $sql2 = "where title like '%$keyWord%'";
    $_SESSION['sql2'] = $sql2;
    $_SESSION['keyWord'] = $keyWord;
}

header("Location: ../../index.php#start");
?>