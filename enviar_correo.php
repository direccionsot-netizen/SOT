<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Si usas Composer, incluyes el autoloader:
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $representante = $_POST['representante'] ?? '';
    $empresa = $_POST['empresa'] ?? '';
    $correo_empresa = $_POST['correo_empresa'] ?? '';
    $dpi = $_POST['dpi'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $actividad = $_POST['actividad'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP (Ejemplo usando Gmail)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'direccion.sot@gmail.com';          // Tu correo de Gmail
        $mail->Password   = 'SOT. Direccion'; // Contraseña de aplicación de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente y Destinatario
        $mail->setFrom('direccion.sot@gmail.com', 'Formulario Web');
        $mail->addAddress('direccion.sot@gmail.com'); // A dónde quieres que llegue la info

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nueva Solicitud de Registro (Sin NIT)';
        $mail->Body    = "<h3>Nuevos datos recibidos:</h3>
                          <p><b>Representante:</b> $representante</p>
                          <p><b>Empresa:</b> $empresa</p>
                          <p><b>Correo Empresa:</b> $correo_empresa</p>
                          <p><b>DPI:</b> $dpi</p>
                          <p><b>Departamento:</b> $departamento</p>
                          <p><b>Actividad Económica:</b> $actividad</p>";

        $mail->send();
        echo "¡La información ha sido enviada a tu correo con éxito!";
    } catch (Exception $e) {
        echo "Hubo un error al enviar el correo. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>