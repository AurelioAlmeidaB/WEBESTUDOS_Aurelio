<?php
require __DIR__ . '/includes/auth.php';
exigir_login();

$tituloPagina = 'Sobre';
require __DIR__ . '/includes/layout-top.php';
?>

<div class="inicio">
    <div class="bg-white p-4 mb-4 rounded shadow-sm">
        <h1 class="text-center">Sobre</h1>
    </div>

    <img class="img-lorem img-thumbnail m-4 rounded float-end"
         src="https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/158.png"
         alt="Totodile">

    <p>
        Its powerful, well-developed jaws are capable of crushing anything.
        Even its <code>Trainer</code> must be <code>careful</code>.
    </p>
    <p>
        Totodile is a bipedal, crocodilian Pok&eacute;mon with well-developed jaws. It has red eyes with ridges
        above them, black markings around its eyes, and several sharp teeth. On its chest is a yellow,
        V-shaped marking that extends to its arms; there is a thin line through the center of the marking.
        Totodile has five fingers and three toes. Down its back is a row of three red spines with a small,
        red ridge on either side. The tip of its tail has a single red spine as well.
    </p>
    <p>
        Totodile tends to be both playful and rough by nature and has a habit of biting anything it sees,
        including its Trainer. Despite its size, Totodile's jaws are capable of crushing anything, so it
        sometimes causes serious injuries. Turning one's back on Totodile is considered to be a bad idea
        as it can bite without warning.
    </p>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>
