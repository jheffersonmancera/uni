    <!DOCTYPE HTML>

    <html lang="en">
    <head>
        <!-- Force latest IE rendering engine or ChromeFrame if installed -->
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta charset="utf-8">
        <title>Unicentro</title>
        <meta name="description" content="unicentro el centro de todos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap styles -->

   
    <link rel="stylesheet" href="css/style.css">
    <!-- blueimp Gallery styles -->
    <!-- <link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"> -->
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link href="{{ asset('css/bootstrap3-3-7.css') }}" rel="stylesheet">
    <link href="{{ asset('css/own.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- <link href="{{ asset('css/own.css') }}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/jquery.fileupload.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fileupload-ui.css')}}">
 -->

    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
    </head>
    <body>

    
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">
        Unicentro
      </a>
    </div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
       @if( ! empty($data))
    <li>
      <img src="{{$data->getAvatar()}}" alt="Avatar" class="avatar">
    </li>
    <li>
      <a class="nav-link" href="https://www.facebook.com" target="_blank">{{$data->getName()}}</a>
    </li>
        @else
    <li>
      <img src="" alt="Avatar" class="avatar">
    </li>
    <li>
      <a class="nav-link" href="https://www.facebook.com" target="_blank">andres</a>
    </li>    
        @endif 
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <span class="caret"></span>
      </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
    </form>

    </div>
    </li>
    </ul>
  </div>
    

  </div>
</nav>


<div class="container">


<!-- Large modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  Subir Imagen
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

      <div class="row">
       <div class="col-md-12">
       <div class="row">
      <div class="col-md-7">
        <form  action="/upload" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
        
        <div class="upload-btn-wrapper ">
        <p class="btn-file btn-small">Upload a file</p>
        <input type="file" class="btn-file btn-small" id="fileUpload" name="photos[]"  />
       </div>
        
        <div>
      <canvas id="canvas"></canvas>
      <div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
   </div>
       </div>
      
      <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
      </div>
      
      <div class="col-md-5 padding-img-btn">
        <div class="btn-group btn-group-sm padding-img-btn text-center" role="group" aria-label="...">
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary filter-btn brightness-remove">-</button>
         </div>
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-default">brillo</button>
         </div>
         <div class="btn-group" role="group">
         <button type="button" class="btn btn-primary filter-btn brightness-add">+</button>
        </div>
       </div>

       <div class="btn-group btn-group-sm padding-img-btn" role="group" aria-label="...">
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary filter-btn contrast-remove">-</button>
         </div>
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-default">contraste</button>
         </div>
         <div class="btn-group" role="group">
         <button type="button" class="btn btn-primary filter-btn contrast-add">+</button>
        </div>
       </div>

       <div class="btn-group btn-group-sm padding-img-btn" role="group" aria-label="...">
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary filter-btn saturation-remove">-</button>
         </div>
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-default">saturacion</button>
         </div>
         <div class="btn-group" role="group">
         <button type="button" class="btn btn-primary filter-btn saturation-add">+</button>
        </div>
       </div>

       <div class="btn-group btn-group-sm padding-img-btn" role="group" aria-label="...">
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary filter-btn vibrance-remove">-</button>
         </div>
         <div class="btn-group" role="group">
          <button type="button" class="btn btn-default">vibrance</button>
         </div>
         <div class="btn-group" role="group">
         <button type="button" class="btn btn-primary filter-btn vibrance-add">+</button>
        </div>
       </div>
      </div>
       
     </div>
     </div>
        </div>
      <div class="modal-footer">
      <button type="button" id="revert-btn" class="btn btn-primary filter-btn vibrance-add">Eliminar filtros</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>


      
    </div>
  </div>
</div>
            
       

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="{{ asset('js/bootstrap-3-3-7.js')}}"></script>
    <script src="{{ asset('js/vendor/jquery.ui.widget.js')}}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
   
    <script src="{{ asset('js/load-imagen-all.js')}}"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="{{ asset('js/canvas-to-blob.js')}}"></script>
    <script src="{{ asset('js/jquery-form.js')}}"></script>
    
    <!-- blueimp Gallery script -->
    <script src="{{ asset('js/blueimp.js')}}"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{{ asset('js/jquery.iframe-transport.js')}}"></script>
    <!-- The basic File Upload plugin -->
    <!-- <script src="{{ asset('js/jquery.fileupload.js')}}"></script> -->
    <!-- The File Upload processing plugin -->
    <script src="{{ asset('js/jquery.fileupload-process.js')}}"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="{{ asset('js/jquery.fileupload-image.js')}}"></script>
    <!-- The File Upload audio preview plugin -->
    <!-- <script src="{{ asset('js/jquery.fileupload-audio.js')}}"></script> -->
    <!-- The File Upload video preview plugin -->
    <!-- <script src="{{ asset('js/jquery.fileupload-video.js')}}"></script> -->
    <!-- The File Upload validation plugin -->
    <!-- <script src="{{ asset('js/jquery.fileupload-validate.js')}}"></script> -->
    <!-- The File Upload user interface plugin -->
    <!-- <script src="{{ asset('js/jquery.fileupload-ui.js')}}"></script> -->
    <!-- The main application script -->
    <script src="{{ asset('js/caman.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->

    </body>
    </html>