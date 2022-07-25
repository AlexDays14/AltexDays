<?php include_once __DIR__ . "/header-admin.php"; ?>

    <div class="contenido-proyecto">
        <div class="data">
            <h3>Resultados al momento</h3>

            <div class="contenido-data">
                <p>Link: </p>
                <a <?php if($proyecto->link){
                    echo "href='" . $proyecto->link . "'";
                } ?> target="__blank" ><?php echo $proyecto->link ? $proyecto->link : 'No existe Aún'; ?></a>
            </div>
            
            <div class="admin" id="admin">
                <h3>Crear Avance</h3>
                <form method="POST" action="/admin/proyecto/crear-avance" class="formulario" id="form">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre">
                    </div>
                    <input type="hidden" name="proyectoId" id="proyectoId" value="<?php echo $proyecto->id; ?>">
                    <input type="submit" class="boton" id="crear" value="Crear Avance">
                </form>
            </div>
        </div>

        <?php if(count($avances) !== 0){ ?>
        <div class="avances contenedor" id="avances">
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
        <?php  } ?>
    </div>

<?php include_once __DIR__ . "/footer-admin.php"; ?>

<?php 
    /* $script .= "
    <script src='/build/js/avances2.js'></script>
    "; */
?>