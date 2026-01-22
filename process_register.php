<?php
session_start();
require_once __DIR__ . '/partials/auth.php';

function back_with_error(string $msg): void {
$_SESSION['flash'] = ['type' => 'err', 'message' => $msg];
header('Location: index.php#registro');
exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$apellidos = trim($_POST['apellidos'] ?? '');
$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';
$pass2 = $_POST['password2'] ?? '';
$tc = isset($_POST['tc']);
$pd = isset($_POST['pd']);

if (!$tc || !$pd) {
    back_with_error('Debes aceptar términos y condiciones y la política de tratamiento de datos.');
}
if ($nombre === '' || $apellidos === '' || $email === '' || $pass === '' || $pass2 === '') {
    back_with_error('Todos los campos son obligatorios.');
}
if (preg_match('/\d/', $nombre) || preg_match('/\d/', $apellidos)) {
    back_with_error('Nombre y apellidos no deben contener números.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    back_with_error('La dirección de correo electrónico no es válida.');
}
if ($pass !== $pass2) {
    back_with_error('La contraseña y la confirmación deben ser iguales.');
}

if (find_user_by_email($email)) {
    back_with_error('Ya existe un usuario registrado con ese correo.');
}

$user = [
    'nombre' => $nombre,
    'apellidos' => $apellidos,
    'email' => strtolower($email),
    'password_hash' => password_hash($pass, PASSWORD_DEFAULT),
];
create_user($user);

$_SESSION['flash'] = ['type' => 'ok', 'message' => 'Registro exitoso. Ahora puedes iniciar sesión.'];
header('Location: index.php#registro');
exit;
