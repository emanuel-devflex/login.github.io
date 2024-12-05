<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            session_start();
            include '../modelo/conexion_usuario.php'; // Incluir la conexión a la base de datos

            // Verificar si el usuario ha iniciado sesión y si tiene permisos para modificar
            if (!isset($_SESSION['username']) || ($_SESSION['user_type'] != 'editor' && $_SESSION['user_type'] != 'admin')) {
                // Si no tiene permiso o no ha iniciado sesión, redirigir a la página de inicio de sesión
                header("Location: dashboard.php");
                exit();
            }

            // Verificar si se ha proporcionado el ID del producto a modificar
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']); // Asegurarse de que el ID sea un número

                // Obtener los datos del producto de la base de datos
                $sql = "SELECT id, username, email, user_type FROM users WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                // Verificar si se encontró el producto
                if (!$user) {
                    echo '<div class="card-panel red white-text">Error: Usuario no encontrado.</div>';
                    exit();
                } else {
                    echo '<div class="card-panel red white-text">Error: ID de Usuario no proporcionado.</div>';
                    exit();
                }
            }

            // Procesar el formulario de modificación
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $username = htmlspecialchars(trim($_POST["username"]));
                $email = htmlspecialchars(trim($_POST["email"]));

                    if($_SESSION['user_type'] !='admin'){
                        $user_type = htmlspecialchars(trim($_POST["user_type"]));
                    } else {
                        $user_type = $user['user_type'];
                    }

                // Actualizar los datos del producto en la base de datos
                $sql = "UPDATE users SET username = ?, email = ?, user_type = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $username, $email, $user_type, $id);

                if ($stmt->execute()) {
                    // Si la actualización fue exitosa, redirigir a mostrarProductos.php
                    header("Location: mostrar_usuarios.php");
                    exit();
                } else {
                    echo '<div class="card-panel red white-text">Error al actualizar el Usuario: ' . $stmt->error . '</div>';
                }
            }
        ?>

        <!-- Formulario de modificación de producto -->
        <h4 class="center-align">Modificar Usuario</h4>
            <div class="row">
                <form class="col s12" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                <label for="username">Nombre de Usuario</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                <label for="email">Correo Electrónico</label>
                            </div>
                        </div>

                        <?php if ($_SESSION['user_type'] == 'admin') : ?>
                        <div class="row">
                            <div class="input-field col s12">
                                <select name="user_type" required>
                                    <option value="viewer" <?php if ($user['user_type'] == 'viewer') echo 'selected'; ?>>Viewer</option>
                                    <option value="editor" <?php if ($user['user_type'] == 'editor') echo 'selected'; ?>>Editor</option>
                                    <option value="admin" <?php if ($user['user_type'] == 'admin') echo 'selected'; ?>>Admin</option>
                                </select>
                                <label>Tipo de Usuario</label>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row center-align">
                            <button class="btn waves-effect waves-light blue" type="submit">Guardar Cambios</button>
                            <a href="mostrar_usuarios.php" class="btn grey">Salir</a>
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
