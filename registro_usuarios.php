<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Incluir Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css
    " rel="stylesheet">
    <!-- Importar fontawesome js para iconos-->
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <h4 class="center-align">Registro de Usuario <i class="fa-solid fa-id-card"></i></h4>
    <?php
    session_start(); // Iniciar la sesión
    
    include '../modelo/conexion_usuario.php';
    
    // Verificar si el formulario fue enviado
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $username = limpiar_dato($_POST["username"]);
        $email = limpiar_dato($_POST["email"]);
        $password = limpiar_dato($_POST["password"]);
        $user_type = limpiar_dato($_POST["user_type"]);

        // Validar datos
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="card-panel red white-text">Correo electrónico no válido.</div>';
        } else {
            // Encriptar la contraseña antes de almacenarla
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // Preparar y ejecutar la inserción
            $sql = "INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?) ";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $email, $password_hash, $user_type);

            if ($stmt->execute()) {
                // Guardar información en la sesión
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $user_type;

                    // Mostrar el mensaje de éxito
                    echo '<div class="card-panel green white-text">Registro exitoso. Redirigiendo...</div>';

                    // Redirigir después de 5 segundos (5000 milisegundos)
                    echo '
                        <script type="text/javascript"> 
                            setTimeout(function(){
                            window.location.href = "login_usuario.php";
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
            <a href="login_usuario.php" class="btn blue"><i class="fa-solid fa-arrow-left"></i>
            Iniciar Sesión</a>
        </div>
    </div>

    <!-- Incluir Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    
</body>
</html>