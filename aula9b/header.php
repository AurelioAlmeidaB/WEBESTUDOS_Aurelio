<?php
// header.php — Cabeçalho compartilhado: inicia sessão, protege a página e exibe a navbar
// Aceita variáveis opcionais definidas ANTES do require:
//   $pageTitle  (string) — título da aba
//   $bodyBg     (string) — cor de fundo do body (ex.: 'red', 'lime', 'blue')
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$_SESSION['ultimo_acesso'] = date('d/m/Y H:i:s');
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Estudos PHP') ?> — Aulas 4, 5 e 9b</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-lorem { width: 30%; }
        .inicio p  { text-align: justify; text-indent: 3.5em; }
        .color-box {
            width: 100%;
            height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 10px;
            color: #fff;
            font-weight: bold;
            border: 2px solid #333;
            border-radius: 4px;
        }
    </style>
</head>
<body <?= isset($bodyBg) ? 'style="background-color:' . htmlspecialchars($bodyBg) . '"' : 'class="bg-light"' ?>>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="inicio.php">&#128218; Estudos PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Aula 5: site com layout -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array($paginaAtual, ['inicio.php','sobre.php','faqs.php','contato.php','destino-contato.php']) ? 'active' : '' ?>"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aula 5
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="inicio.php">Início</a></li>
                        <li><a class="dropdown-item" href="sobre.php">Sobre</a></li>
                        <li><a class="dropdown-item" href="faqs.php">FAQs</a></li>
                        <li><a class="dropdown-item" href="contato.php">Contato</a></li>
                    </ul>
                </li>

                <!-- Aula 4: GET + cores -->
                <li class="nav-item">
                    <a href="destino-get.php" class="nav-link <?= $paginaAtual === 'destino-get.php' ? 'active' : '' ?>">
                        Aula 4 — Cores
                    </a>
                </li>

                <!-- Aula 9b: sessão -->
                <li class="nav-item">
                    <a href="restrito.php" class="nav-link <?= $paginaAtual === 'restrito.php' ? 'active' : '' ?>">
                        Minha Sessão
                    </a>
                </li>


            </ul>

            <span class="navbar-text text-light me-3 small">
                &#128100; <?= htmlspecialchars($_SESSION['usuario']) ?>
            </span>
            <a href="logout.php" class="btn btn-sm btn-outline-danger">Sair</a>
        </div>
    </div>
</nav>

<div class="container">
