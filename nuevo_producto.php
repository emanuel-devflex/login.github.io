<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style_producto.css">
    <script src="https://kit.fonttawesome.com/6a99d12e52.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/script_producto.js"></script>

</head>
<body>
<div class="form-container">
        <form id="registerForm" action="registro_producto.php" method="POST" onsubmit="return validateForm()"> 
            <h4>Registro de Productos</h4>
                <div class="image-container center">
                    <img src="../img/logoCompra.jpg" alt="Imagen de perfil" style="border-radius: 50%; width: 100px;"> 
                </div>
                <div class="input-field">
                    <select id="product_type" name="product_type">
                        <option value="" disabled selected>Seleccionar</option> 
                        <option value="Ropa">Ropa</option>
                        <option value="Muebles">Muebles</option>
                        <option value="Electronico">Electronico</option> 
                    </select>
                    <label for="product_type">Categoria</label> 
                </div>
                <div class="input-field">
                    <input type="text" id="username" name="username">
                    <label for="username">Nombre</label>
                </div>
                <div class="input-field">
                    <input type="text" id="descripcion" name="descripcion">
                    <label for="descripcion">Descripcion</label>
                </div>
                <div class="input-field">
                    <input type="number" id="cantidad" name="cantidad" min="0">
                    <label for="cantidad">Cantidad</label>
                </div>
                <div class="input-field">
                    <input type="text" id="precio" name="precio" >
                    <label for="precio">Precio</label>
                </div>
                <div class="center">
                <button class="btn waves-effect waves-light" type="submit">Registrar Productos</button>
            </div>
        </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>