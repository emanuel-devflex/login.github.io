function validateForm() {
    // Obtener valores de los campos
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    // Validar que no estén vacíos
    if (username === "") {
        M.toast({html: 'Por favor, ingrese su nombre de usuario.', classes: 'red darken-1'});
        return false; // Impedir envío del formulario
    }
    if (password === "") {
        M.toast({html: 'Por favor, ingrese su contraseña.', classes: 'red darken-1'});
        return false; // Impedir envío del formulario
    }
    // Si todo está correcto, permitir el envío
    return true;
    }