<?php
// Iniciamos la sesión, ya que queremos que se mantenga.
session_start();

// Valores globales
$usuario_valido = "admin";
$contrasenia_valida = "1234";

$error = false; // Variable para decidir si mostrar el mensaje de error en caso de que no coincidan los valores

// Importante que se verifique el formulario ha sido enviado, ya que si no por ejemplo el mensaje de error sale por defecto.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recogemos los valores del formulario
    $usuarioForm = $_POST['usuario'] ?? ''; 
    $contraseniaForm = $_POST['contrasenia'] ?? ''; 

    // Verificamos si los valores coinciden con los válidos
    if ($usuarioForm != $usuario_valido || $contraseniaForm != $contrasenia_valida) {
        $error = true; // Si no coinciden, decimos que hay un error.

    } else {
        // Si todo va bien, mostramos este mensaje
        echo "¡Login correcto! Bienvenido, $usuarioForm";
        exit(); // Detenemos la ejecución si el login es correcto
    }
}
?>

<body>

<!-- Formulario HTML -->
<form method="POST" action="">
    <label>Usuario:</label>
    <input type="text" name="usuario" required><br><br>

    <label>Contraseña:</label>
    <input type="password" name="contrasenia" required><br><br>

    <button type="submit">Entrar</button>
</form>
<!-- Mostramos el error solo si hace falta y si el formulario fue enviado -->
<?php if ($error): ?>
    <p style="color: red;">El usuario o contraseña es incorrecto</p>
<?php endif; ?>

</body>
