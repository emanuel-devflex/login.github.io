<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            session_start();
            include '../modelo/conexion_usuario.php'; // Incluir la conexión a la base de datos

            // Verificar si el usuario ha iniciado sesión y si tiene permisos para modificar
            if (!isset($_SESSION['product_type']) || !in_array($_SESSION['product_type'], ['Ropa', 'Muebles', 'Electronico'])) {
                // Si no tiene permiso o no ha iniciado sesión, redirigir a la página de inicio de sesión
                header("Location: ../vista/dashboard.php");
                exit();
            }

            // Verificar si se ha proporcionado el ID del producto a modificar
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']); // Asegurarse de que el ID sea un número

                // Obtener los datos del producto de la base de datos
                $sql = "SELECT id, categoria, nombre, descripcion, cantidad, precio FROM productos WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $producto = $result->fetch_assoc();

                // Verificar si se encontró el producto
                if (!$producto) {
                    echo '<div class="card-panel red white-text">Error: Producto no encontrado.</div>';
                    exit();
                }else {
                    echo '<div class="card-panel red white-text">Error: ID de Producto no proporcionado.</div>';
                    exit();
                }
    
            } 
            // Procesar el formulario de modificación
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $categoria = htmlspecialchars(trim($_POST["categoria"]));
                $nombre = htmlspecialchars(trim($_POST["nombre"]));
                $descripcion = htmlspecialchars(trim($_POST["descripcion"]));
                $cantidad = htmlspecialchars(trim($_POST["cantidad"]));
                $precio = htmlspecialchars(trim($_POST["precio"]));

                // Actualizar los datos del producto en la base de datos
                $sql = "UPDATE productos SET categoria=?, nombre=?, descripcion=?, cantidad=?, precio=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $categoria, $nombre, $descripcion, $cantidad, $precio, $id);

                if ($stmt->execute()) {
                    // Si la actualización fue exitosa, redirigir a mostrarProductos.php
                    header("Location: ../vista/mostrar_productos.php?mensaje=Producto actualizado correctamente.");
                    exit();
                } else {
                    echo '<div class="card-panel red white-text">Error al actualizar el producto: ' . $stmt->error . '</div>';
                }
            }
        ?>
        <h4 class="center-align">Modificar Producto</h4>

        <!-- Formulario de modificación de producto -->
        <div class="row">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" type="text" name="username" value="<?php echo htmlspecialchars($producto['username']); ?>" required>
                        <label for="username">Nombre del Producto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="product_type" type="text" name="product_type" value="<?php echo htmlspecialchars($producto['product_type']); ?>" required>
                        <label for="product_type">Categoría</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="descripcion" type="text" name="descripcion" value="<?php echo htmlspecialchars($producto['descripcion']); ?>" required>
                        <label for="descripcion">Descripción</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="cantidad" type="number" name="cantidad" value="<?php echo htmlspecialchars($producto['cantidad']); ?>" required>
                        <label for="cantidad">Cantidad</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="precio" type="text" step="0.01" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
                        <label for="precio">Precio</label>
                    </div>
                </div>
                <div class="row center-align">
                    <button class="btn waves-effect waves-light blue" type="submit">Guardar Cambios</button>
                    <a href="mostrar_productos.php" class="btn grey">Salir</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluir Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>
