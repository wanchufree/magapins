<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "megalimany2001@gmail.com";
    $mail->Password = "hrpq ofls qtik unnl";
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $products = isset($_POST["miInput"]) ? filter_var(trim($_POST["miInput"])) : '';
    $productsArray = json_decode($products, true);
    $formattedProducts = "";
    foreach ($productsArray as $product) {
            $formattedProducts .= "<p><strong>Producto:</strong> {$product['title']}</p>
            <p><strong>Variante:</strong> {$product['variant']}</p>
            <p><strong>Cantidad:</strong> {$product['quantity']}</p>
            <p><strong>Precio:</strong> {$product['price']}</p>
            <hr>";
    }
    $name = isset($_POST["full_name"]) ? strip_tags(trim($_POST["full_name"])) : '';
    $email = isset($_POST["email"]) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST["phone"]) ? strip_tags(trim($_POST["phone"])) : '';
    $receptionOption = isset($_POST["receptionOption"]) ? strip_tags(trim($_POST["receptionOption"])) : '';
    $paymentOption = isset($_POST["paymentOption"]) ? strip_tags(trim($_POST["paymentOption"])) : '';
    $receptionOption = ($receptionOption === 'pickup') ? 'Retiro' : 'Envío';
    $paymentOption = ($paymentOption === 'transfer') ? 'Transferencia' : 'Efectivo';
    $address = isset($_POST["address"]) ? strip_tags(trim($_POST["address"])) : '';
    $bodySeller = "
<p><strong>Nombre:</strong> $name</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Teléfono:</strong> $phone</p>
<p><strong>Opción de recepción:</strong> $receptionOption</p>
<p><strong>Opción de pago:</strong> $paymentOption</p>";
if ($receptionOption === 'Envío') {
    $bodySeller .= "<p><strong>Dirección:</strong> $address</p>";
}
    $bodySeller.= "<p><strong>Productos:</strong> $formattedProducts</p>";
    $mail->From = "magapins@gmail.com";
    $mail->FromName = "magapins";
    $mail->AddAddress("teobox@hotmail.com");
    $mail->IsHTML(true);
    $mail->Subject = "Nuevo pedido";
    $mail->Body = $bodySeller;
    $mail->AltBody = strip_tags($bodySeller);
    if (!$mail->Send()) {
        echo 'Error al enviar el correo al vendedor: ' . $mail->ErrorInfo;
    } else {
        echo 'Pedido realizado con éxito.';
    }
    $mail->ClearAddresses();
    $mail->AddAddress($email);
    $mail->Subject = "Confirmación de Pedido";
    $mail->Body = "
    <p>Hola $name!</p>
    <p>Gracias por tu pedido. Aquí están los detalles:</p>
    $bodySeller";
    if (!$mail->Send()) {
        echo 'Error al enviar el correo al cliente: ' . $mail->ErrorInfo;
    } else {
        echo 'Correo de confirmación enviado con éxito.';
    }
    exit;
}
?>