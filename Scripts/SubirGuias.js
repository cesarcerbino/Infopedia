function cambiarpantalla() {
  var titulo = document.getElementById("TITULO");

  var pantalla1 = document.getElementsByClassName("zonaderedaccion");
  pantalla1[0].style.display = "none";
  var pantalla1 = document.getElementsByClassName("descripcion");
  pantalla1[0].style.display = "block";
}

function volver() {
  var pantalla1 = document.getElementsByClassName("zonaderedaccion");
  pantalla1[0].style.display = "block";
  var pantalla1 = document.getElementsByClassName("descripcion");
  pantalla1[0].style.display = "none";
}
