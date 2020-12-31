function mostrar() {
  var x = document.getElementsByClassName("rightbarbig");
  x[0].style.display = "block";
  var a = document.getElementsByClassName("hide");
  a[0].style.display = "block";
  var b = document.getElementsByClassName("hide");
  b[0].style.display = "block";
  var c = document.getElementsByClassName("show");
  c[0].style.display = "none";
  var d = document.getElementsByClassName("rightbarsmall");
  d[0].style.display = "none";
}

function esconder() {
  var x = document.getElementsByClassName("rightbarbig");
  x[0].style.display = "none";
  var a = document.getElementsByClassName("hide");
  a[0].style.display = "none";
  var b = document.getElementsByClassName("hide");
  b[0].style.display = "none";
  var c = document.getElementsByClassName("show");
  c[0].style.display = "block";
  var d = document.getElementsByClassName("rightbarsmall");
  d[0].style.display = "block";
}

function subir() {
  var x = document.getElementsByClassName("Opciones");
  x[0].style.display = "block";
  var d = document.getElementsByClassName("presentacion");
  d[0].style.display = "none";
  var d = document.getElementsByClassName("Cajacategorias");
  d[0].style.display = "none";
}

function cerrar() {
  var x = document.getElementsByClassName("Opciones");
  x[0].style.display = "none";
  var d = document.getElementsByClassName("presentacion");
  d[0].style.display = "block";
  var d = document.getElementsByClassName("Cajacategorias");
  d[0].style.display = "block";
}
