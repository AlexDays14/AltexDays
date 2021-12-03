<div class="dashboard">
    <aside class="sidebar">
        <div class="contenedor-sidebar">
            <h2>Altex</h2>
        </div>

        <nav class="sidebar-nav">
            <a class="<?php echo ($titulo === 'Proyectos') ? 'activo' : ''; ?>" href="/dashboard">Proyectos</a>
            <a class="<?php echo ($titulo === 'Mensajes') ? 'activo' : ''; ?>" href="/contactos">Mensajes</a>
        </nav>
    </aside>

    <div class="principal">
        <div class="barra">
            <p>Hola: <span><?php echo $_SESSION['nombre']; ?></span></p>
            <a href="/logout" class="cerrar-sesion">Cerrar Sesión</a>
        </div>

        <div class="contenido">
            <h2 class="nombre-pagina"><?php echo $titulo; ?></h2>
    </div>
</div>