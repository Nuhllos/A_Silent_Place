<?php
session_start();

include("../../db/connection.php");

unset($_SESSION['sql2']);
unset($_SESSION['keyWord']);

header("Location: ../../index.php#start");
exit();
?>