<aside class="sidebar">
    <div class="contenedor-sidebar">
        <h2><a href="/">Altex</a></h2>
    </div>

    <div class="toggle" id="toggle">
        <i class='bx bx-menu-alt-right'></i>
    </div>

    <nav class="menu" id="menu">
        <a class="<?php echo ($titulo === 'Mis Proyectos') ? 'activo' : ''; ?>" href="/dashboard">Proyectos</a>
        <a class="<?php echo ($titulo === 'Mensajes') ? 'activo' : ''; ?>" href="/contactos">Mensajes</a>
        <a class="cerrar-sesion" href="/logout">Cerrar Sesión</a>
    </nav>
</aside>