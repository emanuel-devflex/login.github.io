// Inicializando los selects de Materialize 
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});
// Función de validación del formulario
function validateForm() {
    // Validar la categoria del producto
    const product_type = document.getElementById('product_type');
    if (product_type.value === "") { 
        M.toast({html: 'Por favor selecciona un tipo de categoria', classes: 'red'}); 
        return false;
    }
    // Validar Nombre del producto
    const username = document.getElementById('username').value;
    if (username.length < 1) {
    M.toast({html: 'Ingrese un producto', classes: 'red'}); 
    return false;
    }
    const descripcion = document.getElementById('descripcion').value;
    if (descripcion.length < 1) {
    M.toast({html: 'Ingrese una descripcion del producto', classes: 'red'}); 
    return false;
    }
    const cantidad = document.getElementById('cantidad').value;
    if (cantidad.length < 1) {
    M.toast({html: 'Ingrese una cantidad', classes: 'red'}); 
    return false;
    }
    const precio = document.getElementById('precio').value;
    if (precio.length < 1) {
    M.toast({html: 'Ingrese el precio del producto', classes: 'red'}); 
    return false;
    }


    // Si todas las validaciones pasan, permitir el envío del formulario
    return true;
}