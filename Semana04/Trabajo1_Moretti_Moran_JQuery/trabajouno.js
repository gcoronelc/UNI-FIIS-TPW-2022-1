// Inicializar la pagina
$(function () {
  $("#btnRequerimiento1").click(fnBtnRequerimiento1);
});

function fnDatosGrupo() {
  hacerVisible("datosGrupo");
}
function fnRequerimiento1() {
  hacerVisible("requerimiento1");
}
function fnRequerimiento2() {
  hacerVisible("requerimiento2");
}
function hacerVisible(id) {
  $("#datosGrupo").hide();
  $("#requerimiento1").hide();
  $("#requerimiento2").hide();
  // Hacer visible el id
  $("#" + id).show();
}

/* Botón requerimiento 1 */
function fnBtnRequerimiento1() {
  // Variables
  let horasDiariasTrabajadas,
    díasTrabajados,
    pagoHora,
    cantidadHijos,
    horasTrabajadas,
    sueldo,
    asignación,
    bono,
    ingresos,
    renta,
    neto,
    pagoHoras;
  // Datos
  horasDiariasTrabajadas = parseInt($("#horasDiariasTrabajadas").val());
  díasTrabajados = parseInt($("#díasTrabajados").val());
  pagoHora = parseFloat($("#pagoHora").val());
  cantidadHijos = parseInt($("#cantidadHijos").val());
  // Proceso
  horasTrabajadas = horasDiariasTrabajadas * díasTrabajados;
  pagoHoras = pagoHora;
  sueldo = horasTrabajadas * pagoHora;
  asignación = cantidadHijos * 80;
  bono = horasTrabajadas >= 150 ? sueldo * 0.15 : bono;
  bono = horasTrabajadas < 150 ? 0 : bono;
  ingresos = sueldo + asignación + bono;
  if (ingresos > 1500) {
    renta = ingresos * 0.08;
  } else renta = 0;
  neto = ingresos - renta;
  // Reporte
  $("#horasTrabajadas").val(horasTrabajadas);
  $("#pagoHoras").val(pagoHoras.toFixed(2) + " Soles");
  $("#sueldo").val(sueldo.toFixed(2) + " Soles");
  $("#asignación").val(asignación.toFixed(2) + " Soles");
  $("#bono").val(bono.toFixed(2) + " Soles");
  $("#ingresos").val(ingresos.toFixed(2) + " Soles");
  $("#renta").val(renta.toFixed(2) + " Soles");
  $("#neto").val(neto.toFixed(2) + " Soles");
}

/* Botón requerimiento 2 */
document.getElementById("btnRequerimiento2").onclick = function () {
  // Variables
  let categoriaCurso,
    descripcionCurso,
    cantidadParticipantes,
    precioCurso,
    importeVenta,
    impuesto,
    total,
    comision,
    participantes,
    descripcionCursos,
    categoriaCursos;
  // Datos
  categoriaCurso = parseInt(document.getElementById("categoriaCurso").value);
  descripcionCurso = document.getElementById("descripcionCurso").value;
  cantidadParticipantes = parseInt(
    document.getElementById("cantidadParticipantes").value
  );
  // Proceso
  precioCurso = 0;
  precioCurso = categoriaCurso == 1 ? 800 : precioCurso;
  precioCurso = categoriaCurso == 2 ? 500 : precioCurso;
  precioCurso = categoriaCurso == 3 ? 1800.0 : precioCurso;
  precioCurso = categoriaCurso == 4 ? 1000.0 : precioCurso;
  categoriaCursos = "x";
  categoriaCursos = categoriaCurso == 1 ? "Programación" : categoriaCursos;
  categoriaCursos = categoriaCurso == 2 ? "Ofimática" : categoriaCursos;
  categoriaCursos = categoriaCurso == 3 ? "Administración" : categoriaCursos;
  categoriaCursos = categoriaCurso == 4 ? "Otros" : categoriaCursos;
  descripcionCursos = descripcionCurso;
  participantes = cantidadParticipantes;
  importeVenta = (precioCurso * cantidadParticipantes) / 1.18;
  total = precioCurso * cantidadParticipantes;
  if (cantidadParticipantes > 15) {
    comision = importeVenta * 0.07;
  } else {
    comision = importeVenta * 0.05;
  }
  impuesto = total - importeVenta;
  // Reporte
  document.getElementById("categoriaCursos").value = categoriaCursos;
  document.getElementById("descripcionCursos").value = descripcionCursos;
  document.getElementById("participantes").value = participantes;
  document.getElementById("precioCurso").value = precioCurso.toFixed(2) + " Soles";
  document.getElementById("importeVenta").value = importeVenta.toFixed(2) + " Soles";
  document.getElementById("impuesto").value = impuesto.toFixed(2) + " Soles";
  document.getElementById("total").value = total.toFixed(2) + " Soles";
  document.getElementById("comision").value = comision.toFixed(2) + " Soles";
};
