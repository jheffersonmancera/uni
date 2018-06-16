
function changeImage(imgName)
{
image = document.getElementById('load-bandera');
image.src = 'bandera/'+imgName;
}

document.addEventListener("DOMContentLoaded", Ready);

// gif loader para login
var gifLogin = document.querySelector('#gif-login');

// gif loader para registro
var gifRegistro = document.querySelector('#gif-registro');
var msgEmailr = document.querySelector('#msg-emailr');

var msgEmaill = document.querySelector('#msg-emaill');
var msgPassword = document.querySelector('#msg-passwordl');
var loginForm = document.querySelector('#login-form');
var registroForm = document.querySelector('#register-form');


// cuando el documento carga oculta el gif login loader
function Ready(){
  gifLogin.style.display = 'none';
  gifRegistro.style.display = 'none';
} 

// clase para login
class Inicio{
  
  mostrarGif(){
    gifLogin.style.display = 'block';
  }

  ocultarGif(){
    gifLogin.style.display = 'none';
  }
}

// clase para registro
class Registro{

   mostrarGifr(){
    gifRegistro.style.display = 'block';
  }

  ocultarGifr(){
    gifRegistro.style.display = 'none';
  }
}

class Interfaz{
   
   mostrarMensaje(mensaje, tipo){
      const div = document.createElement('div');
      if (tipo == 'error') {
         div.classList.add('mensaje-ncc', 'msg-rojo-small', 'alert-danger', 'text-center', 'form-group');
         div.innerHTML = mensaje;
         loginForm.insertBefore(div, document.querySelector('#gif-login'));
      }else if(tipo == 'errorE'){
        msgEmaill = document.querySelector('#msg-emaill');
        msgEmaill.classList.add('pe','mensaje-le', 'mensaje-nc');
        msgEmaill.innerHTML = mensaje;
      }else if(tipo == 'errorP'){
        msgPassword = document.querySelector('#msg-passwordl');
        msgPassword.classList.add('pe','mensaje-lp', 'mensaje-nc');
        msgPassword.innerHTML = mensaje;
      }else if(tipo == 'errorR'){
        div.classList.add('mensaje-ncc', 'msg-rojo-small', 'alert-danger', 'text-center', 'form-group');
        div.innerHTML = mensaje;
        registroForm.insertBefore(div, document.querySelector('#gif-registro'));
      }else if(tipo == 'errorEexist'){
        msgEmailr = document.querySelector('#msg-emailr');
        msgEmailr.classList.add('pe','mensaje-le', 'mensaje-nc');
        msgEmailr.innerHTML = mensaje;
      }


      } 

      errorMsgRegistroEmail(){
        msgEmailr.style.display = 'block';
      }
      
   

   eliminarunMensaje(){
      const mensaje = document.querySelector('.mensaje-ncc');
      if (mensaje) {
         mensaje.remove();
      }
   }

   eliminarunMensajesAll(){
      const mensaje = document.querySelectorAll('.mensaje-nc');
      
      if (mensaje) {
         for (var i = 0; i < mensaje.length; i++) {
           mensaje[i].style.display = 'none';
        }
      }
   }

   eliminarunMensajesAllPM(){
      const mensaje = document.querySelectorAll('.pe');
      
      if (mensaje) {
         for (var i = 0; i < mensaje.length; i++) {
           mensaje[i].style.display = 'none';
        }
      }
   }
}


const inicio = new Inicio();
const interfaz = new Interfaz();


function Login(){
	var email = $('#emaill').val();
	var password = $('#passwordl').val();
	
	if (email == '' || email == undefined || email == null) {
      interfaz.mostrarMensaje('el campo email es obligatorio *', 'errorE');
	}else if(password == '' || password == undefined || password == null){
        interfaz.mostrarMensaje('el campo password es obligatorio *', 'errorP');
	}else{	
    interfaz.eliminarunMensaje();
    interfaz.eliminarunMensajesAllPM();
    inicio.mostrarGif();
		$.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        type:"POST",
        url:"loginn",
        data:{ email:email,
               password:password},
        success:function(dato){
            
            if(dato == 'error-login'){
               inicio.ocultarGif();
               interfaz.mostrarMensaje('credenciales incorrectas ', 'error');
           }else if (dato.hasOwnProperty('email')) {
               interfaz.mostrarMensaje('el campo email es obligatorio *', 'errorE');
               inicio.ocultarGif();
           }else if(dato.hasOwnProperty('password')){
               interfaz.mostrarMensaje('el campo password es obligatorio *', 'errorP');
               inicio.ocultarGif();
           }else{
               interfaz.eliminarunMensajesAllPM();
               inicio.ocultarGif();
               $('#aboutModal').modal('hide');
               location.reload();
                
           }
           
        }
    });
	}
	
}


const registro = new Registro();
function RegistroPost(){
   var email = $('#emailr').val();
   var password = $('#password').val();
   var passwordConfirm = $('#password-confirm').val();

   if (email == '' || email == undefined || email == null) {
      interfaz.mostrarMensaje(' el campo Email es obligatorio', 'errorEexist');
  }else if(password == '' || password == undefined || password == null){
        interfaz.mostrarMensaje('los campos password son obligatoriosss *', 'errorR');
  }else if(passwordConfirm == '' || passwordConfirm == undefined || passwordConfirm == null){


  }else{
    
    interfaz.eliminarunMensaje();
   interfaz.eliminarunMensajesAllPM()
   registro.mostrarGifr();
  $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        type:"POST",
        url:"registroo",
        data:{ email:email,
               password:password,
               passwordConfirm:passwordConfirm},
        success:function(dato){
        
            if(dato == 'no coincide'){
               registro.ocultarGifr();
               interfaz.mostrarMensaje('las contraseñas no coinciden ', 'errorR');
           }else if (dato.hasOwnProperty('email')) {
               interfaz.mostrarMensaje(' este email ya se encuentra registrado', 'errorEexist');
               interfaz.errorMsgRegistroEmail();
               registro.ocultarGifr();
           }else if(dato.hasOwnProperty('password')){
               interfaz.mostrarMensaje('los campos password son obligatorios *', 'errorR');
               registro.ocultarGifr();
           }else{
               interfaz.eliminarunMensajesAllPM();
               registro.ocultarGifr();
                $('#aboutModal').modal('hide');
                location.reload()
           }
           
        }
    });

  }
   
   
}


function Like(dato){
 
 var datol = dato;
 $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        type:"POST",
        url:"like",
        data:{ dato:datol},
        success:function(dato){
            console.log(dato);
            if(dato == 'ya voto'){
               
           }
           
        }
    });

}