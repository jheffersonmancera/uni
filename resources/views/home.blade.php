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
        <img src="{{$data->getAvatar()}}" alt="Avatar" class="avatar">
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form  action="/upload" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
        
        <br /><br />
        <div class="upload-btn-wrapper">
        <p class="btn-file btn-small">Upload a file</p>
        <input type="file" class="btn-file btn-small" id="fileUpload" name="photos[]"  />
       </div>
        
        <div>
      <canvas id="canvas" width="112" height="112" style="margin-left: 3em;"></canvas>
      <div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
   </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>


      </form>
    </div>
  </div>
</div>
            
       

</div>
    <!-- The blueimp Gallery widget -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="avatar">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
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
    <script src="{{ asset('js/main.js')}}"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="js/cors/jquery.xdr-transport.js"></script>
    <![endif]-->

    </body>
    </html>