<?php include_once __DIR__ . "/header-dashboard.php"; ?>

    <?php if (count($proyectos) === 0){ ?>
        <p class="no-proyectos">No Tienes Proyectos en Marcha
    <?php }else{ ?>
        <ul class="listado-proyectos">
            <?php foreach($proyectos as $proyecto){ ?>
                <li class="proyecto">
                    <a href="/proyecto?slug=<?php echo $proyecto->slug; ?>"> <?php echo $proyecto->nombre; ?></a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

<?php include_once __DIR__ . "/footer-dashboard.php"; ?>