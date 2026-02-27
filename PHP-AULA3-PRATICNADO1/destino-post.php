<?php
$titulo     = filter_input(INPUT_POST, 'titulo',     FILTER_SANITIZE_SPECIAL_CHARS);
$corpo      = filter_input(INPUT_POST, 'corpo',      FILTER_SANITIZE_SPECIAL_CHARS);
$cor_texto  = filter_input(INPUT_POST, 'cor_texto',  FILTER_SANITIZE_SPECIAL_CHARS);
$url_imagem = filter_input(INPUT_POST, 'url_imagem', FILTER_SANITIZE_URL);
$url_link   = filter_input(INPUT_POST, 'url_link',   FILTER_SANITIZE_URL);
$cor_fundo  = filter_input(INPUT_POST, 'cor_fundo',  FILTER_SANITIZE_SPECIAL_CHARS);

// Desafio: converter quebras de linha em <br> para exibição no HTML
$corpo_formatado = nl2br($corpo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <style>
        body {
            background-color: <?php echo $cor_fundo; ?>;
            color: <?php echo $cor_texto; ?>;
            padding: 20px 40px;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-weight: bold;
        }
        hr {
            border-color: currentColor;
            opacity: 0.3;
        }
        img {
            max-width: 600px;
            display: block;
            margin: 30px 0 10px 0;
        }
        a {
            color: <?php echo $cor_texto; ?>;
        }
    </style>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <hr>
    <p><?php echo $corpo_formatado; ?></p>

    <?php if (!empty($url_imagem)): ?>
        <img src="<?php echo $url_imagem; ?>" alt="Imagem">
    <?php endif; ?>

    <?php if (!empty($url_link)): ?>
        <a href="<?php echo $url_link; ?>" target="_blank"><?php echo $url_link; ?></a>
    <?php endif; ?>
</body>
</html>
