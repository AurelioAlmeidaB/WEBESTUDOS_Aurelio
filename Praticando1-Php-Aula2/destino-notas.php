<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado da Média</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .reprovado { color: red; font-weight: bold; }
        .recuperacao { color: orange; font-weight: bold; }
        .aprovado { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Praticando - Calculadora média</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nota1 = floatval($_POST['nota1']);
        $nota2 = floatval($_POST['nota2']);
        $nota3 = floatval($_POST['nota3']);

        $media = ($nota1 + $nota2 + $nota3) / 3;

        echo "<p>Um aluno com as notas $nota1, $nota2 e $nota3 tem uma média igual a " . number_format($media, 2, ',', '.') . "</p>";

        if ($media < 4) {
            echo "<p>Com essa média o aluno está <span class='reprovado'>REPROVADO</span></p>";
        } elseif ($media >= 4 && $media < 6) {
            echo "<p>Com essa média o aluno está <span class='recuperacao'>DE RECUPERAÇÃO</span></p>";
        } else {
            echo "<p>Com essa média o aluno está <span class='aprovado'>APROVADO</span></p>";
        }
    } else {
        echo "<p>Nenhum dado recebido. Por favor, preencha o formulário.</p>";
    }
    ?>
    <br>
    <a href="formulario_notas.php">Voltar</a>
</body>
</html>