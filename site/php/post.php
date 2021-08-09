<?php
if (isset($_REQUEST["post_id"])) {
    $post_id = $_REQUEST["post_id"];

    $sql = "select * from posts where post_id = $post_id";
    $query = mysqli_query($connection, $sql);
}
?>