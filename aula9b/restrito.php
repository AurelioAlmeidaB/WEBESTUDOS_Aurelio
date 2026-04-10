<?php
require __DIR__ . '/includes/auth.php';
exigir_login();

$_SESSION['ultimo_acesso'] = date('d/m/Y H:i:s');

$tituloPagina = 'Minha Sessao';
require __DIR__ . '/includes/layout-top.php';
?>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">&#128274; Minha Sess&atilde;o &mdash; &Aacute;rea Restrita (Aula 9b)</h4>
    </div>
    <div class="card-body">

        <div class="alert alert-success">
            <strong>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?>!</strong>
            Voc&ecirc; est&aacute; autenticado com sucesso.
        </div>

        <h5>Dados da Sess&atilde;o (<code>$_SESSION</code>)</h5>
        <table class="table table-bordered table-sm">
            <thead class="table-dark">
                <tr><th>Chave</th><th>Valor</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>$_SESSION['usuario']</code></td>
                    <td><?= htmlspecialchars($_SESSION['usuario']) ?></td>
                </tr>
                <tr>
                    <td><code>$_SESSION['login_em']</code></td>
                    <td><?= htmlspecialchars($_SESSION['login_em'] ?? '-') ?></td>
                </tr>
                <tr>
                    <td><code>$_SESSION['ultimo_acesso']</code></td>
                    <td><?= htmlspecialchars($_SESSION['ultimo_acesso']) ?></td>
                </tr>
                <tr>
                    <td><code>session_id()</code></td>
                    <td><small class="font-monospace"><?= session_id() ?></small></td>
                </tr>
            </tbody>
        </table>

        <hr>

        <h5>Cookie <code>usuario_lembrado</code></h5>
        <?php if (isset($_COOKIE['usuario_lembrado'])): ?>
            <div class="alert alert-info">
                Cookie detectado: <strong><?= htmlspecialchars($_COOKIE['usuario_lembrado']) ?></strong>
                &mdash; seu usu&aacute;rio ser&aacute; preenchido automaticamente na pr&oacute;xima visita.
            </div>
            <a href="apagar-cookie.php" class="btn btn-sm btn-warning">Apagar Cookie</a>
        <?php else: ?>
            <div class="alert alert-secondary">Nenhum cookie &ldquo;lembrar usu&aacute;rio&rdquo; encontrado.</div>
        <?php endif; ?>

        <hr>
        <a href="cookies.php" class="btn btn-info me-2">Ver Demonstra&ccedil;&atilde;o de Cookies</a>
        <a href="logout.php" class="btn btn-danger">Logout (destruir sess&atilde;o)</a>
    </div>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>
