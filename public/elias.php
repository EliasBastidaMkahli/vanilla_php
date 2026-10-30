<?php
session_start();

// 1. Manejo de COOKIES (Si no existe la cookie 'usuario', la creamos como 'Invitado')
if (!isset($_COOKIE['usuario'])) {
    setcookie('usuario', 'Invitado', time() + 3600, "/"); // Se añade "/" para que esté disponible en toda la web
}

// 2. Manejo de POST (Si el usuario envía el formulario con su nombre)
if (isset($_POST['name'])) {
    $_SESSION['nombre'] = $_POST['name'];
    echo "<p>Nombre guardado en la sesión: " . htmlspecialchars($_SESSION['nombre']) . "</p>";
}

// 3. Manejo de GET (Si el usuario hace clic en el enlace para destruir la sesión)
if (isset($_GET['accion']) && $_GET['accion'] == 'destruir_sesion') {
    // Limpiamos el array de sesión y destruimos el archivo en el servidor
    $_SESSION = array();
    session_destroy();
    echo "<p style='color: red;'>Sesión destruida con éxito.</p>";
}

// 4. Mostrar estado de la COOKIE 'usuario'
if (isset($_COOKIE['usuario'])) {
    echo "<p>Cookie 'usuario' almacenada: " . htmlspecialchars($_COOKIE['usuario']) . "</p>";
} else {
    echo "<p>Cookie 'usuario' no disponible.</p>";
}

// Extra: Mostrar el nombre de la sesión si existe y no ha sido destruida
if (isset($_SESSION['nombre'])) {
    echo "<p>Sesión activa para el usuario: " . htmlspecialchars($_SESSION['nombre']) . "</p>";
}else if (isset($_COOKIE['usuario'])) {
echo "<p>Sesión activa para el usuario: " . htmlspecialchars($_COOKIE['usuario']) . "</p>";

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo con $_POST, $_GET, $_COOKIE, y $_SESSION</title>
</head>
<body>
    <h2> <?php echo $_SESSION['nombre']  ?> </h2>
    <h1>Ejemplo con $_POST, $_GET, $_COOKIE y $_SESSION</h1>
    
    <!-- El action apunta a index.php, asegúrate de que tu archivo se llame así -->
    <form method="POST" action="elias.php">
        <label for="nombre">Introduce tu nombre:</label>
        <input type="text" name="name" id="nombre" required>
        <input type="submit" value="Enviar">
    </form>

    <p><a href="elias.php?accion=destruir_sesion">Destruir sesión</a></p>
</body>
</html>
