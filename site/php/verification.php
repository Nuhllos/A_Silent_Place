<?php

if (!$_SESSION["user"] || !$_SESSION["admin"]) {
    header("Location: ../index.php");
    exit();
}
?>