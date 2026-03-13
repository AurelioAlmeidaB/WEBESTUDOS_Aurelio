<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contador</title>
</head>
<body>
    <h2>Contador</h2>
    <form action="destino-contador.php" method="POST">
        <label>Início: <input type="number" name="inicio" required></label><br><br>
        <label>Final: <input type="number" name="final" required></label><br><br>
        <label>Incremento: <input type="number" name="incremento" required min="1"></label><br><br>
        <button type="submit">Enviar</button>
        <button type="reset">Limpar</button>
    </form>
</body>
</html>