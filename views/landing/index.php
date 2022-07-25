<a href="#" class="btntop" id="btntop">
    <i class='bx bx-up-arrow-alt icon' ></i>
</a>

<header class="header">
    <div class="contenido-header contenedor">
        <nav class="nav">
            <a href="#" class="logo">Altex</a>

            <div class="menu" id="menu">
                <a href="#incluye" class="link">¿Qué Incluye?</a>
                <a href="#contacto" class="link">Contacto</a>
                <a href="/portafolio" class="link">Portafolio</a>
                <a href="/servicios" class="link">Servicios</a>
                <?php if(isset($_SESSION['admin'])){ ?>
                        <a href="/admin" class="link">Admin</a>
                <?php } ?>
                <?php if(!isset($_SESSION['login'])){?>
                    <a href="/login" class="log">Login</a>
                <?php }else{ ?>
                    <a href="/dashboard" class="link">Dashboard</a>
                    <a href="/logout" class="log">Logout</a>
                <?php } ?>
            </div>

            <div class="toggle" id="toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
        </nav>

        <div class="header-data">
            <div class="title">
                <h1>Bienvenido a <span>Altex</span>, <br> Haz Realidad Tu Proyecto</h1>
                <a href="#beneficios" class="button">Empieza Ya <i class='bx bx-right-arrow-alt icon'></i></a>
            </div>
            <div class="img">
                <img src="/../build/img/altex.png" alt="">
            </div>
        </div>

        <div class="header-social">
            <span>Sígueme</span>
            <a href="#" class="icon facebook"><i class='bx bxl-facebook-circle' ></i></a>
            <a href="#" class="icon instagram"><i class='bx bxl-instagram-alt' ></i></a>
            <a href="https://wa.me/message/A2E7JETUV6EOA1" target="_blank" class="icon whatsapp"><i class='bx bxl-whatsapp'></i></a>
        </div>
    </div>
</header>

<main class="main" id="main">
    <section class="beneficios" id="beneficios">
        <h2>Beneficios de Una Página Web</h2>
        <div class="contenedor-beneficios contenedor-md">
            <div class="beneficio">
                <div class="icono">
                    <i class='bx bx-stats'></i>
                </div>
                <div class="contenido-beneficio">
                    <h3>Exposición</h3>
                </div>
            </div>
            <div class="beneficio">
                <div class="icono">
                    <i class='bx bxs-bar-chart-alt-2' ></i>
                </div>
                <div class="contenido-beneficio">
                    <h3>Tráfico</h3>
                </div>
            </div>
            <div class="beneficio">
                <div class="icono">
                    <i class='bx bx-stats'></i>
                </div>
                <div class="contenido-beneficio">
                    <h3>Alcance</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="incluye seccion" id="incluye">
        <h2>¿Qué Incluye el Servicio?</h2>
        <div class="contenedor-incluye contenedor-sm">
            <div class="card">
                <div class="card-data">
                    <h3>Sitio Web</h3>
                    <p>Perfecto para tu Blog o para dar a conocer tu Empresa.</p>
                </div>
                <div class="card-descripcion">
                    <ul>
                        <li>Sitio web con 6 secciones</li>
                        <li>Formulario de Contacto</li>
                        <li>Dominio de 1 o 2 años</li>
                        <li>Hosting de 1 año</li>
                        <li>Mantenimiento por 4 Meses</li>
                    </ul>
                </div>
                <a href="#contacto" class="button">Cotizar</a>
            </div>
            <div class="card">
                <div class="card-data">
                    <h3>E-Commerce</h3>
                    <p>Especialmente para tu tienda en línea.</p>
                </div>
                <div class="card-descripcion">
                    <ul>
                        <li>Sitio web completo</li>
                        <li>Formulario de contacto</li>
                        <li>Dominio de 1 o 2 años</li>
                        <li>Hosting de 1 año</li>
                        <li>Base de Datos</li>
                        <li>Dashboard de Administrador</li>
                        <li>Primera Carga de Productos</li>
                    </ul>
                </div>
                <a href="#contacto" class="button">Cotizar</a>
            </div>
        </div>
    </section>

    <section class="contacto" id="contacto">
        <div class="contenedor-contacto contenedor-md">
            <div class="contenido-contacto">
                <h2>Envíame un Mensaje</h2>
                <p>Es la mejor forma para empezar con tu proyecto deseado.</p>
                <?php include_once __DIR__ . "/../templates/alertas.php" ?>
                <form class="formulario" method="POST" action="">
                    <div class="campo">
                        <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo $contacto->nombre; ?>">
                    </div>
                    <div class="campo">
                        <input type="email" id="email" name="email" placeholder="Tu Email" value="<?php echo $contacto->email; ?>">
                    </div>
                    <div class="campo">
                        <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Tu Mensaje"><?php echo $contacto->mensaje; ?></textarea>
                    </div>
                    <input type="submit" class="button" value="Enviar">
                </form>
            </div>

            <h3 class="tagline">O Contáctame Por:</h3>

            <div class="contacto-whatsapp">
                <a class="num" href="https://wa.me/message/A2E7JETUV6EOA1" target="_blank"><span>+526567509829</span></a>
                <a href="https://wa.me/message/A2E7JETUV6EOA1" target="_blank" class="icon whatsapp"><i class='bx bxl-whatsapp'></i></a>
            </div>
        </div>
    </section>
</main>

<footer class="footer seccion">
    <div class="contenedor-footer contenedor-md">
        <div class="contenido-footer">
            <h3 class="titulo-footer"><a href="#" class="logo-footer">Altex</a></h3>
            <p class="descripcion-footer">Haz Realidad Tu Proyecto.</p>
        </div>

        <div class="contenido-footer">
            <h3 class="titulo-footer">Servicio</h3>

            <ul>
                <li><a href="#" class="link-footer">Beneficios</a></li>
                <li><a href="#" class="link-footer">¿Qué Inluye?</a></li>
                <li><a href="#" class="link-footer">Contacto</a></li>
            </ul>
        </div>

        <div class="contenido-footer">
            <h3 class="titulo-footer">Acerca de Altex</h3>

            <ul>
                <li><a href="#" class="link-footer">Términos y Condiciones</a></li>
                <li><a href="#" class="link-footer">Política de Privacidad</a></li>
                <li><a href="#" class="link-footer">Aviso Legal</a></li>
            </ul>
        </div>

        <div class="contenido-footer social">
            <h3 class="titulo-footer">Social</h3>
            <a href="#" class="social-footer"><i class='bx bxl-facebook-circle' ></i></a>
            <a href="#" class="social-footer"><i class='bx bxl-instagram-alt' ></i></a>
            <a href="#" class="social-footer"><i class='bx bxl-whatsapp' ></i></a>
        </div>
    </div>

    <p class="copy-footer">&copy; 2021 Altex. Todos los derechos reservados.</p>
</footer>

<?php $script = '
<script src="/../build/js/index.js"></script>
' ?>