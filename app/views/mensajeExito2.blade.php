<html class="html">
  <head>
	<script type="text/javascript">
		if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["jquery-1.8.3.min.js", "museutils.js", "jquery.watch.js", "principal.css"], "outOfDate":[]};
	</script>

	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta name="generator" content="2014.0.0.264"/>
  	
	<title>NapoApp</title>


	
	{{	HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js')	}}
	{{	HTML::style('assets/css/imgPicker.css')	}}
	{{	HTML::script('assets/js/jquery-1.11.0.min.js')	}}
	{{	HTML::script('assets/js/imgPicker.js')	}}
	{{	HTML::script('//code.jquery.com/ui/1.11.0/jquery-ui.js')	}}
	{{	HTML::style('css/main.css' )	}}
	<script type="text/javascript">
   		document.documentElement.className += ' js';
	</script>

  </head>
  <body>
<script type="text/javascript">
function redict(url) {
   window.location.href = url;
    return false;
}
</script>
	<div class="clearfix colelem" id="pu165-4"><!-- group -->
		{{  HTML::image('images/exito.png', 'Exito', ['id'=>'u186-4', 'class'=>'grpelem','width'=>'314', 'height'=>'68']); }}
		<div class="grpelem" id="u187"><!-- custom html -->
			<section id="loginProduct">
				{{	Form::open(['class'=>'minimal']);	}}
					<div id="locales">
						{{	Form::image('images\napo_exito.png', 'exito_logo', ['height'=>'250','id'=>'logo']);	}}
						<h2 style="color:#585858">{{	$cuerpo	}}</h2>
						<br	/>
						{{	Form::button('Regresar', ['class'=>'btn-minimal','onclick'=>'redict("'.$url.'")']);	}}
					</div>
				{{	Form::close()	}}
			</section>
		</div>
	</div>
	<script type="text/javascript"> 
//refresca la ventana madre del popup 
window.opener.location.href=window.opener.location.href; 
</script>

						
						  </body>
</html>
