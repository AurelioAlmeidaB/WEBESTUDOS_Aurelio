<?php
session_start();

setcookie('usuario_lembrado', '', [
	'expires' => time() - 3600,
	'path' => '/',
	'httponly' => true,
	'samesite' => 'Lax',
]);

$_SESSION = [];
session_destroy();

header('Location: login.php?logout=1');
exit;
