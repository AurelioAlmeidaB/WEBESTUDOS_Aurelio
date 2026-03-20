<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="inicio.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Simple header</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="inicio.php" class="nav-link <?= $paginaAtual === 'inicio.php' ? 'active' : '' ?>" <?= $paginaAtual === 'inicio.php' ? 'aria-current="page"' : '' ?>>Início</a></li>
                <li class="nav-item"><a href="sobre.php" class="nav-link <?= $paginaAtual === 'sobre.php' ? 'active' : '' ?>">Sobre</a></li>
                <li class="nav-item"><a href="faqs.php" class="nav-link <?= $paginaAtual === 'faqs.php' ? 'active' : '' ?>">FAQs</a></li>
                <li class="nav-item"><a href="contato.php" class="nav-link <?= ($paginaAtual === 'contato.php' || $paginaAtual === 'destino-contato.php') ? 'active' : '' ?>">Contato</a></li>
            </ul>
        </header>
