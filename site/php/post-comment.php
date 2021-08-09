<?php
session_start();

include("../../db/connection.php");

$post_id = $_REQUEST["post_id"];
$comment_op = $_REQUEST["comment_op"];
$post_comments = $_REQUEST["post_comments"];

$post_comments = intval($post_comments);

$post_comments = $post_comments + 1;

$comment = mysqli_real_escape_string($connection, trim($_POST["comment"]));

if (empty($_POST["comment_op"])) {
    $_SESSION["empty_field"] = true;
    header("Location: ../edit-post.php?post_id=$post_id");
    exit();
}

echo "$post_comments";

$sql = "insert into comments (post_id, comment_op, comment, comment_date) values ('$post_id', '$comment_op', '$comment', now())";
$sql2 .= "update posts set post_comments = '$post_comments' where post_id = '$post_id'";

if ($connection -> query($sql) === true) {
    $_SESSION["post_status"] = true;
}

if ($connection -> query($sql2) === true) {
    $_SESSION["post_status"] = true;
    header("Location: ../post.php?post_id=$post_id");
}

$connection -> close();
?>