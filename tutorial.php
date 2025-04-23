<!-- Instalación de PHP -->
<!-- Meterse a la web, descargar ultima version, meter la carpeta en donde quieras y luego añadirla al Path del sistema. -->

<?php 

/* -------------------------------------------- VARIABLES -------------------------------------------- */

// String: texto
$String = "Hola, soy una cadena de texto";

// Integer: número entero
$Integer = 42;

// Float: número con decimales
$Float = 3.1416;

// Boolean: verdadero o falso
$Boolean = true;

// Array: colección de datos (índices automáticos)
$Array = ["manzana", "banana", "cereza"];

// Object: una instancia de una clase 
class Persona {
    public $nombre = "Juan";
    public $edad = 30;
}
$Object = new Persona();

// NULL: sin valor asignado
$NULL = null;

// TAMBIEN EXISTEN LOS RESOURCES, QUE ES LEER DE ARCHIVOS.

/* Resource: tipo especial que hace referencia a recursos externos como archivos o conexiones
$Resource = fopen("archivo.txt", "w");

// Mostrar los tipos y valores
var_dump($String);
var_dump($Integer);
var_dump($Float);
var_dump($Boolean);
var_dump($Array);
var_dump($Object);
var_dump($NULL);
var_dump($Resource);

// Cerrar el recurso después de usarlo
fclose($Resource); */

?>

<?php 

/* -------------------------------------------- SCOPE DE LAS VARIABLES -------------------------------------------- */
// El scope es como es declarada la variable, si globalmente, localmente o estaticamente

// Para acceder a una variable global, como por ejemplo $x desde una función, utilizamos $GLOBALS, que es un array con todas las variables locales.
// En donde la posicion es el nombre de la variable.

$x = 10;
$y = 10;

function imprimirVariableGlobal() {
    echo $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

imprimirVariableGlobal();

?>

<?php

/* -------------------------------------------- MANERAS DE IMPRIMIR -------------------------------------------- */

echo "<br>Imprimir con echo";
print("<br>Imprimir con print"); // No es recomendable usar así el html. Es muy tedioso.

$nombre = 'Pablo';
// Siempre que queramos imprimir variables, utilizar las comillas dobles, con las simples no lo hace:
// Se puede apreciar facilmente en el VSC:

echo "<br>Mi nombre es $nombre";
echo '<br>Mi nombre es $nombre';

?>

<?php

/* -------------------------------------------- VARIABLES SUPERGLOBALES -------------------------------------------- */

// TANTO EL SESSION START COMO EL SETCOOKIE DEBO DE PONERLOS LO MAS ARRIBA POSIBLE PARA QUE FUNCIONE BIEN, LEER MAS SOBRE ELLO.

// Crear una cookie 
setcookie("usuario", "Juan", time() + 3600);

// Crear una sesión de usuario.
session_start(); // Necesario para usar $_SESSION

// 1. $GLOBALS: accede a variables globales desde cualquier parte del script
$mensaje = "Hola desde global";
function mostrarGlobal() {
    echo "<p><strong>\$GLOBALS:</strong> " . $GLOBALS['mensaje'] . "</p>";
}
mostrarGlobal();

// 2. $_SERVER: información del servidor y entorno de ejecución
echo "<p><strong>\$_SERVER['SERVER_NAME']:</strong> " . $_SERVER['SERVER_NAME'] . "</p>";

// 3. $_REQUEST: combina $_GET, $_POST y $_COOKIE
// Parecido a RequestParam
echo "<p><strong>\$_REQUEST['dato']:</strong> " . ($_REQUEST['dato'] ?? 'Sin dato') . "</p>";

// 4. $_POST: datos enviados por formulario método POST
echo "<p><strong>\$_POST['nombre']:</strong> " . ($_POST['nombre'] ?? 'Sin nombre (POST)') . "</p>";

// 5. $_GET: datos enviados por URL (query string)
echo "<p><strong>\$_GET['nombre']:</strong> " . ($_GET['nombre'] ?? 'Sin nombre (GET)') . "</p>";

// 6. $_FILES: Archivos subidos en el formulario
if (!empty($_FILES['archivo'])) {
    echo "<p><strong>\$_FILES['archivo']['name']:</strong> " . $_FILES['archivo']['name'] . "</p>";
}


// 7. $_ENV: variables de entorno (normalmente configuradas en el entorno del servidor)
echo "<p><strong>\$_ENV['PATH']:</strong> " . ($_ENV['PATH'] ?? 'No disponible') . "</p>";

// De esta manera tendriamos que volver a escribir en cada archivo este atributo.
date_default_timezone_set("Europe/Madrid"); // Zona horaria para España
echo "La hora actual en España es: " . date("H:i:s");

// Esta manera serviría para almacenarla globalmente para mas archivos.
$_ENV['TIMEZONE'] = "Europe/Madrid";
date_default_timezone_set($_ENV['TIMEZONE']);
echo "<br>La hora actual en " . $_ENV['TIMEZONE'] . " es: " . date("H:i:s");





// 8. $_COOKIE: cookies del usuario
echo "<p><strong>\$_COOKIE['usuario']:</strong> " . ($_COOKIE['usuario'] ?? 'Sin cookie') . "</p>";

// 9. $_SESSION: datos guardados en la sesión
$_SESSION['rol'] = "admin";
echo "<p><strong>\$_SESSION['rol']:</strong> " . $_SESSION['rol'] . "</p>";

?>

<!-- Formulario para probar POST, FILES, y REQUEST -->
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Tu nombre (POST)">
    <input type="file" name="archivo">
    <button type="submit">Enviar</button>
</form>

