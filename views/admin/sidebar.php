<aside class="sidebar">
    <div class="contenedor-sidebar">
        <h2><a href="/">Altex</a></h2>
    </div>

    <div class="toggle" id="toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>

    <nav class="menu" id="menu">
        <a class="<?php echo ($titulo === 'Admin') ? 'activo' : ''; ?>" href="/admin">Proyectos</a>
        <a class="<?php echo ($titulo === 'Crear Proyecto') ? 'activo' : ''; ?>" href="/admin/crear-proyecto">Crear Proyecto</a>
        <a class="cerrar-sesion" href="/logout">Cerrar Sesión</a>
    </nav>
</aside>