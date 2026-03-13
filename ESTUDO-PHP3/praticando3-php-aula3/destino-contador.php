<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contador - Destino</title>
</head>
<body>
    <h2>Contador</h2>
    
    <?php
    if (isset($_POST['inicio']) && isset($_POST['final']) && isset($_POST['incremento'])) {
        $inicio = (int)$_POST['inicio'];
        $final = (int)$_POST['final'];
        $incremento = (int)$_POST['incremento'];

        echo "<p>Parâmetros informados:<br>";
        echo "Início: $inicio<br>";
        echo "Final: $final<br>";
        echo "Incremento: $incremento</p>";

        // Verifica se a contagem deve ser CRESCENTE ou DECRESCENTE
        if ($inicio <= $final) {
            // Crescente
            for ($i = $inicio; $i <= $final; $i += $incremento) {
                echo "$i ";
            }
        } else {
            // Decrescente
            for ($i = $inicio; $i >= $final; $i -= $incremento) {
                echo "$i ";
            }
        }
    }
    ?>
    <br><br><a href="prat2-form-contador.php">Voltar</a>
</body>
</html>