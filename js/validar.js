function validarRegBeneficiaro(){
	var nombre, apellido, cedula, correo, telefono, piso, apartamento, expresion, letras;

  nombre = document.getElementById("nombre").value;
  apellido = document.getElementById("apellido").value;
  cedula = document.getElementById("cedula").value;
	correo = document.getElementById("correo").value;
	telefono = document.getElementById("telefono").value;
	piso = document.getElementById("piso").value;
	apartamento = document.getElementById("apartamento").value;
  
expresion = /\w+@\w+\.+[a-z]/;
letras = /\w+[a-z]/;


if (nombre === ""){
alert ("El campo Nombre Está Vacío");
return false;
}

else if (!letras.test(nombre)){
 alert("El dato introducido en el campo Nombre es incorrecto, Debe introducir solo letras, con el primer carácter en mayúscula (ejem: Abc) ");
 return false;
 }

else if (apellido === ""){
   alert ("El campo Apellido Está Vacío");
   return false;
}

else if (!letras.test(apellido)){
 alert("El dato introducido en el campo Nombre es incorrecto, Debe introducir solo letras, con el primer carácter en mayúscula (ejem: Abc) ");
 return false;
 }

 else if (cedula === ""){
   alert ("El campo Cédula Está Vacío");
   return false;
}

else if (isNaN(cedula)){
   alert ("El dato introducido en el campo Cédula es incorrecto (Solo se permiten números)");
   return false;
}

else if (cedula.length<7){
   alert ("El número de Cédula que ha introducido es demasiado corto, debe tener un máximo de 8 caracteres");
   return false;
}

 else if (correo === ""){
   alert ("El campo Correo Está Vacío");
   return false;
}

else if (!expresion.test(correo)){
 alert("El correo no es válido, debe colocar el formato correcto ( ejem: XXXX@XXXX.XX) ");
 return false;
 }

 else if (telefono === ""){
   alert ("El campo Teléfono Está Vacío");
   return false;
}

  else if (telefono.length<11){
   alert ("El campo Teléfono debe tener 11 digitos (ejem: 041X XXX XX) ");
   return false;
}

 else if (isNaN(telefono)) {
   alert ("El dato introducido en el campo Teléfono es incorrecto (Solo se permiten números)");
   return false;

   }

   else if (piso === ""){
   alert ("El campo Piso Está Vacío");
   return false;
}
  
else if (isNaN(piso)) {
   alert ("El dato introducido en el campo Piso es incorrecto (Solo se permiten números)");
   return false;

   }  

  else if (apartamento === ""){
   alert ("El campo Apartamento Está Vacío");
   return false;
}

else if (isNaN(apartamento)) {
   alert ("El dato introducido en el campo Apartamento es incorrecto (Solo se permiten números)");
   return false;

   }  
  
else if (nombre === "" || apellido === "" || cedula === "" || correo === "" || telefono === "" || piso === "" || apartamento === ""  ){
 alert ("Atencion, debe llenar todos los campos");
 return false;
    
}


  }
function validarModBeneficiario(){

 var cedula;

 cedula = document.getElementById("cedulaMod").value;

 if (cedula === ""){
  alert ("Porfavor, debe introducir el número de Cédula del beneficiario a modificar ");
  return false;
  }

 else if (isNaN(cedula)){
  alert ("El dato introducido es incorrecto (Solo se permiten números)");
  return false;
}

else if (cedula.length<7){
   alert ("El número de Cédula que ha introducido es demasiado corto, debe tener un máximo de 8 caracteres");
   return false;
}


}

 function validarMod(){

 var name1, surname,email, movil, suelo, casa;

   name1 = document.getElementById("name1").value;
   surname = document.getElementById("surname").value;
   email = document.getElementById("email").value;
   movil = document.getElementById("movil").value;
   suelo = document.getElementById("suelo").value;
   casa = document.getElementById("casa").value;

expresarse = /\w+@\w+\.+[a-z]/;
texto = /\w+[a-z]/;

console.log(name1);

if (name1 === ""){
alert ("El campo Nombre Está Vacío");
return false;
}

else if (!texto.test(name1)){
 alert("El dato introducido en el campo Nombre es incorrecto, Debe introducir solo letras, con el primer carácter en mayúscula (ejem: Abc) ");
 return false;
 }

 else if (surname === ""){
alert ("El campo Apellido Está Vacío");
return false;
}

else if (!texto.test(surname)){
 alert("El dato introducido en el campo Nombre es incorrecto, Debe introducir solo letras, con el primer carácter en mayúscula (ejem: Abc) ");
 return false;
 }

else if (email === ""){
   alert ("El campo Correo Está Vacío");
   return false;
}

else if (!expresarse.test(email)){
 alert("El correo no es válido, debe colocar el formato correcto ( ejem: XXXX@XXXX.XX) ");
 return false;
 }

 else if (movil === ""){
   alert ("El campo Teléfono Está Vacío");
   return false;
}

  else if (movil.length<11){
   alert ("El campo Teléfono debe tener 11 digitos (ejem: 041X XXX XX) ");
   return false;
}

 else if (isNaN(movil)) {
   alert ("El dato introducido en el campo Teléfono es incorrecto (Solo se permiten números)");
   return false;

   }

 else if (suelo === ""){
   alert ("El campo Piso Está Vacío");
   return false;
}
  
else if (isNaN(suelo)) {
   alert ("El dato introducido en el campo Piso es incorrecto (Solo se permiten números)");
   return false;

   }  

  else if (casa === ""){
   alert ("El campo apartamento Está Vacío");
   return false;
 }
  
  else if (isNaN(casa)) {
   alert ("El dato introducido en el campo apartamento es incorrecto (Solo se permiten números)");
   return false;

   }   

  } 



  function validarProductos(){

 var cantidad, articulos;

 cantidad = document.getElementById("cantidad").value;
 articulos = document.getElementById("articulos").value;


 if (cantidad === ""){
  alert ("Porfavor, debe introducir la cantidad del producto");
  return false;
  }

 else if (isNaN(cantidad)){
  alert ("El dato introducido es incorrecto (Solo se permiten números)");
  return false;
}


  }


  function RegProductos(){

 var comida;

 comida = document.getElementById("comida").value;

 if (comida === ""){
  alert ("Porfavor, debe introducir la cantidad del producto");
  return false;
  }

 else if (isNaN(comida)){
  alert ("El dato introducido es incorrecto (Solo se permiten números)");
  return false;
}

}

  function validarModproductos(){

 var articulos;

 articulos = document.getElementById("articulos").value;

 if (articulos === ""){
  alert ("Porfavor, debe introducir la cantidad del producto");
  return false;
  }

 else if (isNaN(articulos)){
  alert ("El dato introducido es incorrecto (Solo se permiten números)");
  return false;
}
	
}

function validarsesion(){

 var usuario, clave;

 usuario = document.getElementById("usuario").value;
 clave = document.getElementById("clave").value;


 if (usuario === ""){
  alert ("El campo usuario Está Vacío");
  return false;
  }

  else if (clave === ""){
  alert ("El campo Contraseña Está Vacío");
  return false;
  }
}

function validarcontra(){

 var anterior, nueva, repetir;

 anterior = document.getElementById("anterior").value;
 nueva = document.getElementById("nueva").value;
 repetir = document.getElementById("repetir").value;

 if (anterior === ""){
  alert ("Debe introducir la contraseña anterior");
  return false;
  }

  else if (nueva === ""){
  alert ("Debe introducir la Contraseña nueva");
  return false;
  }

  else if (repetir === ""){
  alert ("Debe repetir la nueva contraseña para verificar");
  return false;
  }
}

function validarRegreferencia(){

 var referencia;

 referencia = document.getElementById("referencia").value;

 if (referencia === ""){
  alert ("Debe ingresar una referencia para registrarla");
  return false;
  }

  else if (isNaN(referencia)){
  alert ("El dato introducido es incorrecto (Solo se permiten números)");
  return false;
}

else if (referencia.length<12){
   alert ("El número de referencia debe tener 12 dígitos");
   return false;
}
}

function validareliminar(){

 var eliminarReferencia;

 eliminarReferencia = document.getElementById("eliminarReferencia").value;

 if (eliminarReferencia === ""){
  alert ("Debe ingresar el número de referencia a eliminar");
  return false;
  }

  else if (isNaN(eliminarReferencia)){
  alert ("El dato introducido es incorrecto (Solo se permiten números)");
  return false;
}

else if (eliminarReferencia.length<12){
   alert ("El número de referencia debe tener 12 dígitos");
   return false;
}
}


