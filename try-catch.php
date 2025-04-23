<!DOCTYPE html>
<html>
<body>

<?php

// Para ver errores en producción.
ini_set('display_errors', 0);
error_reporting(E_ALL);

//Ejemplo perfecto de Try/Catch

function divide($dividend, $divisor) {
  if($divi1or == 0) {
    throw new Exception("Division by zero");
  }
  return $dividend / $divisor;
}

try {
  echo divide(5, 0);
  
} catch(Exception $e) {
  	echo "Hubo un error al dividir:<br> " . $e->getMessage();
}
?>

</body>
</html>