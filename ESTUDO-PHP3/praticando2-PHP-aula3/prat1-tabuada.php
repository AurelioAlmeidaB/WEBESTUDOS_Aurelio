<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tabuada</title>
</head>
<body>
    <h2>Tabuada</h2>
    
    <form action="prat1-tabuada.php" method="GET">
        <label>Número: <input type="number" name="val" required></label>
        <button type="submit">Enviar</button>
        <button type="reset">Limpar</button>
    </form>

    <hr>

    <?php
    // Verifica se o parâmetro 'val' foi enviado na URL
    if (isset($_GET['val'])) {
        $val = (int)$_GET['val'];
        echo "<h3>Tabuada do $val</h3>";
        
        // Loop de 1 a 10 para gerar a tabuada
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $val * $i;
            echo "$val x $i = $resultado <br>";
        }
    }
    ?>
</body>
</html>