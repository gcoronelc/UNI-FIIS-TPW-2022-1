$(function () {
  $("#lnkInicio").click(fnLnkInicio);
  $("#lnkVenta").click(fnLnkVenta);
  $("#lnkReporte").click(fnLnkReporte);
});

// Programación del menú
function fnLnkInicio() {
  fnActiverDiv("divInicio");
}

function fnLnkVenta() {
  fnActiverDiv("divVenta");
}

function fnLnkReporte() {
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
