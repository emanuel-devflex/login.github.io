// Inicializando los selects de Materialize 
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});
// Función de validación del formulario
function validateForm() {
    // Validar Tipo de Usuario
    const userType = document.getElementById('user_type');
    if (userType.value === "") { 
        M.toast({html: 'Por favor selecciona un tipo de usuario', classes: 'red'}); 
        return false;
    }

    const username = document.getElementById('username').value;
    if (username.length < 3) {
    M.toast({html: 'El nombre de usuario debe tener al menos 3 caracteres', classes: 'red'}); 
    return false;
}
    const email = document.getElementById('email').value; 
    const emailPattern = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        M.toast({html: 'Por favor ingresa un correo electrónico válido', classes: 'red'}); 
        return false;
        }

    const password = document.getElementById('password').value;
    if (password.length < 6) {
        M.toast({html: 'La contraseña debe tener al menos 6 caracteres', classes: 'red'}); 
        return false;
    }

    return true;
}