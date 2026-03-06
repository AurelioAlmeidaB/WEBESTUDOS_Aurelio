<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Praticando Calculadora média</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Praticando Calculadora média</h2>
    <form action="destino-notas.php" method="POST">
        <div class="form-group">
            <label for="nota1">Nota 1:</label>
            <input type="number" name="nota1" id="nota1" min="0" max="10" step="0.5" required>
        </div>
        <div class="form-group">
            <label for="nota2">Nota 2:</label>
            <input type="number" name="nota2" id="nota2" min="0" max="10" step="0.5" required>
        </div>
        <div class="form-group">
            <label for="nota3">Nota 3:</label>
            <input type="number" name="nota3" id="nota3" min="0" max="10" step="0.5" required>
        </div>
        <button type="submit">Calcular média</button>
        <button type="reset">Limpar</button>
    </form>
</body>
</html>