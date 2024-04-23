//variable que mantiene el estado visible del carrito
var carritoVisible = false;

//Esperamos que todos los elementos de la página se carguen para continuar con el script
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded',ready)
}else{
    ready();
}

function ready(){
    //botones eliminar del carrito
    var botonesEliminarItem = document.getElementsByClassName('btn-eliminar');
    for(var i=0;i<botonesEliminarItem.length;i++){
        var button = botonesEliminarItem[i];
        button.addEventListener('click', eliminarItemCarrito);
    }

    //boton sumar
    var botonesSumarCantidad = document.getElementsByClassName('sumar-cantidad');
    for(var i=0; i < botonesSumarCantidad.length; i++){
        var button = botonesSumarCantidad[i];
        button.addEventListener('click', sumarCantidad);
    }

    //boton restar
    var botonesRestarCantidad = document.getElementsByClassName('restar-cantidad');
    for(var i=0; i < botonesRestarCantidad.length; i++){
        var button = botonesRestarCantidad[i];
        button.addEventListener('click', restarCantidad);
    }

    //botones para agregar al carrito
    var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
    for(var i=0 ; i<botonesAgregarAlCarrito.length ; i++){
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked);
    }

    //boton pagar
    document.getElementsByClassName('btn-pagar')[0].addEventListener('click', pagarClicked);
}

//Elimino el item seleccionado del carrito
function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();

    //Actualizamos el total
    actualizarTotal();
    //si no hay elementos en el carrito ocultar el carrito
    ocultarCarrito();
}

//Actualiza el total del carrito
function actualizarTotal(){
    //seleccionamos el contenedro del carrito
    var carritoContenedor = document.getElementsByClassName('carrito')[0];
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
    var total = 0;

    //recorremos cada elemento del carrito para actualizar el total
    for(var i=0;i<carritoItems.length;i++){
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
        console.log(precioElemento);
        //dar formato (quita simboilo y punto de milesima)
        var precio = parseFloat(precioElemento.innerText.replace('$',''));
        console.log(precio);
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
        var cantidad = cantidadItem.value;
        console.log(cantidad);
        total =total + (precio * cantidad);
    }
    //total = Math.round(total*100)/100;
    document.getElementsByClassName('carrito-precio-total')[0].innerText = '$'+total.toLocaleString("es");
}

function ocultarCarrito(){
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if(carritoItems.childElementCount == 0){
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '-100%';
        carrito.style.opacity= '0';
        carritoVisible = false;

        //ahora maximizamos el contenedor de los productos
        var items = document.getElementsByClassName('contenedor-items')[0];
        items.style.width = '100%'
    }
}

function sumarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    console.log(cantidadActual);
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    //Actualizamos el total
    actualizarTotal(); //llamamos a la funcion que calcula el total del carrito
}

function restarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    console.log(cantidadActual);
    cantidadActual--;

    //controlamos que no sea menor a 1
    if(cantidadActual>=1){
        selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
        //Actualizamos el total
        actualizarTotal(); //llamamos a la funcion que calcula el total del carrito
    }   
}

function agregarAlCarritoClicked(event){
    var button = event.target;
    var item = button.parentElement;
    var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
    console.log(titulo);
    var precio = item.getElementsByClassName('precio-item')[0].innerText;
    var imagenSrc = item.getElementsByClassName('img-item')[0].src;
    console.log(imagenSrc);

    //agregar elementos al carrito (mando parámetros)
    agregarItemAlCarrito(titulo, precio, imagenSrc);

    //hacer visible el carrito cuadno se agrega un producto por primera vez
    hacerVisibleCarrito();
}

function agregarItemAlCarrito(titulo, precio, imagenSrc){
    var item = document.createElement('div'); //crea un nuevo elemento div
    item.classList.add = 'item'; // Agregar la clase 'item' al nuevo elemento
    var itemsCarrito = document.getElementsByClassName('carrito-items')[0]; // Obtener el primer elemento con la clase 'carrito-items'

    //verificamos que el elemento que se esta ingresando no esta en el carrito
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
    for(var i=0 ; i<nombresItemsCarrito.length ; i++){
        if(nombresItemsCarrito[i].innerText == titulo){
            alert("El item ya se encuentra en el carrito");
            return;
        }
    }
     // Crear el contenido HTML del elemento del carrito
    var itemsCarritoContenido =`
        <div class="carrito-item">
        <img src="${imagenSrc}" alt="" width="80px">
        <div class="carrito-item-detalles">
        <span class="carrito-item-titulo">${titulo}</span>
        <div class="selector-cantidad"> 
        <i class="fa-solid fa-minus restar-cantidad"></i>
        <input type="text" value="1" class="carrito-item-cantidad" disabled>
        <i class="fa-solid fa-plus sumar-cantidad"></i>
            </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <span class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </span>
        </div>
        `;
        item.innerHTML = itemsCarritoContenido; // Insertar el contenido HTML en el nuevo elemento
        itemsCarrito.append(item); // Agregar el nuevo elemento al contenedor 'carrito-items'

        //agregamos las funciones de los botones otra vez ;)
        //eliminar producto del carrito
        item.getElementsByClassName('btn-eliminar')[0].addEventListener('click',eliminarItemCarrito);
        //sumar cantidad
        var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
        botonSumarCantidad.addEventListener('click', sumarCantidad);
        //restar cantidad
        var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
        botonRestarCantidad.addEventListener('click', restarCantidad);    
        //actualizar el total del carrito
        actualizarTotal();
           
}

function pagarClicked(event){
    alert("Gracias por su compra");
    //eliminamos todos los elementos del carrito
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    while(carritoItems.hasChildNodes()){
        carritoItems.removeChild(carritoItems.firstChild);
    }
    actualizarTotal();
    //llamar funcion que oculta el carrito
    ocultarCarrito();
}

function hacerVisibleCarrito(){
    carritoVisible = true;
    var carrito = document.getElementsByClassName('carrito')[0];
    carrito.style.marginRight = '0';
    carrito.style.opacity = '1';

    var items = document.getElementsByClassName('contenedor-items')[0];
    items.style.width = '60%';
}