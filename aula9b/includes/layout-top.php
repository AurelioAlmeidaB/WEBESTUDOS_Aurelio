<?php
$paginaAtual  = basename($_SERVER['PHP_SELF']);
$tituloPagina = $tituloPagina ?? 'Estudos PHP';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tituloPagina) ?> — Aulas 4, 5 e 9b</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-lorem { width: 30%; max-width: 320px; }
        .inicio p  { text-align: justify; text-indent: 2.2em; }
        .color-box {
            width: 100%; height: 160px;
            display: flex; flex-direction: column; justify-content: flex-end;
            padding: 10px; color: #fff; font-weight: bold;
            border: 2px solid #333; border-radius: 4px;
        }
    </style>
</head>
<body <?= isset($bodyBg) ? 'style="background-color:' . htmlspecialchars($bodyBg) . '"' : 'class="bg-light"' ?>>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="inicio.php">&#128218; Estudos PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarPrincipal">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Dropdown Aula 5 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array($paginaAtual, ['inicio.php','sobre.php','faqs.php','contato.php','destino-contato.php']) ? 'active' : '' ?>"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Aula 5
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item <?= $paginaAtual === 'inicio.php' ? 'active' : '' ?>" href="inicio.php">In&iacute;cio</a></li>
                        <li><a class="dropdown-item <?= $paginaAtual === 'sobre.php' ? 'active' : '' ?>" href="sobre.php">Sobre</a></li>
                        <li><a class="dropdown-item <?= $paginaAtual === 'faqs.php' ? 'active' : '' ?>" href="faqs.php">FAQs</a></li>
                        <li><a class="dropdown-item <?= ($paginaAtual === 'contato.php' || $paginaAtual === 'destino-contato.php') ? 'active' : '' ?>" href="contato.php">Contato</a></li>
                    </ul>
                </li>

                <!-- Aula 4 -->
                <li class="nav-item">
                    <a href="jogue-de-bolas.php" class="nav-link <?= $paginaAtual === 'jogue-de-bolas.php' ? 'active' : '' ?>">
                        Aula 4 &mdash; Cores
                    </a>
                </li>

                <!-- Aula 9b: Sessão -->
                <li class="nav-item">
                    <a href="restrito.php" class="nav-link <?= $paginaAtual === 'restrito.php' ? 'active' : '' ?>">
                        Sess&atilde;o
                    </a>
                </li>


            </ul>

            <span class="navbar-text text-light me-3 small">
                &#128100; <?= htmlspecialchars($_SESSION['usuario'] ?? '') ?>
            </span>
            <a href="logout.php" class="btn btn-sm btn-outline-danger">Sair</a>
        </div>
    </div>
</nav>

<div class="container pb-4">
