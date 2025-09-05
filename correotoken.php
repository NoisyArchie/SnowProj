<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Envía un correo de confirmación con un token
 *
 * @param string $direccion Destinatario del correo
 * @param string $token Token de confirmación
 * @return bool true si se envió, false si hubo error
 */
function mandarCorreo($direccion, $token) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pruebassnow53@gmail.com'; // tu correo
        $mail->Password   = 'gfjj khwh enjc njlx';            // tu clave de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente y destinatario
        $mail->setFrom('pruebassnow53@gmail.com', 'PRUEBAS SNOW');
        $mail->addAddress($direccion);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Confirma tu correo';
        $mail->Body    = "<h2>Hola 🐔🔥</h2>
                          <p>Tu código de verificación es: <b>$token</b></p>";

        $mail->AltBody = "Para confirmar tu correo, copia este enlace en tu navegador: 
                          $token";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Error al enviar correo: {$mail->ErrorInfo}");
        return false;
    }
}
?>