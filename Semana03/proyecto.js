function fnCalcularSuma() {
  hacerVisible("calcularSuma");
}

function fnCalcularVenta() {
  hacerVisible("calcularVenta");
}

function fnSueldoProfesor() {
  hacerVisible("sueldoProfesor");
}

function fnConsumoAgua() {
  hacerVisible("consumoAgua");
}

function hacerVisible(id) {
  // Oculta todos
  document.getElementById("calcularSuma").style.display = "none";
  document.getElementById("calcularVenta").style.display = "none";
  document.getElementById("sueldoProfesor").style.display = "none";
  document.getElementById("consumoAgua").style.display = "none";
  document.getElementById("tablaMultiplicar").style.display = "none";
  // Hacer visible el id
  document.getElementById(id).style.display = "block";
}

/* Boton calcular suma */
document.getElementById("btnCalcularSuma").onclick = function () {
  // Datos
  let num1 = parseInt(document.getElementById("num1").value);
  let num2 = parseInt(document.getElementById("num2").value);
  // Proceso
  let suma = num1 + num2;
  // Reporte
  document.getElementById("suma").value = suma;
};

/* Botón procesar venta */
document.getElementById("btnProcesarVenta").onclick = function () {
  // Variables
  let precio, cantidad, importe, impuesto, total;
  // Datos
  precio = parseFloat(document.getElementById("precio").value);
  cantidad = parseInt(document.getElementById("cantidad").value);
  // Proceso
  total = precio * cantidad;
  importe = total / 1.18;
  impuesto = total - importe;
  // Reporte
  document.getElementById("importe").value = importe;
  document.getElementById("impuesto").value = impuesto;
  document.getElementById("total").value = total;
};

/* Botón sueldo del profesor */
document.getElementById("req2Procesar").onclick = function () {
  // Variables
  let horas, investiga, ingresos, porcBono, bono, sueldo;
  // Datos
  horas = parseInt(document.getElementById("req2Horas").value);
  investiga = document.getElementById("req2Investiga").value;
  // Proceso
  ingresos = horas * 30;
  porcBono = investiga == "S" ? 0.3 : 0;
  bono = ingresos * porcBono;
  sueldo = ingresos + bono;
  // Reporte
  document.getElementById("req2Ingresos").value = "S/." + ingresos.toString();
  document.getElementById("req2Bono").value = "S/." + bono.toString();
  document.getElementById("req2Sueldo").value = "S/." + sueldo.toString();
};

/* Botón consumo de agua */
document.getElementById("req3Procesar").onclick = function () {
  // Variables
  let consumo, categoria, costoM3, importe, impuesto, total;
  // Datos
  consumo = parseFloat(document.getElementById("req3Consumo").value);
  categoria = document.getElementById("req3Categoria").value;
  // Validación

  // Proceso

  alert(consumo + "/" + categoria);

  // Reporte
  //document.getElementById("req2Ingresos").value = "S/." + ingresos.toString();
  //document.getElementById("req2Bono").value = "S/." + bono.toString();
  //document.getElementById("req2Sueldo").value = "S/." + sueldo.toString();
};
