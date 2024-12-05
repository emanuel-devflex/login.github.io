<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Incluir Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    rel="stylesheet">
    <!-- Importar fontawesome js para iconos-->
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <?php
session_start();
include '../modelo/conexion_usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = limpiar_dato($_POST["username"]); 
    $password = limpiar_dato($_POST["password"]);

    // Consulta para verificar las credenciales de login
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
        // Iniciar sesión
        $_SESSION['username'] = $user ['username'];
        $_SESSION['user_type'] = $user['user_type'];
        // Redirigir al dashboard Mostrar Usuarios
        header("Location: ../vista/dashboard.php");
        exit();
        } else {
        echo '<div class="card-panel red white-text">Contraseña incorrecta.</div>';
        }
        } else {
        echo '<div class="card-panel red white-text">Usuario no encontrado.</div>';
        }
        // Cerrar la declaración y la conexión
        $stmt->close();
        $conn->close();
        }
        ?>
        <!--
        Botón para regresar a Login --> <div class="center-align">
        <a href="../vista/login_usuario.php" class="btn blue"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
        </div>
        </div>
</body>
</html>