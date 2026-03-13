<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Destino</title>
</head>
<body>
    <h2>Dados da requisição:</h2>
    <pre>
    <?php
    // 1. Mostra todos os dados da requisição usando var_dump() no $_POST [cite: 72]
    var_dump($_POST);
    ?>
    </pre>

    <hr>

    <h2>Interesses selecionados (em ordem alfabética)</h2>
    
    <?php
    // Verifica se o array 'interesses' foi enviado (ou seja, se o usuário marcou algo)
    if (isset($_POST['interesses']) && is_array($_POST['interesses'])) {
        
        $interesses = $_POST['interesses'];

        // 2. Ordena os interesses em ordem alfabética 
        sort($interesses);

        echo "<ul>";
        
        // Conta quantos itens foram selecionados
        $total_selecionado = count($interesses);
        
        // 3. Mostra os três primeiros itens 
        $limite = ($total_selecionado < 3) ? $total_selecionado : 3;

        for ($i = 0; $i < $limite; $i++) {
            echo "<li>" . htmlspecialchars($interesses[$i]) . "</li>";
        }

        // 4. Se houver mais de três itens, mostra um quarto item com reticências [cite: 83, 84]
        if ($total_selecionado > 3) {
            echo "<li>...</li>";
        }

        echo "</ul>";

    } else {
        echo "<p>Nenhum interesse foi selecionado.</p>";
    }
    ?>

    <br>
    <a href="index.html">Voltar para o formulário</a>
</body>
</html>