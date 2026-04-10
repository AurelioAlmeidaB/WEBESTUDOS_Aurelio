<?php
require __DIR__ . '/includes/auth.php';

if (esta_logado()) {
    header('Location: restrito.php');
    exit;
}

$erro = '';
$sucesso = '';

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
    $sucesso = 'Logout realizado com sucesso. Ate logo!';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($usuario === 'admin' && $senha === '1234') {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['login_em'] = date('d/m/Y H:i:s');
        $_SESSION['ultimo_acesso'] = date('d/m/Y H:i:s');

        if (isset($_POST['lembrar'])) {
            setcookie('usuario_lembrado', $usuario, [
                'expires' => time() + (7 * 24 * 60 * 60),
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
            ]);
        }

        header('Location: inicio.php');
        exit;
    }

    $erro = 'Usuario ou senha invalidos.';
}

$usuario_lembrado = $_COOKIE['usuario_lembrado'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aula 9b</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
    <div class="card shadow" style="width: 100%; max-width: 420px;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Login - Sessoes PHP</h4>
        </div>
        <div class="card-body p-4">

            <?php if ($sucesso): ?>
                <div class="alert alert-success"><?= htmlspecialchars($sucesso) ?></div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input
                        type="text"
                        class="form-control"
                        name="usuario"
                        id="usuario"
                        required
                        autofocus
                        value="<?= htmlspecialchars($usuario_lembrado) ?>"
                        placeholder="admin"
                    >
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        name="senha"
                        id="senha"
                        required
                        placeholder="1234"
                    >
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="lembrar" id="lembrar"
                        <?= $usuario_lembrado ? 'checked' : '' ?>>
                    <label class="form-check-label" for="lembrar">
                        Lembrar meu usuario (cookie por 7 dias)
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <hr>
            <p class="text-muted small text-center mb-0">
                Credenciais de teste: <strong>admin</strong> / <strong>1234</strong>
            </p>
        </div>
    </div>
</div>
</body>
</html>
