<?php
require __DIR__ . '/includes/auth.php';
exigir_login();

$_SESSION['ultimo_acesso'] = date('d/m/Y H:i:s');

$tituloPagina = 'Perfil';
require __DIR__ . '/includes/layout-top.php';
?>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Perfil do usuario</h4>
    </div>
    <div class="card-body">
        <p><strong>Usuario:</strong> <?= htmlspecialchars($_SESSION['usuario']) ?></p>
        <p><strong>Login em:</strong> <?= htmlspecialchars($_SESSION['login_em'] ?? '-') ?></p>
        <p><strong>Ultimo acesso:</strong> <?= htmlspecialchars($_SESSION['ultimo_acesso'] ?? '-') ?></p>
        <p><strong>Session ID:</strong> <small><?= session_id() ?></small></p>

        <?php if (isset($_COOKIE['usuario_lembrado'])): ?>
            <div class="alert alert-info mb-0">
                Cookie usuario_lembrado ativo para: <strong><?= htmlspecialchars($_COOKIE['usuario_lembrado']) ?></strong>
            </div>
        <?php else: ?>
            <div class="alert alert-secondary mb-0">Nenhum cookie de lembranca ativo.</div>
        <?php endif; ?>
    </div>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>
