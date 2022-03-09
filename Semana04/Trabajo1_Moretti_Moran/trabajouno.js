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
  document.getElementById("datosGrupo").style.display = "none";
  document.getElementById("requerimiento1").style.display = "none";
  document.getElementById("requerimiento2").style.display = "none";
  // Hacer visible el id
  document.getElementById(id).style.display = "block";
}

/* Botón requerimiento 1 */
document.getElementById("btnRequerimiento1").onclick = function () {
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
  horasDiariasTrabajadas = parseInt(
    document.getElementById("horasDiariasTrabajadas").value
  );
  díasTrabajados = parseInt(document.getElementById("díasTrabajados").value);
  pagoHora = parseFloat(document.getElementById("pagoHora").value);
  cantidadHijos = parseInt(document.getElementById("cantidadHijos").value);
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
  document.getElementById("horasTrabajadas").value = horasTrabajadas;
  document.getElementById("pagoHoras").value = pagoHoras.toFixed(2) + " Soles";
  document.getElementById("sueldo").value = sueldo.toFixed(2) + " Soles";
  document.getElementById("asignación").value = asignación.toFixed(2) + " Soles";
  document.getElementById("bono").value = bono.toFixed(2) + " Soles";
  document.getElementById("ingresos").value = ingresos.toFixed(2) + " Soles";
  document.getElementById("renta").value = renta.toFixed(2) + " Soles";
  document.getElementById("neto").value = neto.toFixed(2) + " Soles";
};

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
