<?php

// partials/auth.php
declare(strict_types=1);

function users_file_path(): string {
return __DIR__ . '/../data/users.json';
}

require_once __DIR__ . '/db.php';

function find_user_by_email(string $email): ?array {
$email = strtolower(trim($email));
$pdo = db();
$st = $pdo->prepare("SELECT id, nombre, apellidos, email, password_hash FROM users WHERE email = :email LIMIT 1");
$st->execute([':email' => $email]);
$user = $st->fetch();
return $user ?: null;
}

function create_user(array $user): void {
$pdo = db();
$st = $pdo->prepare("
INSERT INTO users (nombre, apellidos, email, password_hash)
VALUES (:nombre, :apellidos, :email, :password_hash)
");
$st->execute([
':nombre' => $user['nombre'],
':apellidos' => $user['apellidos'],
':email' => strtolower($user['email']),
':password_hash' => $user['password_hash'],
]);
}
