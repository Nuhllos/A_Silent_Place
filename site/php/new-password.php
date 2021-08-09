<?php
session_start();

if (isset($_POST["new-password-submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../new-password.php?selector=" .$selector. "&validator=" .$validator. "&new-password=empty");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../new-password.php?selector=" .$selector. "&validator=" .$validator. "&new-password=different-password");
        exit();
    }

    $currentDate = date("U");

    include "../../db/connection.php";

    $password = mysqli_real_escape_string($connection, trim(md5($_POST["password"])));

    $sql = "select * from password_reset where selector_reset=? and expires_reset >= ?;";
    $statment = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statment, $sql)) {
        echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [1]";
        exit();
    } else {
        mysqli_stmt_bind_param($statment, "ss", $selector, $currentDate);
        mysqli_stmt_execute($statment);

        $result = mysqli_stmt_get_result($statment);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [2]";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["token_reset"]);

            if ($tokenCheck === false) {
                echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [3]";
                exit();
            } else if ($tokenCheck === true) {
                $tokenEmail = $row["email_reset"];

                $sql = "select * from users where email=?;";

                $statment = mysqli_stmt_init($connection);

                if (!mysqli_stmt_prepare($statment, $sql)) {
                    echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [4]";
                    exit();
                } else {
                    mysqli_stmt_bind_param($statment, "s", $tokenEmail);
                    mysqli_stmt_execute($statment);

                    $result = mysqli_stmt_get_result($statment);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [5]";
                        exit();
                    } else {
                        $sql = "update users set password=? where email=?;";

                        $statment = mysqli_stmt_init($connection);

                        if (!mysqli_stmt_prepare($statment, $sql)) {
                            echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [6]";
                            exit();
                        } else {
                            $newMD5Password = $password;

                            mysqli_stmt_bind_param($statment, "ss", $newMD5Password, $tokenEmail);
                            mysqli_stmt_execute($statment);

                            $sql = "delete from password_reset where email_reset = ?;";
                            $statment = mysqli_stmt_init($connection);

                            if (!mysqli_stmt_prepare($statment, $sql)) {
                                echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [7]";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($statment, "s", $tokenEmail);
                                mysqli_stmt_execute($statment);

                                $_SESSION["password_updated"] = true;
                                header("Location: ../signin.php");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../signin.php");
}
?>