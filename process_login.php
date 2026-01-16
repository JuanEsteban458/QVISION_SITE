<?php
session_start();
require_once __DIR__ . '/partials/auth.php';

function back_with_error(string $msg): void {
    $_SESSION['flash'] = ['type' => 'err', 'message' => $msg];
    header('Location: index.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$pass = $_POST['password'] ?? '';

if ($email === '' || $pass === '') {
    back_with_error('Ingresa tu correo y contraseña.');
}

$user = find_user_by_email($email);
if (!$user) {
    back_with_error('Usuario o contraseña inválidos.');
}

if (!password_verify($pass, $user['password_hash'] ?? '')) {
    back_with_error('Usuario o contraseña inválidos.');
}


$_SESSION['user'] = [
    'nombre' => $user['nombre'] ?? 'Usuario',
    'apellidos' => $user['apellidos'] ?? '',
    'email' => $user['email'] ?? '',
];

$_SESSION['flash'] = ['type' => 'ok', 'message' => '¡Bienvenido(a)! Sesión iniciada.'];
header('Location: index.php');
exit;
