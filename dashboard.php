<?php
session_start(); 

if (!isset($_SESSION['username'])) {  
    header("Location: login_usuario.php");
    exit();
}

$username = $_SESSION['username'];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$user_type = $_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styledash.css">
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Botón de menú móvil -->
    <a href="#" data-target="slide-out" class="sidenav-trigger btn-floating btn-large blue hide-on-large-only" 
        style="position: fixed; top: 20px; left: 20px;">
        <i class="fas fa-bars"></i>
    </a>

    <!-- Sidenav -->
    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="../img/fondoDash.jpg" alt="Background">
                </div>
                <a href="#user"><img class="circle responsive-img" src="../img/usuario.png" alt="User"></a>
                <a href="#name"><span class="white-text name"><?php echo htmlspecialchars($username); ?></span></a>
                <a href="#email"><span class="white-text email"><?php echo htmlspecialchars($email); ?></span></a>
            </div>
        </li>
        <li><a href="#!"><i class="fas fa-home"></i> Inicio</a></li>
        <li><a href="#!"><i class="fas fa-user"></i> Tipo de Usuario: <?php echo htmlspecialchars($user_type); ?></a></li>
        <li><a href="#!"><i class="fas fa-cogs"></i> Configuración</a></li>
        <li><a href="#!"><i class="fas fa-chart-line"></i> Estadísticas</a></li>
        <li><a href="#!"><i class="fas fa-envelope"></i> Mensajes</a></li>
        <li><a href="../vista/nuevo_producto.php"><i class="fa-solid fa-cart-shopping"></i> Agregar Producto</a></li>
        <li><div class="divider"></div></li>
        <li><a href="../vista/login_usuario.php" class="red-text"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
    </ul>

    <!-- Contenido principal -->
    <main class="container">
        <h2>Bienvenido, <?php echo htmlspecialchars($username); ?>!</h2>
        <h4>Resumen del Dashboard</h4>
        <p>Aquí puedes ver estadísticas, administrar tu perfil y acceder a todas las herramientas disponibles.</p>

        <div class="row">
            <div class="col s12 m6">
                <div class="card user-card card-link" onclick="location.href='mostrar_usuarios.php'">
                    <div class="card-content">
                        <span class="card-title"><i class="fas fa-users"></i> Registro de Usuarios</span>
                        <p>Administra y registra nuevos usuarios en el sistema.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m6">
                <div class="card product-card card-link" onclick="location.href='mostrar_productos.php'">
                    <div class="card-content">
                        <span class="card-title"><i class="fas fa-box"></i> Registro de Productos</span>
                        <p>Administra y registra nuevos productos en el sistema.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        M.Sidenav.init(elems, {edge: 'left'});
    });
    </script>

</body>
</html>
