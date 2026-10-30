<?php
declare(strict_types=1);
// Guardar: el navegador la conservará 30 días.
setcookie('ultimo_ciclo', 'DAW', [
    'expires'  => time() + 60 * 60 * 24 * 30,
    'httponly' => true,
    'samesite' => 'Lax',
]);

// Leer: llega en las peticiones SIGUIENTES.
$ciclo = $_COOKIE['ultimo_ciclo'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo $ciclo;
    ?>
</body>
</html>