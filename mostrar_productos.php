<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!-- Incluir Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    rel="stylesheet">
    <link rel="stylesheet" href="../css/style_tablaproducto.css">
    <!-- Importar fontawesome js para iconos-->
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
    <script src="../js/carrusel_producto.js"></script>
</head>
<body>
<div class="container">
    <?php
        session_start(); // Iniciar sesión
        if (isset($_GET['mensaje'])) {
            echo '<div id="mensaje" class="card-panel green white-text">' . htmlspecialchars($_GET['mensaje']) . '</div>';
        } else {
            if (isset($_SESSION['username'])) {
                echo '<div id="bienvenida" class="card-panel green white-text">Bienvenido al Sistema de Gestión de Productos ' . '!</div>';
            } else {
                header("Location: nuevo_producto.php");
                exit();
            }
        }
    ?>

    <h4 class="center-align">Lista de Productos Registrados en el sistema <i class="fa-solid fa-cart-shopping"></i></h4>
        <!-- Carrusel de Materialize -->
        <div class="carousel">
            <a class="carousel-item" href="#one!"><img src="../img/licuadora.jpg" alt="Imagen 1"></a>
            <a class="carousel-item" href="#two!"><img src="../img/mesa.jpg" alt="Imagen 2"></a>
            <a class="carousel-item" href="#three!"><img src="../img/plancha.jpg" alt="Imagen 3"></a> 
            <a class="carousel-item" href="#four!"><img src="../img/polo.jpg" alt="Imagen 4"></a>
            <a class="carousel-item" href="#five!"><img src="../img/sillon.jpg" alt="Imagen 5"></a>
        </div>

        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Nombre del Producto</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
        <?php
            include '../modelo/conexion_usuario.php'; // Incluir la conexión a la base de datos
            $sql = "SELECT id, categoria, nombre, descripcion, cantidad, precio FROM productos";
            $result = $conn->query($sql);
            if ($result->num_rows> 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']). "</td>";
                    echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nombre']) ."</td>";
                    echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
                    echo "<td>";
                    if ($_SESSION['product_type'] = 'Ropa' || $_SESSION['product_type'] = 'Muebles' || $_SESSION['product_type'] = 'Electronico') {
                            echo '<a href="modificar_productos.php" class="btn blue">Modificar</a>';
                    } else {
                            echo '<a class="btn disabled">Modificar</a>';
                    }
                    if ($_SESSION['product_type'] = 'Ropa' || $_SESSION['product_type'] = 'Muebles' || $_SESSION['product_type'] = 'Electronico') {
                        echo '<a href="#confirmModal" class="btn red modal-trigger eliminar-producto">Eliminar</a>';
                    } else {
                        echo '<a class="btn disabled">Eliminar</a>';
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay producto registrados.</td></tr>";
            }
            $conn->close();
                ?>
            </tbody>
        </table>


    <!-- Incluir Materialize J5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</div>
</body>
</html>