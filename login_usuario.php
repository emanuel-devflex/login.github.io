<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <!-- Incluir Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../css/style_login.css">
    <!-- Importar fontawesome js para iconos-->
    <script src="https://kit.fontawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container form-container">
        <h4 class="center-alingn">Iniciar Sesion</h4>
        <div class="image-container center">
            <img src="https://cdn-icons-png.flaticon.com/128/17932/17932431.png" alt="Imagen de perfil" style="border-radius: 50%; width: 100px;">
        </div>

        <!--Formulario de inicio de sesion centrado-->
        <div class="row">
            <form  class="cols 12" action="../controlador/procesar_login.php" method="POST"
            onsubmit="return validateForm()">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="fas fa-user prefix"></i>
                        <input id="username" type="text" name="username" class="validate">
                        <label for="username">Nombre de Usuario</label>
                    </div>
                </div>    
                <div class="row">
                    <div class="input-field col s12">
                        <i class="fas fa-lock prefix"></i>
                        <input id="password" type="password" name="password" class="validate">
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                <div class="row center-align">
                    <button class="btn waves-effect waves-light blue" type="submit" name="action">
                        Iniciar Sesión <i class="fa-solid fa-user-lock"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Enlace para regresar a la página de registro de usuario -->
        <div class="center-align">
            <a href="../vista/nuevo_usuario.php" class="green-text text-darken-2">
                Todavía no tengo una cuenta,
                <u><em>CREAR</em></u>
            </a>
        </div>
    </div>
    <!-- Incluir Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../js/script_login.js"></script>
</body>
</html>