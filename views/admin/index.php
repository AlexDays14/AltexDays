<?php

use Model\Usuario;

include_once __DIR__ . "/header-admin.php"; ?>

<?php if(count($proyectos) === 0){ ?>
    <p class="no-proyectos">No Tienes Proyectos en Marcha
<?php }else{ ?>
    <ul class="listado-proyectos">
        <?php foreach($proyectos as $proyecto){ ?>
            <li class="proyecto">
                <a href="/admin/proyecto?slug=<?php echo $proyecto->slug; ?>"> <?php echo $proyecto->nombre; ?></a>
                <?php $cliente = Usuario::where('id', $proyecto->propietarioId);?>
            <p>Cliente: <?php echo $cliente->nombre ?></p>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<?php include_once __DIR__ . "/footer-admin.php"; ?>