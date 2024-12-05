<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!-- Incluir Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    rel="stylesheet">
    <!-- Importar fontawesome js para iconos-->
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
    <script src="../js/carrusel_usuarios.js"></script>
</head>
<body>

<div class="container">

    <?php
        session_start(); // Iniciar sesión
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="card-panel green white-text">' . htmlspecialchars($_GET['mensaje']) . '</div>';
        } else {
            if (isset($_SESSION['username'])) {
                echo '<div id="bienvenida" class="card-panel green white-text">Bienvenido al Sistema de Gestión de Usuarios, ' .
                    htmlspecialchars($_SESSION['username']) . '!</div>';
            } else {
                header("Location: login_usuario.php");
                exit();
            }
        }
    ?>

<h4 class="center-align">Lista de Usuarios Registrados en el sistema <i class="fa-solid fa-users"></i></h4>
        <!-- Carrusel de Materialize -->
        <div class="carousel">
            <a class="carousel-item" href="#one!"><img src="../img/donal.png" alt="Imagen 1"></a>
            <a class="carousel-item" href="#two!"><img src="../img/mickey.png" alt="Imagen 2"></a>
            <a class="carousel-item" href="#three!"><img src="../img/pete.png" alt="Imagen 3"></a> 
            <a class="carousel-item" href="#four!"><img src="../img/raton.png" alt="Imagen 4"></a>
            <a class="carousel-item" href="#five!"><img src="../img/pluto.png" alt="Imagen 5"></a>
        </div>

        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Usuario</th>
                    <th>Email</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        <tbody>
        <?php
            include '../modelo/conexion_usuario.php'; // Incluir la conexión a la base de datos
            $sql = "SELECT id, username, email, user_type FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows> 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']). "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) ."</td>";
                    echo "<td>" . htmlspecialchars($row['user_type']) . "</td>";
                    echo "<td>";
                    if ($_SESSION['user_type'] = 'editor' || $_SESSION['user_type'] = 'admin') {
                            echo '<a href="../vista/modificar_usuario.php" class="btn blue">Modificar</a>';
                    } else {
                            echo '<a class="btn disabled">Modificar</a>';
                    }
                    if ($_SESSION['user_type'] = 'admin') {
                        echo '<a href="#confirmModal" class="btn red modal-trigger eliminar-usuario">Eliminar</a>';
                    } else {
                        echo '<a class="btn disabled">Eliminar</a>';
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay usuarios registrados.</td></tr>";
            }
            $conn->close();
                ?>
            </tbody>
        </table>


    <!-- Incluir Materialize J5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</div>
</body