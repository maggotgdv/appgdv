<!DOCTYPE html>
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
	<script type="text/javascript">
   		document.documentElement.className += ' js';
	</script>

	<script>
  		$(function() {
  			$( "#datepicker" ).datepicker();
  		});
	</script>

	<script type="text/javascript">
		function calcular_total() {
			importe_total = 0
			$(".importe_linea").each(function(index, value) {
				importe_total = importe_total + eval($(this).val());
			});
			$("#total").val(importe_total);
		}
		
		var Bhora=0;
		function cambiarHora(valor){
			if(Bhora==0){
				$(".hora").each(function(index,value){
					$(this).attr( "value", valor );
				});
				Bhora=1;
			}
		}

		var BMin=0;
		function cambiarMin(valor){
			if(BMin==0)
			{
				$(".minuto").each(function(index,value){
					$(this).attr( "value", valor );
				});
				BMin=1;
			}
		}

		var BhoraS=0;
		function cambiarHoraS(valor){
			if(BhoraS==0)
			{
				$(".horaS").each(function(index,value){
					$(this).attr( "value", valor );
				});
				BhoraS=1;
			}
		}

		var BMinS=0;
		function cambiarMinS(valor){
			if(BMinS==0)
			{
				$(".minutoS").each(function(index,value){
					$(this).attr( "value", valor );
				});
				BMinS=1;
			}
		}

		var cc=1;

		function nueva_linea() {
			cc=cc+1;
			$("#lineas").append('<tr style="width:900px" ><td style="padding:0; margin:0; width:45px;">  <label>&nbsp</label></td><td style="padding:0; margin:0; width:225px;">            	<input type="text" value="" placeholder="ej: ceramico napo" pattern="^*{0,50}$" id="Producto_Nombre_D'+cc+'" required="required" name="producto_Nombre_D'+cc+'" />	</td>           <td style="padding:0; margin:0; width:225px;">          	<input type="text" value="" placeholder="ej: ceramico de 2x2 con textura..." id="Producto_Descripcion_D'+cc+'" pattern="^*$"  name="producto_Descripcion_D'+cc+'"/>           	</td>            <td style="padding:0; margin:0; width:225px;">            	<input type="text"  value=""   placeholder="ej: 01,10" pattern="^[0-9]{1,10}[.][0-9][0-9]$" id="Producto_Precio_D'+cc+'" required="required" name="producto_Precio_D'+cc+'"/>           	</td>            <td style="padding:0; margin:0; width:225px;">            	<input type="text"   value=""  placeholder="url: http://www.example.com/photo1.jpg" id="Producto_Foto_D'+cc+'"  name="producto_Foto_D'+cc+'"/>           	</td>	     	</tr>')}
	</script>
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

			@yield('modulo')

		</div>
	</div>
  </body>
</html>