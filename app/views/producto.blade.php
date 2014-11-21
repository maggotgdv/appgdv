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

		<div class="grpelem" id="u154"><!-- custom html -->
			<section id="loginProduct">	
				{{	Form::open(['method'=>"POST", 'url'=>'principal', 'class'=>'minimal']);	}}
  	<table width="900" border="0">
						<div id="lineas2">
							<tr style="width:900px">
								<td style="padding:0; margin:0; width:1 px;"> 
									{{	Form::label('','')	}}
								</td>
								<td style="padding:0; margin:0; width:215px;">
	        						{{	Form::text('Nombre', 'Nombre', ['style'=>'background-color:#4195FC; color:#FFFFFF', 'disabled']);	}}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{	Form::text('descripcion', 'Descripci&oacute;n', ['style'=>' background-color:#4195FC; color:#FFFFFF', 'disabled']);	}}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{	Form::text('precio', 'Precio', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{	Form::text('foto', 'Eliminar', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
								</td>		
	     					</tr>
						</div>
					</table>
<table width="900" border="0">
							<div id="lineas">
								@foreach ($Producto as $producto)	
									<tr style="width:900px">
										<td style="padding:0; margin:0; width:1 px; visibility:hidden"> 
											{{	Form::label('id', $producto->id)	}}
										</td>
										<td style="padding:0; margin:0; width:215px;">
											{{	Form::text('producto_Nombre_'.$producto->id, $producto->producto_Nombre, ['id'=>'Producto_Nombre_'.$producto->id, 'placeholder'=>'ej: ceramico napo', 'pattern'=>'^*{0,50}$','required'=>'required']);	}}
										</td>
										<td style="padding:0; margin:0; width:215px;">
											{{	Form::text('producto_Descripcion_'.$producto->id, $producto->producto_Descripcion, ['id'=>'Producto_Descripcion_'.$producto->id,'placeholder'=>'ej: ceramico de 2x2 con textura...', 'id'=>'Producto_Descripcion_1']);	}}
										</td>
										<td style="padding:0; margin:0; width:215px;">
											{{	Form::text('producto_Precio_'.$producto->id, $producto->producto_Precio, ['id'=>'Producto_Precio_'.$producto->id, 'placeholder'=>'ej: 05,10','required'=>'required']);	}}
										</td>
										<td style="padding:0; margin:0; width:215px;">
											{{  Form::button('eliminar',['class'=>'btn-minimal','onClick'=>'EliminarPromo("'.$producto->producto_cifrado.'")']);  }}
										</td>		
									</tr>
								@endforeach	
							</div>
						</table>
							{{	Form::close()	}}
			</section>
</div>

	<div class="verticalspacer"></div>
						<script type="text/javascript">
		function EliminarPromo(meta)
		{
			window.location= "./eliminarPro/"+meta;
		}
	</script>
						
						  </body>
</html>