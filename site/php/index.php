<?php
error_reporting(0);
$page = $_GET["page"];
$sql2 = $_SESSION['sql2'];
$keyWord = $_SESSION['keyWord'];

if ($page == "" || $page == 1) {
    $page1 = 0;
} else {
    $page1 = ($page*6) - 6;
}

if ($sql2 == "") {
    $sql = "select * from posts order by post_id desc limit $page1,6";
    $query = mysqli_query($connection, $sql);
    $sqlCounter = "select * from posts order by post_id desc";
    $queryCounter = mysqli_query($connection, $sqlCounter);
    $rowsCounter = mysqli_num_rows($queryCounter);
} else {
    $sql = "select * from posts $sql2 order by post_id desc limit $page1,6";
    $query = mysqli_query($connection, $sql);
    $sqlCounter = "select * from posts $sql2 order by post_id desc";
    $queryCounter = mysqli_query($connection, $sqlCounter);
    $rowsCounter = mysqli_num_rows($queryCounter);
}

$postCounter = 0;
?>