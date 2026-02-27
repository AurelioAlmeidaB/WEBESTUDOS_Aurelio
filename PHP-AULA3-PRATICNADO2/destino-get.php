<?php
$nome  = filter_input(INPUT_GET, 'nome',  FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
$cor   = filter_input(INPUT_GET, 'cor',   FILTER_SANITIZE_SPECIAL_CHARS);


if (empty($cor)) {
    $cor = 'white';
}


$params_nome_email = '';
if (!empty($nome) || !empty($email)) {
    $params_nome_email = '&nome=' . urlencode($nome) . '&email=' . urlencode($email);
}


$param_cor = '';
if (!empty($cor) && $cor !== 'white') {
    $param_cor = '&cor=' . urlencode($cor);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino GET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: <?php echo $cor; ?>;
        }
        .color-box {
            width: 100%;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 10px;
            color: white;
            font-weight: bold;
            border: 2px solid #333;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h1 class="fw-bold">Destino GET</h1>
        <hr>

        <?php if (!empty($nome) || !empty($email)): ?>
        <p class="mb-0">Nome informado: <?php echo $nome; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <?php endif; ?>

        
        <a href="destino-get.php?nome=Aurelio&email=AurelioAl@gmail.com<?php echo $param_cor; ?>">
            [nome = Aurelio | email = AurelioAl@gmail.com]
        </a><br>
        <a href="destino-get.php?nome=José da Silva&email=jose1987@outlook.com<?php echo $param_cor; ?>">
            [nome = José da Silva | email = jose1987@outlook.com]
        </a><br>
        <a href="destino-get.php">Limpar tudo</a>

        <!-- Cards de cor: mantém nome e email atuais -->
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="destino-get.php?cor=red<?php echo $params_nome_email; ?>" style="text-decoration:none;">
                    <div class="color-box" style="background-color: red;">
                        <span>Red</span>
                        <span style="font-weight:normal; font-size:0.85em;">#FF0000</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="destino-get.php?cor=lime<?php echo $params_nome_email; ?>" style="text-decoration:none;">
                    <div class="color-box" style="background-color: lime;">
                        <span>Green</span>
                        <span style="font-weight:normal; font-size:0.85em;">#00FF00</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="destino-get.php?cor=blue<?php echo $params_nome_email; ?>" style="text-decoration:none;">
                    <div class="color-box" style="background-color: blue;">
                        <span>Blue</span>
                        <span style="font-weight:normal; font-size:0.85em;">#0000FF</span>
                    </div>
                </a>
            </div>
        </div>

    </div>
</body>
</html>
