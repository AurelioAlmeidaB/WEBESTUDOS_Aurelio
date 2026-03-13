<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerador de Tabela</title>
</head>
<body>
    <h2>Praticando 4 - Gerador de tabela</h2>
    
    <form action="destino-tabela.php" method="POST">
        <label>Linhas: <input type="number" name="linhas" required min="1"></label><br><br>
        <label>Colunas: <input type="number" name="colunas" required min="1"></label><br><br>
        
        <label>Estilo:
            <select name="estilo">
                <option value="table-primary">table-primary</option>
                <option value="table-success">table-success</option>
                <option value="table-danger">table-danger</option>
                <option value="table-warning">table-warning</option>
                <option value="table-dark">table-dark</option>
            </select>
        </label><br><br>
        
        <button type="submit">Enviar</button>
        <button type="reset">Limpar</button>
    </form>
</body>
</html>
