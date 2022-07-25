<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://altexdays.herokuapp.com">
    <link rel="shortcut icon" href="/build/img/altex.png">
    <title><?php echo $titulo ?? 'Altex'; ?></title>
    <meta name="robots" content="<?php echo $robots ?? 'index,follow'; ?>">
    <meta name="description" content="<?php echo $descripcion ?? 'Diseñamos cualquier página para tu negocio'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $titulo ?? 'Altex'; ?>">
    <meta property="og:description" content="<?php echo $descripcion ?? 'Diseñamos cualquier página para tu negocio'; ?>">
    <meta property="og:image" content="/build/img/altex.png">
    <meta property="og:url" content="permalink">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/build/css/app.css">
    <?php echo $principal ?? '';?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180553677-1">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-180553677-1');
    </script>
</head>
<body>
    <?php
    if(isset($home) && $home == false){ ?>
        <header class="header no-home">
            <div class="contenido-header contenedor">
                <nav class="nav">

                    <div class="menu" id="menu">
                        <a href="/" class="link">Inicio</a>
                        <a href="/portafolio" class="link">Portafolio</a>
                        <a href="/servicios" class="link">Servicios</a>
                        <?php if(!isset($_SESSION['login']) && $titulo !== 'Altex | Iniciar Sesión'){?>
                            <a href="/login" class="log">Login</a>
                        <?php }else if($titulo !== 'Altex | Iniciar Sesión'){ ?>
                            <a href="/dashboard" class="link">Dashboard</a>
                            <a href="/logout" class="log">Logout</a>
                        <?php } ?>
                    </div>

                    <div class="toggle" id="toggle">
                        <i class='bx bx-menu-alt-right'></i>
                    </div>
                </nav>
            </div>
        </header>
    <?php } ?>
    <?php echo $contenido; ?>
    <?php echo $script ?? ''; ?>

</body>
</html>