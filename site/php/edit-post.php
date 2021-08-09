<?php
session_start();

include("../../db/connection.php");

$post_id = $_REQUEST["post_id"];

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

if (empty($_POST["op-name"]) || empty($_POST["op-about"]) || empty($_POST["title"]) || empty($_POST["title-subtitle"]) || empty($_POST["card-subtitle"]) || empty($_POST["content"])) {
    $_SESSION["empty_field"] = true;
    header("Location: ../edit-post.php#start");
    exit();
}

if ($comment_status == "1") {
    $comment_status = 1;
} else {
    $comment_status = 0;
}

$sql = "update posts set op_name = '$opName', op_about = '$opAbout', op_facebook = '$opFacebook', op_twitter = '$opTwitter', op_instagram = '$opInstagram', title = '$title', post_img='$image', title_subtitle = '$titleSubtitle', card_subtitle = '$cardSubtitle', content = '$content', comment_status = '$comment_status' where post_id = $post_id";

if ($connection -> query($sql) === true) {
    $_SESSION["edit_post"] = true;
    header("Location: ../../index.php");
}

$connection -> close();
?>