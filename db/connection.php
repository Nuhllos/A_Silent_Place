<?php
error_reporting(0);

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "silent_db");

$connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("Não foi possivel estabelecer uma conexão");
?>
