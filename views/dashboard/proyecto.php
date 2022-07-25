<?php include_once __DIR__ . "/header-dashboard.php"; ?>

    <div class="contenido-proyecto">
        <div class="data">
            <h3>Resultados al momento</h3>

            <div class="contenido-data">
                <p>Link del proyecto: </p>
                <a <?php if($proyecto->link){
                    echo "href='" . $proyecto->link . "'";
                } ?> target="__blank" ><?php echo $proyecto->link ? $proyecto->link : 'No existe Aún'; ?></a>
            </div>
        </div>

        <?php if(count($avances) !== 0){ ?>
        <div class="avances contenedor">
            <?php foreach($avances as $avance){ ?>
                <div class="avance">
                    <div class="imagen-avance">
                        <img src="/build/img/altex.png" alt="">
                    </div>
                    <p><?php echo $avance->nombre; ?></p>
                </div>
            <?php } ?>
        </div>
        <?php } else{?>
            <p class="text-center">No Hay Avances Aún</p>
        <?php } ?>
    </div>

<?php include_once __DIR__ . "/footer-dashboard.php"; ?>