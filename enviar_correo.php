<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $representante = $_POST['representante'] ?? '';
    $empresa = $_POST['empresa'] ?? '';
    $correo_empresa = $_POST['correo_empresa'] ?? '';
    $dpi = $_POST['dpi'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $actividad = $_POST['actividad'] ?? '';

    $destinatario = "direccion,sot@gmail.com"; // Cambia esto por tu correo real
    $asunto = "Nueva Solicitud Recibida";

    $mensaje = "Se han recibido los siguientes datos:\n\n";
    $mensaje .= "Representante: " . $representante . "\n";
    $mensaje .= "Empresa: " . $empresa . "\n";
    $mensaje .= "Correo: " . $correo_empresa . "\n";
    $mensaje .= "DPI: " . $dpi . "\n";
    $mensaje .= "Departamento: " . $departamento . "\n";
    $mensaje .= "Actividad Económica: " . $actividad . "\n";

    $headers = "From: " . $correo_empresa;

    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "¡Información enviada con éxito por correo!";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>s