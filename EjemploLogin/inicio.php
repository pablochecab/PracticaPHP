<?php
session_start();

// Datos de acceso simulados (en un caso real, vendrían de una base de datos)
$usuario_admin = 'admin';
$usuario_raso = 'raso';
$contrasena_valida = '1234';
date_default_timezone_set("Europe/Madrid"); // Zona horaria para España
$error = false;

function comprobarAtributos($nombre, $contrasena) {

    // Comentario añadido
    if(strlen($nombre) < 2) {
        loggerFallido();
        throw new Exception("El nombre de usuario debe contener al menos 2 caracteres.");
        return false;
    }

    else if (!preg_match('/^[a-zA-Z]+$/', $nombre)) {
        loggerFallido();
        throw new Exception("El nombre debe incluir solo letras y sin espacios.");
    }

    else return true;
}

function loggerFallido () {

    // Resource: tipo especial que hace referencia a recursos externos como archivos o conexiones
    //w -> Abre o crea, borra lo que haya y escribe.
    //r -> Lee
    //a -> Append, no borra, apila la información
    $logFile = fopen("logger.txt", "a") or die ("Unable to open file!"); // Conectamos, creamos el archivo que queremos

    fwrite($logFile, date("Y-m-d H:i:s")." => "); // Escribimos lo que nos interesa.
    fwrite($logFile, $_POST['usuario']." = ");
    fwrite($logFile, "Intento fallido");
    fwrite($logFile, "\n");
    
    fclose($logFile);
}

function loggerExito() {

    $logFile = fopen("logger.txt", "a") or die ("Unable to open file!"); // Conectamos, creamos el archivo que queremos

    fwrite($logFile, date("Y-m-d H:i:s")." => "); // Escribimos lo que nos interesa.
    fwrite($logFile, $_POST['usuario']. " = ");
    fwrite($logFile, "Éxito al iniciar");
    fwrite($logFile, "\n");

    fclose($logFile);
}

// Verificamos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        if (isset($usuario) && isset($contrasena)) {
            comprobarAtributos($usuario, $contrasena);

            if (
                ($usuario === $usuario_admin && $contrasena === $contrasena_valida) ||
                ($usuario === $usuario_raso && $contrasena === $contrasena_valida)
            ) {
                loggerExito();
                $_SESSION['usuario'] = $usuario;
                header("Location: bienvenido.php");
                exit();
            } else {
                loggerFallido();
                throw new Exception("Usuario o contraseña inválidos.");
            }
        }

    } catch (Exception $e) {
        // Aquí recogemos todas las excepciones que puedan saltar, se incluyen las de las funciones ya que están dentro
        // del bloque try.
        $error = true;
        $error_message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login PHP</title>
</head>
<body>
    <h2>Iniciar sesión</h2> 
    <?php if ($error): ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="inicio.php">
        <label>Usuario:</label>
        <input type="text" name="usuario" required minlength="2"><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
