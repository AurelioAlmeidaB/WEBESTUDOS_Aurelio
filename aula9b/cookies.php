<?php
// cookies.php — Demonstração de cookies (Aula 9b)
require __DIR__ . '/includes/auth.php';
exigir_login();

$msg = '';

// Setar um cookie personalizado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_cookie  = trim($_POST['nome']  ?? '');
    $valor_cookie = trim($_POST['valor'] ?? '');
    $dias         = (int) ($_POST['dias'] ?? 1);

    if ($nome_cookie !== '' && $valor_cookie !== '') {
        setcookie(
            htmlspecialchars($nome_cookie),
            htmlspecialchars($valor_cookie),
            time() + ($dias * 24 * 60 * 60),
            '/'
        );
        $msg = 'Cookie <strong>' . htmlspecialchars($nome_cookie) . "</strong> criado por {$dias} dia(s)! Recarregue a p&aacute;gina para v&ecirc;-lo abaixo.";
    }
}

$tituloPagina = 'Cookies';
require __DIR__ . '/includes/layout-top.php';
?>

<?php if ($msg): ?>
    <div class="alert alert-success"><?= $msg ?></div>
<?php endif; ?>

<!-- Formulário para criar cookie -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white"><strong>Criar um Cookie</strong></div>
    <div class="card-body">
        <form method="POST" action="cookies.php" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Nome do cookie</label>
                <input type="text" name="nome" class="form-control" required placeholder="meu_cookie">
            </div>
            <div class="col-md-4">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" class="form-control" required placeholder="meu_valor">
            </div>
            <div class="col-md-2">
                <label class="form-label">Dura&ccedil;&atilde;o (dias)</label>
                <input type="number" name="dias" class="form-control" value="1" min="1" max="365">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Criar</button>
            </div>
        </form>
    </div>
</div>

<!-- Cookies existentes -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white"><strong>Cookies Ativos (<code>$_COOKIE</code>)</strong></div>
    <div class="card-body p-0">
        <?php if (!empty($_COOKIE)): ?>
            <table class="table table-bordered table-sm mb-0">
                <thead class="table-secondary">
                    <tr><th>Nome</th><th>Valor</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($_COOKIE as $nome => $valor): ?>
                        <tr>
                            <td><code><?= htmlspecialchars($nome) ?></code></td>
                            <td><?= htmlspecialchars(is_array($valor) ? json_encode($valor) : $valor) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="p-3 text-muted mb-0">Nenhum cookie encontrado.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Referência teórica -->
<div class="card shadow-sm">
    <div class="card-header bg-info text-white"><strong>Resumo Te&oacute;rico &mdash; Aula 9b</strong></div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4"><code>session_start()</code></dt>
            <dd class="col-sm-8">Inicia ou retoma a sess&atilde;o. <strong>Deve ser a primeira coisa</strong> no arquivo, antes de qualquer HTML.</dd>

            <dt class="col-sm-4"><code>$_SESSION['chave']</code></dt>
            <dd class="col-sm-8">Armazena dados no servidor associados ao ID de sess&atilde;o do usu&aacute;rio. Dura at&eacute; fechar o navegador (ou o timeout configurado).</dd>

            <dt class="col-sm-4"><code>setcookie(nome, valor, expira, path)</code></dt>
            <dd class="col-sm-8">Envia um cookie para o navegador. <strong>Deve ser chamado antes de qualquer output HTML.</strong> Persiste no cliente pelo tempo configurado.</dd>

            <dt class="col-sm-4"><code>$_COOKIE['chave']</code></dt>
            <dd class="col-sm-8">L&ecirc; cookies enviados pelo navegador na requisi&ccedil;&atilde;o atual.</dd>

            <dt class="col-sm-4"><code>header('Location: url')</code></dt>
            <dd class="col-sm-8">Redireciona o navegador. Sempre seguido de <code>exit;</code>.</dd>

            <dt class="col-sm-4"><code>session_destroy()</code></dt>
            <dd class="col-sm-8 mb-0">Destroi todos os dados da sess&atilde;o no servidor. Usado no logout.</dd>
        </dl>
    </div>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>

    <?php if ($msg): ?>
        <div class="alert alert-success"><?= $msg ?></div>
    <?php endif; ?>

    <!-- Formulário para criar cookie -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white"><strong>Criar um Cookie</strong></div>
        <div class="card-body">
            <form method="POST" action="cookies.php" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Nome do cookie</label>
                    <input type="text" name="nome" class="form-control" required placeholder="meu_cookie">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Valor</label>
                    <input type="text" name="valor" class="form-control" required placeholder="meu_valor">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Duração (dias)</label>
                    <input type="number" name="dias" class="form-control" value="1" min="1" max="365">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Criar</button>
                </div>
            </form>
        </div>
    </div>

