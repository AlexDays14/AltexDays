<?php include_once __DIR__ . "/header-admin.php"; ?>

<div class="crear-proyecto contenedor-sm">
        <?php include_once __DIR__ . "/../templates/alertas.php" ?>

        <form method="POST" action="/admin/crear-proyecto" class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $proyecto->nombre; ?>">
            </div>

            <div class="campo">
                <label for="propietarioId">Usuario</label>
                <select name="propietarioId" id="propietarioId">
                    <option selected disabled>Elegir Usuario</option>
                    <?php foreach($usuarios as $usuario){ ?>
                        <option value="<?php echo $usuario->id ?>"><?php echo $usuario->id . ' - ' . $usuario->nombre . ' - ' . $usuario->email ?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" class="boton" value="Crear Proyecto">
        </form>
</div>

<?php include_once __DIR__ . "/footer-admin.php"; ?>