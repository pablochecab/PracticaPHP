<?php
session_start();

// Aquí nos estamos protegiendo por si alguien quiere entrar sin registrarse.
if (!isset($_SESSION['usuario'])) {
    header("Location: inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Has iniciado sesión correctamente.</p>
    <?php if ($_SESSION['usuario'] == "admin"): ?>
        <button>AJUSTES DE LA APP</button>
    <?php endif; ?>

    <form method="GET" action="resultado.php">
        <label>Origen: </label>
        <input type="text" name="origen" required><br><br>
        <label>Destino</label>
        <input type="text" name="destino" required><br><br>
        <button type="submit">Buscar</button>
    </form>

    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
