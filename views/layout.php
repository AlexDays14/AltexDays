<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://altexdays.herokuapp.com">
    <title><?php echo $titulo ?? 'Altex'; ?></title>
    <meta name="robots" content="<?php echo $robots ?? ''; ?>">
    <meta name="description" content="<?php echo $descripcion ?? ''; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $titulo ?? 'Altex'; ?>">
    <meta property="og:description" content="<?php echo $descripcion ?? ''; ?>">
    <meta property="og:image" content="/build/img/altex.png">
    <meta property="og:url" content="permalink">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/build/css/app.css">
    <?php echo $principal ?? '';?>
</head>
<body>
    
    <?php echo $contenido; ?>
    <?php echo $script ?? ''; ?>

</body>
</html>