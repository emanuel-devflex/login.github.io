<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Productos</title>
    <!-- Incluir Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- Importar fontawesome js para iconos-->
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <h4 class="center-align">Registro de Productos <i class="fa-solid fa-cart-shopping"></i></h4>
    <?php
    session_start(); // Iniciar la sesión
    
    include '../modelo/conexion_usuario.php';
    
    // Verificar si el formulario fue enviado
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $product_type = limpiar_dato($_POST["product_type"]);
        $username = limpiar_dato($_POST["username"]);
        $descripcion = limpiar_dato($_POST["descripcion"]);
        $cantidad = limpiar_dato($_POST["cantidad"]);
        $precio = limpiar_dato($_POST["precio"]);

        // Validar datos
        if (empty($username)) {
            echo '<div class="card-panel red white-text">El nombre no puede estar vacío.</div>';
        }else {

            // Preparar y ejecutar la inserción
            $sql = "INSERT INTO productos (categoria ,nombre, descripcion, cantidad, precio) VALUES ( ?, ?, ?, ?, ?) ";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss",$product_type, $username ,$descripcion, $cantidad, $precio);

            if ($stmt->execute()) {
                // Guardar información en la sesión
                $_SESSION['categoria'] = $product_type;
                $_SESSION['nombre'] = $username;

                    // Mostrar el mensaje de éxito
                    echo '<div class="card-panel green white-text">Registro exitoso. Redirigiendo...</div>';

                    // Redirigir después de 5 segundos (5000 milisegundos)
                    echo '
                        <script type="text/javascript"> 
                            setTimeout(function(){
                            window.location.href = "dashboard.php"; 
                            }, 5000); // Redirige después de 3 segundos
                        </script>';

                    } else {
                        echo '<div class="card-panel red white-text">Error al registrar: error ' . $stmt-> 
                            error . '</div>';
                    }
                    // Cerrar la declaración y la conexión
                    $stmt->close();
                    $conn->close();
                }
            }
        ?>
        
        <!-- Botón para regresar a index.php -->
        <div class="center-align">
            <a href="dashboard.php" class="btn blue"><i class="fa-solid fa-arrow-left"></i>
            Regresar</a>
        </div>
    </div>

    <!-- Incluir Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>