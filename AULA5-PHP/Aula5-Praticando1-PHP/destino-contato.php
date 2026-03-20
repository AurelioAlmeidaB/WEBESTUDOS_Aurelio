<?php require 'header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome     = htmlspecialchars(trim($_POST['nome'] ?? ''));
    $email    = htmlspecialchars(trim($_POST['email'] ?? ''));
    $mensagem = htmlspecialchars(trim($_POST['mensagem'] ?? ''));
    $dataHora = date('d/m/Y - H:i:s');

    $pasta = 'contatos';
    if (!is_dir($pasta)) {
        mkdir($pasta, 0755, true);
    }

    $nomeArquivo = $pasta . '/Contato_' . date('d_m_Y') . '_' . rand(10000, 99999) . '.txt';

    $conteudo  = "Contato via site:\n\n";
    $conteudo .= "Data: $dataHora\n\n";
    $conteudo .= "Nome: $nome\n";
    $conteudo .= "Email: $email\n";
    $conteudo .= "Mensagem: $mensagem\n\n";
    $conteudo .= str_repeat('-', 60) . "\n";

    file_put_contents($nomeArquivo, $conteudo);
?>

        <div class="bg-light p-4 mb-4 rounded">
            <h1 class="text-center">Formulário para contato</h1>
        </div>

        <p>Nome informado: <?= $nome ?></p>
        <p>Email: <?= $email ?></p>
        <p>mensagem: <?= $mensagem ?></p>
        <p>Data: <?= $dataHora ?></p>

        <a href="contato.php" class="btn btn-info text-white mt-2">Voltar</a>

<?php } else { ?>

        <p>Nenhum dado recebido. <a href="contato.php">Voltar ao formulário</a>.</p>

<?php } ?>

<?php require 'footer.php'; ?>
