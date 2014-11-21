@section('modulo')
	<div class="clearfix colelem" id="pu156-4"><!-- group -->
		{{	HTML::image('images/u156-4.png', 'Tu Local', ['id'=>'u156-4', 'class'=>'grpelem','width'=>'314', 'height'=>'68'])	}}<!-- rasterized frame -->
		<div class="grpelem" id="u154"><!-- custom html -->
			<section id="loginProduct">	
				{{	Form::open(['method'=>"POST", 'url'=>'principal', 'class'=>'minimal']);	}}
					<div id="locales">
						{{	Form::label('Nombre', 'Nombre Comercial de la empresa:')	}}
						{{	Form::input('text', 'empresa_Nombre', $NombreCom,['id'=>'empresa_Nombre', 'placeholder'=>'Nombre comercial de la empresa', 'pattern'=>'^*{0,50}$', 'required'=>'required']);	}}
						{{	Form::label('Direccion', 'Dirección:')	}}
						{{	Form::input('text', 'local_Direccion', $Direccion,['id'=>'local_Direccion', 'placeholder'=>'Direccion de la empresa', 'pattern'=>'^*{0,100}$', 'required'=>'required']);	}}
						{{	Form::label('Telefono', 'Telefono:')	}}
						{{	Form::input('text', 'local_Telefono', $Telefono,['id'=>'local_Telefono', 'placeholder'=>'Telefono de la empresa: 51999999999', 'pattern'=>'^[0-9]{6,20}$', 'required'=>'required']);	}}
						{{	Form::label('Delivery', 'Delivery:')	}}
						{{	Form::select('local_Delivery', array('seleccionar'=>'Seleccionar si tiene delivery','si'=>'Si','no'=>'No'), $Delivery)	}}
						{{	Form::label('Categoria', 'Categoria:')	}}
						{{	Form::select('categoria', $llenarCategoria,$Categoria)	}}	
						{{	Form::label('Producto', 'Producto:')	}}
					</div>
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
									{{	Form::text('foto', 'Foto', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
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
											{{	Form::text('producto_Foto_'.$producto->id, $producto->producto_Foto, ['id'=>'Producto_Foto_'.$producto->id, 'placeholder'=>'url: http://www.example.com/photo1.jpg', 'pattern'=>'^[h][t][t][p][a-zA-Z0-9-_\.:/%&?!#()]{0,100}$']);	}}
										</td>		
									</tr>
								@endforeach	
							</div>
						</table>
						{{	Form::button('Nuevo Producto', ['class'=>'btn-minimal', 'onclick'=>'nueva_linea()']);	}}
						{{	Form::button('Eliminar Producto', ['class'=>'btn-minimal', 'onclick'=>'ventanaSecundaria("http://admin.napoapp.com/producto")']);	}}
						{{	Form::label('Horario_EntradaEntrada','Horario de Entrada:')	}}
						<table width="900" border="0">
							<div id="lineas">
								<tr style="width:900px">
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'L', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Lunes', $LunesE[0], ['id'=>'Entrada_lunes_hora','class'=>'hora','placeholder'=>'21', 'onchange'=>'cambiarHora(this.value)']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Lunes', $LunesE[1],['class'=>'minuto', 'placeholder'=>'00', 'onchange'=>'cambiarMin(this.value)', 'id'=>'Entrada_lunes_minutos']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'M', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Martes', $MartesE[0], ['class'=>'hora', 'placeholder'=>'21', 'onchange'=>'cambiarHora(this.value)', 'id'=>'Entrada_martes_hora']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Martes', $MartesE[1], ['class'=>'minuto','placeholder'=>'00','onchange'=>'cambiarMin(this.value)','id'=>'Entrada_martes_minutos']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'M', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Miercoles', $MiercolesE[0], ['class'=>'hora','placeholder'=>'21','onchange'=>'cambiarHora(this.value)','id'=>'Entrada_miercoles_hora'  ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Miercoles', $MiercolesE[1], ['class'=>'minuto','placeholder'=>'00', 'onchange'=>'cambiarMin(this.value)','id'=>'Entrada_miercoles_minutos' ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'J', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Jueves', $JuevesE[0], ['class'=>'hora','placeholder'=>'21', 'onchange'=>'cambiarHora(this.value)','id'=>'Entrada_jueves_hora' ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Jueves', $JuevesE[1], ['class'=>'minuto','placeholder'=>'00','onchange'=>'cambiarMin(this.value)','id'=>'Entrada_jueves_minutos',]);	}}     							
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'V', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Viernes', $ViernesE[0], ['class'=>'hora','placeholder'=>'21','onchange'=>'cambiarHora(this.value)','id'=>'Entrada_viernes_hora' ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Viernes', $ViernesE[1], ['class'=>'minuto','placeholder'=>'00','onchange'=>'cambiarMin(this.value)','id'=>'Entrada_viernes_minutos' ]);	}}
									</td>	
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'S', ['style'=>'background-color:#9A1518; color:#FFFFFF', 'disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Sabado', $SabadoE[0], ['class'=>'hora','placeholder'=>'21','onchange'=>'cambiarHora(this.value)','id'=>'Entrada_sabado_hora' ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Sabado', $SabadoE[1], ['class'=>'minuto','placeholder'=>'00','onchange'=>'cambiarMin(this.value)','id'=>'Entrada_sabado_minutos']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'D', ['style'=>'background-color:#9A1518; color:#FFFFFF', 'disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Entrada_Domingo', $DomingoE[0], ['class'=>'hora','placeholder'=>'21','onchange'=>'cambiarHora(this.value)','id'=>'Entrada_domingo_hora']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Entrada_Domingo', $DomingoE[1], ['class'=>'minuto','placeholder'=>'00','onchange'=>'cambiarMin(this.value)','id'=>'Entrada_domingo_minutos' ]);	}}
									</td>
								</tr>
							</div>
	    				</table>

						{{	Form::label('salida', 'Horario de Salida:')	}}
						<table width="900" border="0">
							<div id="lineas">
								<tr style="width:900px">
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'L', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Lunes', $LunesS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_lunes_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Lunes', $LunesS[1], ['class'=>'minutoS','placeholder'=>'00','onchange'=>'cambiarMinS(this.value)','id'=>'Salida_lunes_minutos', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'M', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Martes', $MartesS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_martes_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Martes', $MartesS[1], ['class'=>'minutoS','placeholder'=>'00','onchange'=>'cambiarMinS(this.value)','id'=>'Salida_martes_minutos', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'M', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Miercoles', $MiercolesS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_miercoles_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Miercoles', $MiercolesS[1], ['class'=>'minutoS','placeholder'=>'00','onchange'=>'cambiarMinS(this.value)','id'=>'Salida_miercoles_minutos', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'J', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Jueves', $JuevesS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_jueves_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Jueves', $JuevesS[1], ['class'=>'minutoS','placeholder'=>'00','onchange'=>'cambiarMinS(this.value)','id'=>'Salida_jueves_minutos', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'V', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Viernes', $ViernesS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_viernes_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Viernes', $ViernesS[1], ['class'=>'minutoS','placeholder'=>'00','onchange'=>'cambiarMinS(this.value)','id'=>'Salida_viernes_minutos', ]);	}}
									</td>	
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'S', ['style'=>'background-color:#9A1518; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Sabado', $SabadoS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_sabado_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Sabado', $SabadoS[1], ['class'=>'minutoS','placeholder'=>'00','onchange'=>'cambiarMinS(this.value)','id'=>'Salida_sabado_minutos',' pattern'=>'^[0-9][0-9]$']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('', 'D', ['style'=>'background-color:#9A1518; color:#FFFFFF','disabled']);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('hora_Salida_Domingo', $DomingoS[0], ['class'=>'horaS','placeholder'=>'21','onchange'=>'cambiarHoraS(this.value)','id'=>'Salida_domingo_hora', ]);	}}
									</td>
									<td style="padding:0; margin:0; width:4,7%;">
										{{	Form::text('minuto_Salida_Domingo', $DomingoS[1], ['class'=>'minutoS','placeholder'=>'00',' onchange'=>'cambiarMinS(this.value)','id'=>'Salida_domingo_minutos',' pattern'=>'^[0-9][0-9]$']);	}}
									</td>
								</tr>
							</div>
						</table>
						{{	Form::text('local_Latitud', $Latitud, ['id'=>'local_Latitud','placeholder'=>'Latitud']);	}}
						{{	Form::text('local_Longitud', $Longitud, ['id'=>'local_Longitud', 'placeholder'=>'Longitud']);	}}

						<div id="map" style="width:90%; height:500px">	
						</div>
						<br />
						{{	Form::submit('guardarPrincipal', ['class'=>'btn-minimal', 'title'=>'Guardar'])	}}
				{{	Form::close()	}}
			</section>

			{{	HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false')	}}
			<script>
				function initialize() {
					var latitude = document.getElementById('local_Latitud');
					var longitude = document.getElementById('local_Longitud');
					var lat;
					var lon;
					if(latitude.value==0 || longitude.value==0)
					{
						lat=-16.39870250833782;
						lon=-71.53699442882203;
					}
					else
					{
						lat=latitude.value;
						lon=longitude.value;
					}
					var zoom = 15;

					var LatLng = new google.maps.LatLng(lat,lon);
				    
					var mapOptions = {
						zoom: zoom,
						center: LatLng,
						panControl: false,
						zoomControl: false,
						scaleControl: true,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}  
			    
					var map = new google.maps.Map(document.getElementById('map'),mapOptions);
					var marker = new google.maps.Marker({
						position: LatLng,
						map: map,
						title: 'Drag Me!',
						draggable: true
					});
			    
					google.maps.event.addListener(marker, 'dragend', function(marker){
						var latLng = marker.latLng;
						latitude.value = latLng.lat();
						longitude.value = latLng.lng();
					});
				}
				initialize();
			</script>
			<script language=javascript> 
 function ventanaSecundaria (URL){ 
    window.open(URL,"ventana1","width=1024,height=500,scrollbars=YES") 
 } 
 </script>  
			<script>
				$(function() {
					// Avatar
					$('.edit-avatar').imgPicker({
						el: '.avatar',
						type: 'avatar',
						minWidth: 90,
						minHeight: 90,
						title: 'Change your avatar'
					});
				});
			</script>
		</div>
	</div>
	<div class="verticalspacer"></div>

					

@stop
