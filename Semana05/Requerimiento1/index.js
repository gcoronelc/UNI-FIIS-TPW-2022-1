var arregloCategorias = [];
var arregloProductos = [];
var arregloVentas = [];

$(function () {
  // El menú
  $("#lnkInicio").click(fnLnkInicio);
  $("#lnkVenta").click(fnLnkVenta);
  $("#lnkReporte").click(fnLnkReporte);
  // Inicializa arreglo de categorias
  arregloCategorias[0] = { codigo: 1, nombre: "Computadoras" };
  arregloCategorias[1] = { codigo: 2, nombre: "Celulares" };
  arregloCategorias[2] = { codigo: 3, nombre: "Parlantes" };
  // Inicializa arreglo de productos
  arregloProductos[0] = { id: 1, categoria: 1, nombre: "Laptop i7", precio: 4500.0 };
  arregloProductos[1] = { id: 2, categoria: 1, nombre: "Laptop i5", precio: 5500.0 };
  arregloProductos[2] = { id: 3, categoria: 1, nombre: "Laptop i9", precio: 7500.0 };
  arregloProductos[3] = { id: 4, categoria: 2, nombre: "Celular 1", precio: 1200.0 };
  arregloProductos[4] = { id: 5, categoria: 2, nombre: "Celular 2", precio: 2460.0 };
  arregloProductos[5] = { id: 6, categoria: 2, nombre: "Celular 3", precio: 7900.0 };
  arregloProductos[6] = {
    id: 7,
    categoria: 3,
    nombre: "Parlantes 1",
    precio: 345.0,
  };
  arregloProductos[7] = {
    id: 8,
    categoria: 3,
    nombre: "Parlantes 2",
    precio: 570.0,
  };
  arregloProductos[8] = {
    id: 9,
    categoria: 3,
    nombre: "Parlantes 3",
    precio: 880.0,
  };
  // Carga combo de categorias
  fnLlenarCategorias();
  // Carga el combo de productos
  $("#categoria").change(fnLlenarProductos);
  // Mostrar el precio
  $("#producto").change(fnMostrarPrecio);
  // Procesar venta
  $("#btnProcesar").click(fnBtnProcesar);
});

// Programación del menú
function fnLnkInicio() {
  fnActiverDiv("divInicio");
}

function fnLnkVenta() {
  fnActiverDiv("divVenta");
}

function fnLnkReporte() {
  fnMostrarReporte();
  fnActiverDiv("divReporte");
}

// Funciones utiles

function fnActiverDiv(idDiv) {
  // Ocultar todos
  $("#divInicio").hide();
  $("#divVenta").hide();
  $("#divReporte").hide();
  // Mostrar el actual
  $("#" + idDiv).show();
}

function fnLlenarCategorias() {
  let elemento = "";
  $.each(arregloCategorias, function (i, obj) {
    elemento = "<option value='" + obj.codigo + "'>" + obj.nombre + "</option>";
    $("#categoria").append(elemento);
  });
}

function fnLlenarProductos() {
  let cboProductos = $("#producto");
  cboProductos.empty();
  $("#producto").append("<option value='0'>Seleccionar producto</option>");
  $("#precio").val("0.0");
  let categoria = $("#categoria").val();
  let elemento = "";
  $.each(arregloProductos, function (i, objProd) {
    if (categoria == objProd.categoria) {
      elemento =
        "<option value='" + objProd.id + "'>" + objProd.nombre + "</option>";
      $("#producto").append(elemento);
    }
  });
}

function fnMostrarPrecio() {
  const idProd = $(this).val();
  const precio = fnObtenerPrecio(idProd);
  const formato = precio.toLocaleString("es-PE", {
    style: "currency",
    currency: "PEN",
  });
  $("#precio").val(formato);
}

function fnBtnProcesar() {
  // Datos
  const cliente = $("#cliente").val();
  const categoria = $("#categoria").val();
  const idProd = $("#producto").val();
  const cantidad = $("#cantidad").val();
  // Obtener el precio
  const precio = fnObtenerPrecio(idProd);
  // Obtener el nombre del producto
  const nombProd = fnObtenerNombre(idProd);
  // Calculos
  const importe = precio * cantidad;
  // Crear objeto
  let objProducto = {
    cliente: cliente,
    id: idProd,
    categoria: categoria,
    nombre: nombProd,
    precio: precio,
    cantidad: cantidad,
    importe: importe,
  };
  // Grabar venta
  const index = arregloVentas.length;
  arregloVentas[index] = objProducto;
  // Mostrar mensaje
  alert("Proceso ok.");
  fnLimpiarFormulario();
  console.log(arregloVentas);
}

function fnObtenerPrecio(idProd) {
  let precio = 0.0;
  for (let i = 0; i < arregloProductos.length; i++) {
    if (idProd == arregloProductos[i].id) {
      precio = arregloProductos[i].precio;
    }
  }
  return precio;
}

function fnObtenerNombre(idProd) {
  let nombre = "None";
  for (let i = 0; i < arregloProductos.length; i++) {
    if (idProd == arregloProductos[i].id) {
      nombre = arregloProductos[i].nombre;
    }
  }
  return nombre;
}

function fnLimpiarFormulario() {
  $("#cliente").val("");
  $("#categoria").val("0");
  $("#cantidad").val("0");
  fnLlenarProductos();
}

function fnMostrarReporte() {
  let html = "";
  $.each(arregloVentas, function (i, venta) {
    html += "<tr>";
    html += "<td>" + venta.cliente + "</td>";
    html += "<td>" + venta.nombre + "</td>";
    html += "<td>" + venta.precio + "</td>";
    html += "<td>" + venta.cantidad + "</td>";
    html += "<td>" + venta.precio + "</td>";
    html += "</tr>";
  });
  $("#reporteData").html(html);
}
