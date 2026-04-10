<?php
session_start();

// 1. Limpa todas as variáveis de sessão
$_SESSION = [];

// 2. Apaga o cookie de sessão do navegador (se existir)
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// 3. Destroi a sessão no servidor
session_destroy();

setcookie('usuario_lembrado', '', [
    'expires' => time() - 3600,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax',
]);

header('Location: login.php?logout=1');
exit;
