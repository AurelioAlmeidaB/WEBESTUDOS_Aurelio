<?php
header('Content-Type: application/json');

$arquivo = 'emails.txt';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'E-mail inválido.']);
    exit;
}

$emails = [];
if (file_exists($arquivo)) {
    $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($linhas as $linha) {
        $emails[] = strtolower(trim($linha));
    }
}

if (in_array(strtolower($email), $emails)) {
    echo json_encode(['status' => 'existente']);
    exit;
}

file_put_contents($arquivo, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
echo json_encode(['status' => 'disponivel']);
