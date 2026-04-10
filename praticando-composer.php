<?php
require __DIR__ . '/vendor/autoload.php';

use Claudsonm\CepPromise\CepPromise;
use Claudsonm\CepPromise\Exceptions\CepPromiseException;

$address       = null;
$erro_msg      = null;
$cep_formatado = '';
$cep_digitado  = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cep_digitado = preg_replace('/\D/', '', $_POST['cep'] ?? '');

    if (strlen($cep_digitado) !== 8) {
        $erro_msg = [['message' => 'CEP inválido. Digite exatamente 8 números.']];
    } else {
        // Regra 1: Formatar o CEP exibido (ex: 15.503-110)
        $cep_formatado = substr($cep_digitado, 0, 2) . '.'
                       . substr($cep_digitado, 2, 3) . '-'
                       . substr($cep_digitado, 5, 3);
        try {
            // Busca o endereço pelo CEP
            $address = CepPromise::fetch($cep_digitado);
        } catch (CepPromiseException $e) {
            // Regra 2: Tratamento amigável para CEP inválido/inexistente
            $dados    = $e->toArray();
            $erro_msg = $dados['errors'] ?? [['message' => 'Erro ao consultar o CEP.']];
        } catch (\Throwable $e) {
            $erro_msg = [['message' => 'Erro inesperado: ' . $e->getMessage()]];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praticando Composer - Busca CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1 class="mb-1">Busca CEP com Composer</h1>
    <hr class="my-4">

    <form class="row g-3" method="POST" action="praticando-composer.php">
        <div class="col-md-4">
            <label for="cep" class="form-label">CEP (somente números):</label>
            <input
                type="text"
                class="form-control"
                name="cep"
                id="cep"
                required
                autofocus
                maxlength="8"
                inputmode="numeric"
                pattern="\d{8}"
                placeholder="Ex: 15503110"
                value="<?= htmlspecialchars($cep_digitado) ?>"
            >
            <div class="form-text">Digite os 8 dígitos sem traço ou ponto.</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="praticando-composer.php" class="btn btn-warning">Limpar</a>
        </div>
    </form>

    <div class="mt-4">
        <?php if ($address): ?>
            <div class="alert alert-success">
                <h5 class="alert-heading">Endereço encontrado!</h5>
                <hr>
                <p class="mb-1"><strong>CEP:</strong>    <?= htmlspecialchars($cep_formatado) ?></p>
                <p class="mb-1"><strong>Rua:</strong>    <?= htmlspecialchars((string) $address->street) ?></p>
                <p class="mb-1"><strong>Bairro:</strong> <?= htmlspecialchars((string) $address->district) ?></p>
                <p class="mb-1"><strong>Cidade:</strong> <?= htmlspecialchars((string) $address->city) ?></p>
                <p class="mb-0"><strong>Estado:</strong> <?= htmlspecialchars((string) $address->state) ?></p>
            </div>
        <?php elseif ($erro_msg): ?>
            <div class="alert alert-danger">
                <h5 class="alert-heading">
                    Erro ao buscar CEP: <strong><?= htmlspecialchars($cep_digitado) ?></strong>
                </h5>
                <hr>
                <ul class="mb-0">
                    <?php foreach ($erro_msg as $erro): ?>
                        <li><?= htmlspecialchars($erro['message'] ?? 'Erro desconhecido') ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>