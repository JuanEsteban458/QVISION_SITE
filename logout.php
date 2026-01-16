<?php
session_start();
unset($_SESSION['user']);
$_SESSION['flash'] = ['type' => 'ok', 'message' => 'Sesión cerrada.'];
header('Location: index.php');
exit;
