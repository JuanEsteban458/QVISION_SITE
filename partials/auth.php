<?php

function users_file_path(): string {
    return __DIR__ . '/../data/users.json';
}

function load_users(): array {
    $path = users_file_path();
    if (!file_exists($path)) {
        return [];
    }
    $raw = file_get_contents($path);
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}

function save_users(array $users): void {
    $path = users_file_path();
    $tmp = $path . '.tmp';
    file_put_contents($tmp, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    rename($tmp, $path);
}

function find_user_by_email(string $email): ?array {
    $email = strtolower(trim($email));
    foreach (load_users() as $u) {
        if (strtolower($u['email'] ?? '') === $email) {
            return $u;
        }
    }
    return null;
}

function upsert_user(array $user): void {
    $users = load_users();
    $email = strtolower(trim($user['email'] ?? ''));
    $out = [];
    $replaced = false;
    foreach ($users as $u) {
        if (strtolower($u['email'] ?? '') === $email) {
            $out[] = $user;
            $replaced = true;
        } else {
            $out[] = $u;
        }
    }
    if (!$replaced) {
        $out[] = $user;
    }
    save_users($out);
}
