<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Números Primos</title>
</head>
<body>
    <h2>Praticando 3 - Números primos</h2>
    
    <a href="?num=1">Número 1</a> | 
    <a href="?num=2">Número 2</a> | 
    <a href="?num=3">Número 3</a> | 
    <a href="?num=5">Número 5</a> | 
    <a href="?num=20">Número 20</a> | 
    <a href="?num=32">Número 32</a> | 
    <a href="?num=37">Número 37</a>
    
    <hr>

    <?php
    if (isset($_GET['num'])) {
        $num = (int)$_GET['num'];
        
        // 1. Verifica se é PAR ou ÍMPAR
        $parImpar = ($num % 2 == 0) ? "PAR" : "ÍMPAR";

        // 2. Verifica se é PRIMO
        $ehPrimo = true;
        if ($num < 2) {
            $ehPrimo = false; // 0 e 1 não são primos
        } else {
            // Um loop para tentar dividir o número por todos os valores de 2 até a metade dele
            for ($i = 2; $i <= $num / 2; $i++) {
                if ($num % $i == 0) {
                    $ehPrimo = false; // Se for divisível por algum, não é primo
                    break;
                }
            }
        }

        // Exibe o resultado formatado
        $textoPrimo = $ehPrimo ? "é um número PRIMO" : "não é um número PRIMO";
        
        echo "<h3>O número $num $textoPrimo</h3>";
        echo "<p>Além disso ele é um número $parImpar</p>";
    }
    ?>
</body>
</html>