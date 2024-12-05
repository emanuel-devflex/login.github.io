// Inicializar el carrusel
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instance = M. Carousel.init(elems, {
    duration: 200,
    dist: -50,
    shift: 5,
    padding: 20,
    numVisible: 3,
    indicators: true
    });
    // Pasar automáticamente cada 2 segundos
    setInterval(function() {
    instance[0].next(); // Avanza al siguiente item
    }, 2000); // 2000 ms 2 segundos
});