"use strict";
//crear contenedores
/*
1. var= global
2. let = local - variables
3. const = constantess*/

const btnValidar = document.getElementById("validar");


//console.log(btValidar);
//Al addEventlistener debo pasar dos paramentros
let nOrden = 1;
btnValidar.addEventListener("click", function (e) {
    e.preventDefault();

    const orden = document.querySelector("main");
    let form = document.getElementById("dataForm");
    if (nOrden == 1) {
        const title = document.createElement("h2");
        title.textContent = "Ordenes creadas";
        orden.appendChild(title);
    }
    const idOrden = document.createElement("p");
    idOrden.textContent = "EL Numero de orden es " + nOrden;
    idOrden.className = "TAgregado";
    orden.appendChild(idOrden);

    const Nombre = document.createElement("p");
    Nombre.textContent = "Nombre del cliente: " + form[0].value;
    Nombre.className = "TAgregado";
    orden.appendChild(Nombre);

    const telefono = document.createElement("p");
    telefono.textContent = "Numero de telefono: " + form[1].value;
    telefono.className = "TAgregado";
    orden.appendChild(telefono);

    const producto = document.createElement("p");
    producto.textContent = "El producto seleccionado es: " + form[2].value;
    producto.className = "TAgregado";
    orden.appendChild(producto);

    const Cantidades = document.createElement("p");
    Cantidades.textContent = "Las cantidades es: " + form[3].value;
    Cantidades.className = "TAgregado";
    orden.appendChild(Cantidades);

    const precio = document.createElement("p");
    precio.textContent = "El precio final es: " + form[4].value;
    precio.className = "TAgregado";
    orden.appendChild(precio);

    const salto = document.createElement("br");
    orden.appendChild(salto);

   
    nOrden++;


});
