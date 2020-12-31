function countChars(obj) {
  var maxLength = 500;
  var strLength = obj.value.length;

  if (strLength > maxLength) {
    document.getElementById("charNum").innerHTML =
      '<span style="color: rgba(0,212,255,1); font-weight: 600;">' +
      strLength +
      "/" +
      maxLength +
      " Exediste el maximo de caracteres</span>";
    document.getElementById("subircomentario").disabled = true;
    //document.getElementById("enviar").style.color = 'red';
    //document.getElementById("enviar").style.border = '1px solid rgba(0,212,255,1)';
  } else {
    document.getElementById("charNum").innerHTML =
      strLength + " / " + maxLength;
    document.getElementById("subircomentario").disabled = false;
  }
}

function countChars2(obj) {
  var maxLength = 5000;
  var strLength = obj.value.length;

  if (strLength > maxLength) {
    document.getElementById("charNum").innerHTML =
      '<span style="color: rgba(0,212,255,1); font-weight: 600;">' +
      strLength +
      "/" +
      maxLength +
      " Exediste el maximo de caracteres</span>";
    document.getElementById("subircomentario").disabled = true;
    //document.getElementById("enviar").style.color = 'red';
    //document.getElementById("enviar").style.border = '1px solid rgba(0,212,255,1)';
  } else {
    document.getElementById("charNum").innerHTML =
      strLength + " / " + maxLength;
    document.getElementById("subircomentario").disabled = false;
  }
}
