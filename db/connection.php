<?php
error_reporting(0);

define("HOST", "sql10.freesqldatabase.com");
define("USER", "sql10429564");
define("PASSWORD", "l29axlIYrE");
define("DB", "sql10429564");

$connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("Não foi possivel estabelecer uma conexão");
?>