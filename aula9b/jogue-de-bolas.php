<?php
require __DIR__ . '/includes/auth.php';
exigir_login();

$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$cor = filter_input(INPUT_GET, 'cor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (empty($cor)) {
    $cor = 'white';
}

$paramsNomeEmail = '';
if (!empty($nome) || !empty($email)) {
    $paramsNomeEmail = '&nome=' . urlencode($nome ?? '') . '&email=' . urlencode($email ?? '');
}

$paramCor = '';
if (!empty($cor) && $cor !== 'white') {
    $paramCor = '&cor=' . urlencode($cor);
}

// Whitelist de cores permitidas (evita CSS injection)
$coresPermitidas = ['white', 'red', 'lime', 'blue'];
$cor = in_array($cor, $coresPermitidas) ? $cor : 'white';

$bodyBg       = $cor !== 'white' ? $cor : null;
$tituloPagina = 'Jogue de Bolas';
require __DIR__ . '/includes/layout-top.php';
?>

<div class="bg-white p-4 mb-4 rounded shadow-sm" style="background-color: <?= htmlspecialchars($cor) ?> !important;">
    <h1 class="text-center">Jogue de Bolas</h1>
    <p class="text-center mb-0">Pagina da aula 4 integrada na area restrita</p>
</div>

<?php if (!empty($nome) || !empty($email)): ?>
    <p class="mb-0">Nome informado: <?= htmlspecialchars($nome ?? '') ?></p>
    <p>Email: <?= htmlspecialchars($email ?? '') ?></p>
<?php endif; ?>

<a href="jogue-de-bolas.php?nome=Aurelio&email=AurelioAl@gmail.com<?= $paramCor ?>">[nome = Aurelio | email = AurelioAl@gmail.com]</a><br>
<a href="jogue-de-bolas.php?nome=Jose%20da%20Silva&email=jose1987@outlook.com<?= $paramCor ?>">[nome = Jose da Silva | email = jose1987@outlook.com]</a><br>
<a href="jogue-de-bolas.php">Limpar tudo</a>

<div class="row mt-4">
    <div class="col-md-4">
        <a href="jogue-de-bolas.php?cor=red<?= $paramsNomeEmail ?>" style="text-decoration:none;">
            <div class="border rounded p-4 text-white" style="background-color: red; min-height: 140px;">
                <strong>Red</strong><br>
                <span>#FF0000</span>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="jogue-de-bolas.php?cor=lime<?= $paramsNomeEmail ?>" style="text-decoration:none;">
            <div class="border rounded p-4 text-dark" style="background-color: lime; min-height: 140px;">
                <strong>Green</strong><br>
                <span>#00FF00</span>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="jogue-de-bolas.php?cor=blue<?= $paramsNomeEmail ?>" style="text-decoration:none;">
            <div class="border rounded p-4 text-white" style="background-color: blue; min-height: 140px;">
                <strong>Blue</strong><br>
                <span>#0000FF</span>
            </div>
        </a>
    </div>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>
