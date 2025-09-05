<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP (ejemplo con Gmail)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'pruebassnow53@gmail.com'; // tu correo
    $mail->Password   = 'gfjj khwh enjc njlx';        // ⚠️ clave de aplicación, no tu contraseña normal
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Remitente y destinatario
    $mail->setFrom('pruebassnow53@gmail.com', 'PRUEBAS SNOW');
    $mail->addAddress('seb4stian53@gmail.com', 'Receptor');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Correo de prueba con PHPMailer';
    $mail->Body    = '<h2>Hola 🐔🔥</h2><p>Este es un correo de <b>prueba</b> enviado desde XAMPP con PHPMailer.</p>';
    $mail->AltBody = 'Este es el texto plano para clientes que no soportan HTML.';

    $mail->send();
    echo '✅ El mensaje se envió correctamente';
} catch (Exception $e) {
    echo "❌ Error al enviar: {$mail->ErrorInfo}";
}
