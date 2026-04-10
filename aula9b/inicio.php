<?php
require __DIR__ . '/includes/auth.php';
exigir_login();

$tituloPagina = 'Inicio';
require __DIR__ . '/includes/layout-top.php';
?>

<div class="inicio">
    <div class="bg-white p-4 mb-4 rounded shadow-sm">
        <h1 class="text-center">P&aacute;gina Inicial</h1>
    </div>

    <img class="img-lorem img-thumbnail m-4 rounded float-end"
         src="https://assets.justinmind.com/wp-content/uploads/2018/11/Lorem-Ipsum-alternatives-1024x655.png"
         alt="Lorem Ipsum">

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet egestas sapien.
        Fusce porttitor tellus vel eleifend dictum. Aenean sed neque sit amet risus eleifend pulvinar.
        Aliquam erat volutpat. Duis tempor non risus sit amet accumsan. Ut eget nisl ipsum. Morbi ultrices
        nec mi vitae maximus. Morbi nec ornare justo. Pellentesque aliquam ex eget purus tempor sodales.
        In imperdiet sem nibh, eget faucibus tortor aliquam eget.
    </p>
    <p>
        Quisque imperdiet purus vel felis vulputate, quis sollicitudin enim volutpat. Curabitur elementum
        urna dolor. Nulla suscipit leo sit amet erat egestas commodo. Ut accumsan turpis eu justo placerat,
        vitae consequat ipsum suscipit. Nunc et fringilla nunc. Nullam ut lobortis nulla. Cras euismod turpis
        posuere sapien ornare, nec lobortis libero rhoncus. Phasellus mauris lorem, eleifend eget tincidunt
        quis, varius eu est. Fusce metus risus, lobortis eget justo nec, condimentum ullamcorper augue.
        Phasellus sollicitudin magna non euismod elementum. Proin sodales venenatis vulputate.
    </p>
</div>

<?php require __DIR__ . '/includes/layout-bottom.php'; ?>
