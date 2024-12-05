<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_usuario.css">
    <script src="https://kit.fonttawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/scriptform.js"></script>
</head>
<body>
    <div class="form-container">
        <form id="registerForm" action="registro_usuarios.php" method="POST" onsubmit="return validateForm()"> 
            <h4>Registro de Usuarios</h4>
                <div class="image-container center">
                    <img src="../img/mickey.svg" alt="Imagen de perfil" style="border-radius: 50%; width: 100px;"> 
                </div>
                <div class="input-field">
                    <select id="user_type" name="user_type">
                        <option value="" disabled selected>Seleccionar Usuario</option> 
                        <option value="admin">Administrador</option>
                        <option value="editor">Editor</option>
                        <option value="viewer">Visualizador</option> 
                    </select>
                    <label for="user_type">Tipo de Usuario</label> 
                </div>
                <div class="input-field">
                    <input type="text" id="username" name="username">
                    <label for="username">Nombre de Usuario</label>
                </div>
                <div class="input-field">
                    <input type="email" id="email" name="email">
                    <label for="email">Correo Electrónico</label>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password"> <label for="password">Contraseña</label>
                </div>
                <div class="center">
                <button class="btn waves-effect waves-light" type="submit">Registrarse</button>
            </div>
        </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    

</body>
</html>