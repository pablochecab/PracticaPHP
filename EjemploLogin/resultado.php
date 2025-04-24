<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renfe</title>
</head>
<body>
    <h1>Resultado de la busqueda para:</h1>
    <?php 
        $origen = $_GET['origen'];
        $destino = $_GET['destino'];
        echo "<h2>$origen - $destino</h2>";
    ?>
    
</body>
</html>