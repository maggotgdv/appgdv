<html class="html">
  <head>
	<script type="text/javascript">
		if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "jquery.watch.js", "principal.css"], "outOfDate":[]};
	</script>
	
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta name="generator" content="2014.0.0.264"/>
  	
	<title>NapoApp</title>

	{{	HTML::style('css/site_global.css?475048684')	}}
	{{  HTML::style('css/master_principal.css?163213393')  }}
	{{  HTML::style('css/principal.css?4282381429', ['id'=> 'pagesheet']) }}
	{{  HTML::style('css/tu-perfil.css?4268295773', ['id'=> 'pagesheet']) }}
	{{  HTML::style('css/promociones.css?510860514', ['id'=> 'pagesheet']) }}
	
	{{	HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js')	}}
	{{	HTML::style('assets/css/imgPicker.css')	}}
	{{	HTML::script('assets/js/jquery-1.11.0.min.js')	}}
	{{	HTML::script('assets/js/imgPicker.js')	}}
	{{	HTML::script('//code.jquery.com/ui/1.11.0/jquery-ui.js')	}}
	{{	HTML::style('css/main.css' )	}}
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>



  </head>
  <body>
	<div class="clearfix" id="page"><!-- column -->
		<div class="position_content" id="page_position_content">
			<div class="clearfix colelem" id="pu132"><!-- group -->
				<div class="browser_width" id="u132-bw">
					<div id="u132"><!-- simple frame --></div>
				</div>
				<div class="clip_frame " id="u135"><!-- image -->
					{{	HTML::image('images/napo_logo_pequeno.png', "", ['class'=>'block', 'id'=>'u135_img', 'width'=>'76', 'height'=>'76']);	}}
				</div>
				{{	HTML::image('images/u131-4.png', 'Napo', ['id'=>'u131-4', 'width'=>'149', 'height'=>'51']);	}} <!-- rasterized frame -->
			</div>
			{{	HTML::link('principal', 'Tu Local', ['class'=>'nonblock nontext MuseLinkActive clearfix pinned-colelem', 'id'=>'u148-4']);	}}

			{{	HTML::link('tu-perfil', 'Tu Perfil',['class'=>'nonblock nontext clearfix pinned-colelem', 'id'=>'u149-4'])	}}
			<div class="pinned-colelem" id="u138"><!-- custom html -->
				<p id="Bienvenido" style="color:#159544; font-size:18px;" >Bienvenido: {{	Session::get('sesion_Nombre_Persona')	}}</p>
			</div>
			{{	HTML::link('promociones', 'Promociones', ['class'=>'nonblock nontext clearfix pinned-colelem', 'id'=>'u157-4'])	}}
<!--			{{	HTML::link('http://admin.napoapp.com/', 'Cerrar Sesión', ['class'=>'nonblock nontext clearfix pinned-colelem', 'id'=>'u134-4'])	}}
-->
			{{	HTML::link('/', 'Cerrar Sesión', ['class'=>'nonblock nontext clearfix pinned-colelem', 'id'=>'u134-4'])	}}
	<div class="clearfix colelem" id="pu165-4"><!-- group -->
		{{  HTML::image('images/error.png', 'Error', ['id'=>'u186-4', 'class'=>'grpelem','width'=>'314', 'height'=>'68']); }}
		<div class="grpelem" id="u187"><!-- custom html -->
			<section id="loginProduct">
				{{	Form::open(['class'=>'minimal']);	}}
					<div id="locales">
						{{	Form::image('images\napo_error.png', 'error_logo', ['height'=>'250','id'=>'logo']);	}}
						<br	/><br	/>
						<h2 style="color:#585858">Ups! parece que algo salió mal :'(</h2>
						<br	/>
						{{	Form::button('Regresar', ['class'=>'btn-minimal','onclick'=>'history.back(-1)']);	}}
					</div>
				{{	Form::close()	}}
			</section>
		</div>
	</div>

		</div>
	</div>
  </body>
</html>

