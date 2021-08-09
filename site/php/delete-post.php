<?php
session_start();

include("../../db/connection.php");

$post_id = $_REQUEST["post_id"];

$sql = "delete from posts where post_id = $post_id";

if ($connection -> query($sql) === true) {
    $_SESSION["post_status"] = true;
    header("Location: ../../index.php#start");
}

$connection -> close();
?>