<?php
session_start();

include("../../db/connection.php");

$opName = mysqli_real_escape_string($connection, trim($_POST["op-name"]));
$opAbout = mysqli_real_escape_string($connection, trim($_POST["op-about"]));
$opFacebook = mysqli_real_escape_string($connection, trim($_POST["op-facebook"]));
$opTwitter = mysqli_real_escape_string($connection, trim($_POST["op-twitter"]));
$opInstagram = mysqli_real_escape_string($connection, trim($_POST["op-instagram"]));
$title = mysqli_real_escape_string($connection, trim($_POST["title"]));
$image = mysqli_real_escape_string($connection, trim($_POST["image"]));
$titleSubtitle = mysqli_real_escape_string($connection, trim($_POST["title-subtitle"]));
$cardSubtitle = mysqli_real_escape_string($connection, trim($_POST["card-subtitle"]));
$content = mysqli_real_escape_string($connection, trim($_POST["content"]));
$comment_status = mysqli_real_escape_string($connection, trim($_POST["comment_status"]));

if (empty($_POST["op-name"]) || empty($_POST["op-about"]) || empty($_POST["title"]) || empty($_POST["image"]) || empty($_POST["title-subtitle"]) || empty($_POST["card-subtitle"]) || empty($_POST["content"])) {
    $_SESSION["empty_field"] = true;
    header("Location: ../new-post.php#start");
    exit();
}

if ($comment_status == "1") {
    $comment_status = 1;
} else {
    $comment_status = 0;
}

echo $comment_status;

$sql = "insert into posts (op_name, op_about, op_facebook, op_twitter, op_instagram, title, post_img, title_subtitle, card_subtitle, content, comment_status, post_date) values ('$opName', '$opAbout', '$opFacebook', '$opTwitter', '$opInstagram', '$title', '$image', '$titleSubtitle', '$cardSubtitle', '$content', '$comment_status', now())";

if ($connection -> query($sql) === true) {
    $_SESSION["new_post"] = true;
    header("Location: ../../index.php");
}

$connection -> close();
exit();
?>