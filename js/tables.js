// ordena la tabla: orden y nombre.
let sortDirection = 1; // forma ascendente

document.addEventListener("DOMContentLoaded", function() { //se ejecuta cuando la página está completamente cargada.
    let thElements = ["orden", "nombre"].map(id => document.getElementById(id)); //obtiene los encabezados de la tabla: orden y nombre.
    thElements.forEach((thElement, i) => {
        thElement.addEventListener("click", function() {
            let registros = Array.from(document.querySelector('table').querySelectorAll('tbody > tr'));

            registros.sort(function (a, b) { //ordena las filas.
                let valor1 = a.children[i].textContent.toUpperCase();
                let valor2 = b.children[i].textContent.toUpperCase();

                if (!isNaN(valor1) && !isNaN(valor2)) {
                    // Si los valores son numéricos, los ordenamos como números
                    return valor1 - valor2;
                } else {
                    // Si los valores no son numéricos, los ordenamos como cadenas de texto
                    return valor1 < valor2 ? -1 : valor1 > valor2 ? 1 : 0;
                }
            });

            if (sortDirection === 1) registros.reverse();
            sortDirection *= -1; // cambia la direccion cada vez que ordenas

            let tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            registros.forEach(function (elemento) {
                tbody.appendChild(elemento);
            });
        });
    });
});

