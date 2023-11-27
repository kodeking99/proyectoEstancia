function validacion() {
  var expreEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
  var expreNomyApe = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;
  var expreContra = /^[a-zA-Z0-9#@\s]{7,14}$/;


  var correoElectronico = document.frm.correoElectronico.value.trim();
  var correoError = document.getElementById("correoError");

  if (correoElectronico === "" || !expreEmail.test(correoElectronico)) {
      document.getElementById("correoElectronico").focus();
      correoError.style.display = "block";
      return false;
  }

  correoError.style.display = "none";

  var contra = document.frm.contra.value.trim();
  var app = document.getElementById("app");

  if (contra.length < 7 || contra.length > 14 || !expreContra.test(contra)) {
      document.getElementById("contra").focus();
      app.style.display = "block";
      return false;
  }

  app.style.display = "none";


  var confirmacionMensaje = document.getElementById("confirmacionMensaje");
  confirmacionMensaje.style.display = "block";

  frm.submit();
}



function validacion2() {
  var expreNomyApe =/^[a-zA-ZÀ-ÿ\s]{1,40}$/;
var expreDir =/^[a-zA-Z0-9À-ÿ\s]{1,40}$/;
var expreTel =/^\d{7,14}$/;
var expreEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
var expreContra = /^[a-zA-Z0-9#@\s]{7,14}$/;

  if(document.frm.nombre.value.trim().length <=2 || !expreNomyApe.test(document.frm.nombre.value)){
    document.getElementById("nombre").focus();
    nom.style.display="";
    return false;
  }

  nom.style.display="none";

  if(document.frm.apellido.value.trim() == "" || !expreNomyApe.test(document.frm.apellido.value)){
    document.getElementById("apellido").focus();
    app.style.display="";
    return false;
  }
  app.style.display="none";

  if(document.frm.direccion.value.trim().length <=2 || !expreNomyApe.test(document.frm.direccion.value)){
    document.getElementById("direccion").focus();
    dir.style.display="";
    return false;
  }
  dir.style.display="none";

  if(document.frm.telefono.value.trim().length <=2 || !expreTel.test(document.frm.telefono.value)){
    document.getElementById("telefono").focus();
    tel.style.display="";
    return false;
  }
  tel.style.display="none";

  
  var correoElectronico = document.frm.correoElectronico.value.trim();
  var correoError = document.getElementById("correoError");

  if (correoElectronico === "" || !expreEmail.test(correoElectronico)) {
      document.getElementById("correoElectronico").focus();
      correoError.style.display = "block";
      return false;
  }

  correoError.style.display = "none";

  var contrase = document.frm.contrase.value.trim();
  var contraError = document.getElementById("contraError");

  if (contrase.length < 7 || contrase.length > 14 || !expreContra.test(contrase)) {
    document.getElementById("contrase").focus();
    contraError.style.display = "block";
    return false;
}

contraError.style.display = "none";

if(document.frm.genero.value==""){
    s.style.display="block";
    return false;
}

s.style.display="none";



var confirmacionMensaje = document.getElementById("boton");
confirmacionMensaje.style.display = "block";


p.style.display="none";
frm.submit();


}

function busquedaMascotas(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=mascotas&a=busqueda&busqueda="+ busqueda; 
}

function busquedaUsuarios(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=producto&a=busqueda&busqueda="+ busqueda; 
}


function busquedaContratos(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=contratos&a=busqueda&busqueda="+ busqueda; 
}

function busquedaAdopciones(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=adopciones&a=busqueda&busqueda="+ busqueda; 
}

function busquedaAvisos(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=avisos&a=busqueda&busqueda="+ busqueda; 
}

function busquedaSeguimientos(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=seguimientos&a=busqueda&busqueda="+ busqueda; 
}

function busquedaHistorias(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=historias&a=busqueda&busqueda="+ busqueda; 
}

function busquedaVisitas(){

  var busqueda = document.getElementById("busqueda").value;
 // alert("Valor: "). busqueda;
  window.location = "?c=visitas&a=busqueda&busqueda="+ busqueda; 
}

function publicar(){
  var busqueda = document.getElementById("busqueda").value;
  window.location = "?c=visitas&a=busqueda&busqueda="+ busqueda; 
}