<?php
require __DIR__ . '/includes/auth.php';
exigir_login();

$tituloPagina = 'FAQs';
require __DIR__ . '/includes/layout-top.php';
?>

<div class="inicio">
    <div class="bg-white p-4 mb-4 rounded shadow-sm">
        <h1 class="text-center">FAQs</h1>
    </div>

    <img class="img-lorem img-thumbnail m-4 rounded float-end"
         src="https://assets.pokemon.com/static-assets/content-assets/cms2-pt-br/img/cards/web/SM35/SM35_PT-BR_18.png"
         alt="Totodile Card">

    <p>
        <strong>O que &eacute; o Totodile?</strong><br>
        Totodile &eacute; um Pok&eacute;mon do tipo &Aacute;gua, conhecido por sua personalidade energ&eacute;tica e por morder tudo
        ao seu redor, muitas vezes sem perceber a pr&oacute;pria for&ccedil;a.
    </p>
    <p>
        <strong>Qual a diferen&ccedil;a entre Totodile e suas evolu&ccedil;&otilde;es?</strong><br>
        Totodile evolui para Croconaw e depois para Feraligatr. A principal diferen&ccedil;a est&aacute; no aumento de
        poder, tamanho e agressividade. Enquanto Totodile &eacute; mais brincalh&atilde;o, suas evolu&ccedil;&otilde;es se tornam mais
        fortes e com apar&ecirc;ncia mais intimidadora.
    </p>
    <p>
        <strong>Quando escolher Totodile?</strong><br>
        Quando voc&ecirc; quer um Pok&eacute;mon equilibrado no in&iacute;cio da jornada, com boa for&ccedil;a f&iacute;sica e vantagem
        contra tipos Fogo, Pedra e Terra. Ele &eacute; uma escolha s&oacute;lida para quem prefere ataques f&iacute;sicos e
        um estilo direto de batalha.
    </p>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>
