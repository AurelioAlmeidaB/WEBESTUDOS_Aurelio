<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tabela Gerada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Praticando 4 - Gerador de tabela</h2>
    
    <?php
    if (isset($_POST['linhas']) && isset($_POST['colunas']) && isset($_POST['estilo'])) {
        $linhas = (int)$_POST['linhas'];
        $colunas = (int)$_POST['colunas'];
        $estilo = htmlspecialchars($_POST['estilo']); // Evita falhas de segurança

        echo "<h4>Tabela {$linhas}x{$colunas}</h4>";
        
        // table-bordered é adicionado para criar as bordas como pedido no exercício
        echo "<table class='table table-bordered $estilo'>";
        
        // Loop externo cria as LINHAS (<tr>)
        for ($i = 0; $i < $linhas; $i++) {
            echo "<tr>";
            
            // Loop interno cria as COLUNAS (<td>)
            for ($j = 0; $j < $colunas; $j++) {
                echo "<td> &nbsp; </td>"; // &nbsp; cria um espaço vazio para a célula não ficar achatada
            }
            
            echo "</tr>";
        }
        
        echo "</table>";
    }
    ?>
    
    <a href="prat4-form-tabela.php" class="btn btn-secondary">Voltar</a>
</body>
</html>