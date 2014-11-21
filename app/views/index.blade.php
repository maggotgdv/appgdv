<!DOCTYPE html>
<html class="html">
 <head>
  <script type="text/javascript">
    if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "jquery.watch.js", "index.css"], "outOfDate":[]};
  </script>
  
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2014.0.1.264"/>

  <title>Inicio</title>

  {{  HTML::style('css/site_global.css?475048684')  }}
  {{  HTML::style('css/master_a-p_g_-maestra.css?252403229')  }}
  {{  HTML::style('css/index.css?271616229',['id'=>'pagesheet'])  }}
  {{  HTML::style('css/main.css') }}


  <script type="text/javascript">
   document.documentElement.className += ' js';
  </script>
  
  </head>
  <body>
    <div class="clearfix" id="page"><!-- group -->
      <div class="clearfix grpelem" id="pu77"><!-- group -->
        <div class="browser_width" id="u77-bw">
          <div id="u77"><!-- simple frame -->
          </div>
        </div>
        <div class="clip_frame" id="u78"><!-- image -->
          {{ HTML::image('images/napo_logo_pequeno.png', '', ['class'=>'block','id'=>'u78_img','width'=>'76','height'=>'76']) }}
        </div>
          {{  HTML::image('images/u84-4.png', 'Napo', ['id'=>'u84-4','width'=>'260','height'=>'51'])  }}
      </div>
      <div class="clip_frame grpelem" id="u107"><!-- image -->
        {{  HTML::image('images/napo%20logo.jpg', '', ['class'=>'block', 'id'=>'u107_img','width'=>'600','height'=>'600']) }}
      </div>
      <div class="clearfix grpelem" id="pu113-4"><!-- column -->
        {{  HTML::image('images/u113-4.png', 'Login', ['class'=>'colelem','id'=>'u113-4','width'=>'314','height'=>'103' ])  }}
        <div class="colelem" id="u117"><!-- custom html -->
          <section id="loginBox">
            {{ Form::open(['method'=>'POST','url'=>'/validar','class'=>'minimal']) }}
              {{  Form::label('username', 'Username') }}
              {{  Form::text('persona_Usuario','', ['id'=>'username','placeholder'=>'Usuario debe tener entre 8 y 20 caracteres','pattern'=>'^[a-zA-Z][a-zA-Z0-9-_\.]{2,20}$','required'=>'required']);  }}
              {{  Form::label('pass', 'Password')  }}
              {{  Form::password('persona_Password',['id'=>'password','placeholder'=>'Password debe contener 1 mayuscula, minusculas y numeros','pattern'=>'(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$','required'=>'required']);  }}
              {{  Form::submit('Ingresar', ['class'=>'btn-minimal'])  }}
            {{  Form::close()  }}
            <a href="{{ url('/recuperarContrasena') }} " class="nonblock nontext">
                {{  Form::image('images/u227-4.png', 'Olvide mi contraseña',['style'=>'padding:15px'])  }}
            </a>
          </section>
        </div>
      </div>
      <div class="clearfix grpelem" id="pu80-4"><!-- group -->
      <div class="clearfix" id="u80-4"><!-- content -->
        <p>Administracion de Napo</p>
      </div>
      <a class="nonblock nontext clearfix" id="u83-4" href="http://www.naposac.com/"><!-- content --><p>Sobre Napo</p></a>
    </div>
    <div class="verticalspacer">
    </div>
  </div>
 </body>
</html>