<?php
session_start();

// Restaura login com base no cookie "lembrar".
if (!isset($_SESSION['usuario']) && isset($_COOKIE['usuario_lembrado'])) {
    $_SESSION['usuario'] = $_COOKIE['usuario_lembrado'];
    $_SESSION['login_em'] = $_SESSION['login_em'] ?? date('d/m/Y H:i:s');
}

function esta_logado(): bool
{
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] !== '';
}

function exigir_login(): void
{
    if (!esta_logado()) {
        header('Location: login.php');
        exit;
    }
}
