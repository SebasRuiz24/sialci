window.onload = function () {
    var formularioContainer = document.getElementById('formularioContainer');
    window.scrollTo(0, formularioContainer.offsetTop);
};

$(document).ready(function() {
    // Manejar el clic en el enlace "Agregar más"
    $('.add-more').click(function(e) {
        e.preventDefault(); // Evitar el comportamiento predeterminado del enlace
        var fields = $(this).prev('.fields'); // Obtener el contenedor de campos
        var clone = fields.clone(); // Clonar los campos

        // Limpiar los valores de los campos clonados
        clone.find('input[type="text"], input[type="email"], input[type="number"]').val('');

        // Agregar el clon después del contenedor original
        fields.after(clone);
    });
});

window.onload = function() {
    window.scrollTo(0, 0); // Desplaza la ventana hacia la parte superior cuando la página se carga
}


