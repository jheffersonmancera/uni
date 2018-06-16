<!DOCTYPE html>
<html>
<html lang="{{ app()->getLocale() }}">
    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Concurso Unicentro: El Like Dorado</title>
    <meta name="description" content="Concurso El Like Dorado" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/own.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
   <!--  <script src="{{ asset('js/jquery.min.js')}}"></script> -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  </head>
  <body>
  
<div id="fb-root"></div>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
  
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1828944070740875',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

    <header class="wrapper bg" id="first" data-ibg-bg="bg.png">
 
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
         <!-- <nav id="topNav" class="navbar navbar-default"> -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <div class="container-fluid">
                <a class="navbar-brand page-scroll text" href="#first"><img src="assets/logo.png"><br><div style="text-align: center;font-size: 30px;"><strong>#Más</strong>emoción</div></a>
                </div>
            </div>

            

            <div class="navbar-collapse collapse" id="bs-navbar" style="z-index:999; width: 20em;">
                <ul class="nav navbar-nav" >
                  @if(Auth::check())
                    <li>
                    <a class="page-scroll" href="#one">{{Auth::user()->email}}</a>
                    </li>
                  @endif  
                    <li>
                        <a class="page-scroll" href="#one">Galería</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#two">Mecánica</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#three">T&C</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#four">Premios</a>
                    </li>
                </ul>
            </div>


        
    </nav>

       

       @if(Auth::guest())          
        <a class="affix participar" data-toggle="modal" title="A free Bootstrap video landing theme" href="#aboutModal" href="">Participar</a>
       @elseif(empty($imagenesruta->src_imagen))
        <a class="affix participar" data-toggle="modal" title="A free Bootstrap video landing theme" href="#aboutModalphoto" href="">Subir foto</a>
        @else
        <a class="affix participar" data-toggle="modal" title="A free Bootstrap video landing theme" href="#meaboutModalphoto" href="">MI foto</a>
       @endif 

       

        <div class="header-content">
            <div class="inner">
                <img class="foto-titular" src="assets/titular.png">
            </div>
        </div>
        <div class="fillWidth fadeIn wow collapse in porras" data-wow-delay="0.5s">
            <img src="assets/abajo.png">
        </div>

        <!-- finicio tres imagenes mas votadas -->  
    <div class="containe" style="margin-top: 18em;">
            <div class="row" style="position: relative;">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-3 text-center">        
                    <!--  aqui van las fotos 3 mas votadas -->
                    

                    @if(Auth::check())
                      @foreach($imagenesmax as $imagen)
                    <!-- <div class="row"> -->
                    <div class="col-sm-4 col-md-4">
                      <div class="thumbnail" style="position: relative;">
                        <img src="imagenes/{{$imagen->src_imagen}}" alt="...">
                        <img src="assets/titular.png" style="color:red;" class="img-izquierda">
                      <img src="assets/unicen.png" style="color:red;" class="img-derecha">
                      <img src="bandera/brazil.png" style="color:red; " class="img-bandera">
                      <p  class="img-derecha-text"> 
                        <small>unicentro</small>
                      </p>
                      <p  class="img-derecha-text-1"> 
                        <small>cali</small>
                      </p>
                      <p  class="img-derecha-text-2"> 
                        unicentro
                      </p>
                      <p  class="img-derecha-text-4"> 
                        #
                      </p>
                      <p  class="img-derecha-text-5"> 
                        mas
                      </p>
                      <p  class="img-derecha-text-3"> 
                        emocion
                      </p>
                        <div class="caption" style="max-width: 100%; padding:0px;">
                          <button href="#" class="btn-uni btn-primary-uni" role="button">Me gusta : <strong>{{$imagen->like}}</strong></button>
                        </div>
                      </div>
                    </div>
                    <!-- </div> -->
                    @endforeach
                    @else
                     @foreach($imagenesmax as $imagen)
                    <!-- <div class="row"> -->
                  

                    <div class="col-sm-3 col-md-4">
                      <div class="row col-md-4" >
                      <div  style="position: relative;" >
                      <img src="assets/marcoss.png"  style="position: absolute; " width="150" height="196"/>

                        <img src="imagenes/{{$imagen->src_imagen}}" alt="..." width="140" hspace="2" height="160" vspace="5">
                        <div class="caption">
                          <p style="margin-top: 1.4em;"><a href="#aboutModal" class="btn-uni btn-primary-uni" data-toggle="modal" role="button">Me gusta : <strong>{{$imagen->like}}</strong></a></p>
                        </div>
                      </div>
                    </div>
                    </div>
                    <!-- </div> -->
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- fin tres imagenes mas votadas -->
    </header>

    <section class="bg-primary" id="one" >



      
        <div class="containe">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                    <h2 class="margin-top-0 text-primary">Galería</h2>
                    <br>
                    <p class="text-faded">
                        Vota por tu papá favorito y podrá ganar el like dorado.
                    </p>
                    <div> </div> 
                    <!--  aqui van las fotos -->
                    

                    @if(Auth::check())
                      @foreach($imagenes as $imagen)
                    <!-- <div class="row"> -->
                    <div class="col-sm-4 col-md-4">
                      <div class="thumbnail" style="position: relative;">
                        <img src="imagenes/{{$imagen->src_imagen}}" alt="...">
                        <img src="assets/titular.png" style="color:red;" class="img-izquierda">
                      <img src="assets/unicen.png" style="color:red;" class="img-derecha">
                      <img src="bandera/brazil.png" style="color:red; " class="img-bandera">


                      
                        <div class="caption">
                        <div class="row">
                          <button href="#" class="btn-uni btn-primary-uni" role="button" onclick="Like({{$imagen->id}});"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Me gusta <strong>{{$imagen->like}}</strong></button>
                          <!-- <button href="#" class="btn-uni btn-primary-uni" role="button"></span> <strong>{{$imagen->like}}</strong></button> -->
                        </div>
                        </div>
                      </div>
                    </div>   
                    <!-- </div> --> 
                    @endforeach
                    @else
                     @foreach($imagenes as $imagen)
                    <!-- <div class="row"> -->

                   <!--  <div style="position: relative;">
 <img src="assets/marcoss.png"  style="position: absolute; " width="300" height="300"/>
    <img src="imagenes/2b9FRGUM2B2SrJezDV2evvVNbTjdv8tKGTphfmpg.jpeg"  width="268" hspace="16" height="268" vspace="16"  />
</div> -->

                    <div class="row col-md-4" style="padding-top:3em;">
                      <div  style="position: relative;" >
                      <img src="assets/marcoss.png"  style="position: absolute; " width="150" height="196"/>

                        <img src="imagenes/{{$imagen->src_imagen}}" alt="..." width="140" hspace="2" height="160" vspace="5">
                        
                      </div>
                      <div class="caption" style="padding-top:2em;">
                          <p><a href="#aboutModal" class="btn-uni btn-primary-uni" data-toggle="modal" role="button">Me gusta : <strong>{{$imagen->like}}</strong></a></p>
                        </div>
                    </div>
                    <!-- </div> -->
                    @endforeach
                    @endif
                    
                    <!-- <div class="col-sm-3 col-md-4">
                      <div class="thumbnail">
                        <img src="imagenes/aVWV5mieqUIY4fGnkCBB6fmyv5p20FWAcvHnLWC6.jpeg" alt="...">
                        <div class="caption">
                          <p><a href="#" class="btn-uni btn-primary-uni" role="button">Me gusta</a></p>
                        </div>
                      </div>
                    </div> -->
                    <!-- <div class="col-sm-3 col-md-4">
                      <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                          <p><a href="#" class="btn-uni btn-primary-uni" role="button">Me gusta</a></p>
                        </div>
                      </div>
                    </div> -->
                  <!-- </div> -->


                    <!-- fin aqui van las fotos -->

                   

<a class="btn btn-default btn-lg wow flipInX " data-toggle="collapse" href="#collapseExample" style="width: 50%;" aria-expanded="false" aria-controls="collapseExample">
  Ver todos
</a>

<div class="collapse" id="collapseExample">
  <div class="well" style="background-color:transparent; border: 0px;">
    @if(Auth::check())
                      @foreach($imagenes3 as $imagen)
                    <!-- <div class="row"> -->
                    <div class="col-sm-4 col-md-4">
                      <div class="thumbnail" style="position: relative;">
                        <img src="imagenes/{{$imagen->src_imagen}}" alt="...">
                        <img src="assets/titular.png" style="color:red;" class="img-izquierda">
                      <img src="assets/unicen.png" style="color:red;" class="img-derecha">
                      <img src="bandera/brazil.png" style="color:red; " class="img-bandera">


                      
                        <div class="caption">
                        <div class="row">
                          <button href="#" class="btn-uni btn-primary-uni" role="button" onclick="Like({{$imagen->id}});"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Me gusta <strong>{{$imagen->like}}</strong></button>
                          <!-- <button href="#" class="btn-uni btn-primary-uni" role="button"></span> <strong>{{$imagen->like}}</strong></button> -->
                        </div>
                        </div>
                      </div>
                    </div>   
                    <!-- </div> --> 
                    @endforeach
                    @else
                     @foreach($imagenes3 as $imagen)
                    <!-- <div class="row"> -->


                    <div class="row col-md-4" style="padding-top:3em;">
                      <div  style="position: relative;" >
                      <img src="assets/marcoss.png"  style="position: absolute; " width="150" height="196"/>

                        <img src="imagenes/{{$imagen->src_imagen}}" alt="..." width="140" hspace="2" height="160" vspace="5">
                        
                      </div>
                      <div class="caption" style="padding-top:2em;">
                          <p><a href="#aboutModal" class="btn-uni btn-primary-uni" data-toggle="modal" role="button">Me gusta : <strong>{{$imagen->like}}</strong></a></p>
                        </div>
                    </div>
                    <!-- </div> -->
                    @endforeach
                    @endif
  </div>
</div>
                </div>

            </div>

        </div>
    </section>
    <section class="container-fluid rojito" id="two">
         <div class="luces fadeIn col-md-12">
            <img src="assets/luces.png">
        </div> 
        <div class="row">           
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 ">
                <h2 class="text-center text-primary">Mecánica</h2>
                <hr>
                <div class="media wow fadeIn">
                    <div class="media-left">
                        <img src="assets/registro.png">
                    </div>
                    <div class="media-body media-middle">
                        <p class="pasos">Regístrate</p>
                    </div>

                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <div class="media-right">
                       <img src="assets/upload.png">
                    </div>
                    <div class="media-body media-middle">
                        <p class="pasos">Sube tu foto</p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeIn">
                    <div class="media-left">
                        <img src="assets/marco.png">
                    </div>                    
                    <div class="media-body media-middle"">
                       <p class="pasos">Selecciona el marco de tu equipo favorito</p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <div class="media-left">
                        <img src="assets/compartir.png">
                    </div>                    
                    <div class="media-body media-middle"">
                       <p class="pasos">Comparte tu foto para tener el mayor número de likes</p>
                    </div>
                </div> 
                <div class="centro" id="three">
                    <a href="http://www.bootstrapzero.com/bootstrap-template/landing-zero" target="ext" class="btn btn-default btn-lg wow flipInX">Ver terminos y condiciones</a>
                </div>               
            </div>
        </div>
    </section>
    <section class="bg-dark premios_unicentro" id="four" >
        <div class="container-fluid text-center">
            <div class="call-to-action">
                <h2 class="text-primary">Premios</h2>
            </div>
            <br>
            <br>
            <div class="row" style="margin-bottom: 10em;">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-612text-center">
                            <img src="assets/premio.png">
                            <h2 class="text-primary">1 Lugar</h2>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                            <img src="assets/premio.png">
                            <h2 class="text-primary">2 Lugar</h2>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                            <img src="assets/premio.png">
                            <h2 class="text-primary">3 Lugar</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fillWidth fadeIn wow collapse in cancha" data-wow-delay="0.5s">
            <img src="assets/cancha.png">
        </div>        
    </section>
       <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <ul class="list-inline icons-footer">
                      <li><a rel="nofollow" href="" title="Facebook"><img src="assets/face.png"></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Instagram"><img src="assets/insta.png"></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Unicentro"><img src="assets/unicen.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- inicio modal registro login -->
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">

                                    <div class="col-xs-6  text-center">
                                        <a href="#" class="active" id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="#" id="register-form-link">Registro</a>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="ro">
                                    <div class="col-lg-12">
                                        <form id="login-form" role="form">
                                            <div class="form-group">

                                                <input type="text" name="username" id="emaill" tabindex="1" class="form-control" placeholder="email" value="">
                                                <small id="msg-emaill" class="msg-rojo-small"></small>
                                            </div>
                                            <div class="form-group ">
                                                <input type="password" name="password" id="passwordl" tabindex="2" class="form-control" placeholder="Password">
                                                <small id="msg-passwordl" class="msg-rojo-small"></small>
                                            </div>

                                            <div class="form-group text-center" id="gif-login">
                                                <img src="assets/ajax-loader.gif">
                                            </div>
                                             
                                             
                                            
                                            <div class="form-group" id="no-conected">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="https://www.facebook.com/app_scoped_user_id/1828944070740875" class="btn-fcbk btn--big btn--responsive LoginView-socialbtn"><span class="icon--line icon-fcbk"></span><span>Ingresa con facebook</span></a>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="button" class="btn-uni btn-primary-uni" onclick="Login();">Ingresar</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                        <form id="register-form" role="form" style="display: none;">
                                            <div class="form-group">
                                                <input id="emailr" type="email" tabindex="1" class="form-control" placeholder="email" autocomplete="true" required>
                                                <small id="msg-emailr" class="msg-rojo-small"></small>
                                            </div>

                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control" tabindex="1" placeholder="password" name="password" required>
                                            </div>

                                            <div class="form-group">
                                                <input id="password-confirm" type="password" class="form-control" tabindex="1" name="password_confirmation" placeholder="confirmar password" required>
                                            </div>

                                            <div class="form-group text-center" id="gif-registro">
                                                <img src="assets/ajax-loader.gif" style="margin-top: 15px;">
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12 text-center">
                                                    <button type="button" class="btn-uni btn-primary-uni" onclick="RegistroPost();" style="margin-top: 15px;">Registrarse</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- fin modal registro login -->




<!-- inicio modal registro login -->
<div id="aboutModalphoto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7 ">
                    <form action="/upload" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="btn-uni upload-btn-wrapper ">
                            <p class="btn-file btn-small">Elegir foto</p>
                            <input type="file" class="btn-file btn-small" id="fileUpload" name="photos[]" />
                        </div>

                        <div style="position: relative;">
                          <li class="crop">
                            <canvas id="canvas" class="col-md-12 medidasmarco " style="background-color: #fff; " ></canvas>
                          </li>  
                            <img src="assets/titular.png" style="color:red;" class="img-izquierda">
                      <img src="assets/unicen.png" style="color:red;" class="img-derecha-upload">
                      <img src="" style="width: 50px; " class="img-bandera-upload" id="load-bandera">
                      <p  class="img-derecha-text-upload"> 
                        <small>unicentro</small>
                      </p>
                      <p  class="img-derecha-text-1-upload"> 
                        <small>cali</small>
                      </p>
                      <p  class="img-derecha-text-2-upload"> 
                        unicentro
                      </p>
                      <p  class="img-derecha-text-4-upload"> 
                        #
                      </p>
                      <p  class="img-derecha-text-5-upload"> 
                        mas
                      </p>
                      <p  class="img-derecha-text-3-upload"> 
                        emocion
                      </p>
                        </div>

                        <button type="submit" class="btn-uni btn-primary-uni">Guardar</button>
                    </form>
                </div>

                 
                <div class="col-md-5">
                @if($imagenesruta) 
                    <button style="margin-top: 13px;" class="btn-uni btn-primary-uni">Total me gusta :<strong> {{ $imagenesruta->like}} </strong></button>
                @endif
                 <div class="row"> 
                    <img src="bandera/brazil.png" name="brazil"  class="bander col-md-2" onclick="changeImage('brazil.png')">
                    <img src="bandera/rusia.png" name="rusia"  class="bander col-md-2" onclick="changeImage('rusia.png')">
                </div>

                </div>
                    
                

            </div>
        </div>
    </div>
    
</div>
    <div class="modal-footer">
        <button type="button" class="btn-uni btn-danger-uni" data-dismiss="modal">Cerrar</button>
    </div>

</form>    
          </div>
        </div>
    </div>
</div>

<!-- fin modal subir foto     -->



<!-- inicio modal mi foto -->
@if(Auth::check())
<div id="meaboutModalphoto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7 marco-background"> 
                   
                  @if($imagenesruta) 
                     <div style="position: relative;"> 
                     <li class="crop">          
                      <img src="imagenes/{{$imagenesruta->src_imagen}}" alt="..." class="col-md-12 example un" style="max-width: 100%; padding:0px;">
                      </li>
                      <img src="assets/titular.png" style="color:red;" class="img-izquierda">
                      <img src="assets/unicen.png" style="color:red;" class="img-derecha">
                      <img src="bandera/brazil.png" style="color:red; " class="img-bandera">

                      <p  class="img-derecha-text"> 
                        <small>unicentro</small>
                      </p>
                      <p  class="img-derecha-text-1"> 
                        <small>cali</small>
                      </p>
                      <p  class="img-derecha-text-2"> 
                        unicentro
                      </p>
                      <p  class="img-derecha-text-4"> 
                        #
                      </p>
                      <p  class="img-derecha-text-5"> 
                        mas
                      </p>
                      <p  class="img-derecha-text-3"> 
                        emocion
                      </p>
                     </div>

                  @endif    
                        <div class="caption">
                           <p><strong style="color:red;"># </strong> mi papa es <strong style="color:black;">mundial</strong></p> 
                        </div>
                    
                </div>
                <div class="col-md-5"> 
                <div class="col-md-5">
                @if($imagenesruta) 
                    <button style="margin-top: 13px;" class="btn-uni btn-primary-uni">Total me gusta :<strong> {{ $imagenesruta->like}} </strong></button>
                @endif    
                        </div>
                    <form> 
                </div>
            </div>
        </div>
    </div>
    
</div>
    <div class="modal-footer">
        <button type="button" class="btn-uni btn-danger-uni" data-dismiss="modal">Cerrar</button>
    </div>

</form>    
          </div>
        </div>
    </div>
</div>
@endif
<!-- fin modal mi foto     -->

    <!--scripts loaded here -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js/wow.js')}}"></script>
    <script src="{{ asset('js/jquery.interactive_bg.js')}}"></script>
    <script src="{{ asset('js/scripts.js')}}"></script>
    <script src="{{ asset('js/own.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/jquery-form.js')}}"></script>

    <script>

        $(document).ready(function(){
            $(".bg").interactive_bg({
               strength: 25,
               scale: 1,
               animationSpeed: "100ms",
               contain: true,
               wrapContent: false
             });
        });
         
          // change background size on window resize
          $(window).resize(function() {
              $(".bg > .ibg-bg").css({
                width: $(window).outerWidth(),
                height: $(window).outerHeight()
              })
           })
    </script>
  </body>
</html>