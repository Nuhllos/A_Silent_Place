<?php

require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/SMTP.php";
require "../PHPMailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$outlook_mail = new PHPMailer();

if (isset($_POST["recuperation"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "/site/new-password.php?selector=" .$selector. "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    include "../../db/connection.php";

    $email = $_POST["email"];

    $sql = "delete from password_reset where email_reset = ?;";
    $statment = mysqli_stmt_init($connection);

    if (empty($_POST["email"])) {
        $_SESSION["empty_field"] = true;
        header("Location: ../recuperation.php");
        exit();
    }
    
    if (!mysqli_stmt_prepare($statment, $sql)) {
        echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [1]";
        exit();
    } else {
        mysqli_stmt_bind_param($statment, "s", $email);
        mysqli_stmt_execute($statment);
    }

    $sql = "insert into password_reset (email_reset, selector_reset, token_reset, expires_reset) values (?, ?, ?, ?);";

    $statment = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statment, $sql)) {
        echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [2]";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($statment, "ssss", $email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($statment);
    }

    mysqli_stmt_close($statment);
    mysqli_close($connection);
    
    $to = $email;

    $subject = "Resete sua senha";

    $message = "<p>Recebemos um pedido para resetar sua senha. Se você não tiver feito esse pedido, ignore este email</p><p>O link para resetar sua senha é o seginte:     <br/>";
    $message .= "<a href='" . $url . "'>" . $url . "</a></p>";

    $outlook_mail->isSMTP();
    $outlook_mail->SMTPAuth = true;
    $outlook_mail->SMTPSecure = "tls";
    $outlook_mail->Host = "smtp-mail.outlook.com";
    $outlook_mail->Port = "587";
    $outlook_mail->isHTML();
    $outlook_mail->Username = "";
    $outlook_mail->Password = "";
    $outlook_mail->Setfrom("");
    $outlook_mail->Subject = $subject;
    $outlook_mail->Body = $message;
    $outlook_mail->addAddress($to);

    $outlook_mail->Send();

    if ($outlook_mail->Send()) {
        $outlook_mail->smtpClose();
        header("Location: ../recuperation.php?recuperation_email=success");
    } else {
        echo "<h1>Erro! " . $outlook_mail->ErrorInfo . "</h1>";
    }

} else {
    header("Location: ../login.php");
}
?>