@section('modulo')
	<div class="clearfix colelem" id="pu186-4"><!-- group -->
		{{  HTML::image('images/u186-4.png', 'Promociones', ['id'=>'u186-4', 'class'=>'grpelem','width'=>'314', 'height'=>'68']); }}
		<div class="grpelem" id="u187"><!-- custom html -->
			<section id="loginProduct">
				{{	Form::open(['method'=>"POST", 'url'=>'promociones', 'class'=>'minimal']);	}}
					<div id="locales">
						{{  Form::label('promocion', 'Tus Promociones') }}
					</div>
					<table width="840" border="0">
						<div id="lineas2">
							<tr style="width:900px">
								<td style="padding:0; margin:0; width:215px;">
									{{  Form::text('nombres', 'Nombre', ['style'=>' background-color:#4195FC; color:#FFFFFF','disabled']);  }}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{  Form::text('descrpcion', 'Descripci&oacute;n', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);  }}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{  Form::text('fechaf', 'Fecha de Fin', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);  }}
								</td>
								<td style="padding:0; margin:0; width:155px;">
									{{  Form::text('eliminar', 'Eliminar', ['style'=>'background-color:#4195FC; color:#FFFFFF','disabled']);  }}
								</td>   
							</tr>
						</div>
					</table>
					<table width="900" border="0">
						<div id="lineas">
						@foreach ($promocion as $Promocion)
							<tr style="width:900px">
							
								<td style="padding:0; margin:0; width:215px;">
									{{  Form::text('promociones_Titulo_'.$Promocion->id, $Promocion->promociones_Titulo, ['placeholder'=>'ej: ceramico 2x1','pattern'=>'^*{0,50}$','required'=>'required',' disabled']);  }}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{  Form::text('promociones_Descripcion_'.$Promocion->id, $Promocion->promociones_Descripcion, ['placeholder'=>'ej: 2x1 en ceramicos marca napo ...','pattern'=>'^*$','required'=>'required','disabled']);  }}
								</td>
								<td style="padding:0; margin:0; width:215px;">
									{{  Form::text('promociones_FechaFin_'.$Promocion->id, $Promocion->promociones_FechaFin, ['placeholder'=>'10/10/2014','pattern'=>'^[0-9]{1,10}[,][0-9][0-9]$','required'=>'required','disabled']);  }}
								</td>
								<td style="padding:0; margin:0; width:215px;">
										{{  Form::button('eliminar',['class'=>'btn-minimal','onClick'=>'EliminarPromo("'.$Promocion->promociones_cifrado.'")']);  }}
								</td>  
							</tr>
						@endforeach
							
						</div>
					</table>
					{{  Form::label('titulo', 'Titulo:')  }}
					{{  Form::text('promociones_N_Titulo', '', ['id'=>'Nombre','placeholder'=>'Nombre de la Promocion','pattern'=>'^*{0,50}$','required'=>'required']); }}
					{{  Form::label('descripcion', 'Descripcion:')  }}
					{{  Form::text('promociones_N_Descripcion', '', ['id'=>'Descripcion','placeholder'=>'Descricion de la promocion','pattern'=>'^*{0,100}$','required'=>'required']);  }}
					{{  Form::label('foto', 'Foto:')  }}
					{{  Form::text('promociones_N_Foto', '', ['id'=>'Foto','placeholder'=>'url: http://www.example.com/photo1.jpg','required'=>'required']);  }}
					<table width="840" border="0">
						<div id="lineas">
							<tr style="width:840px">
								<td style="padding:0; margin:0; width:280px;">
									{{  Form::label('', 'Fecha de Inicio:') }}
									{{  Form::text('promociones_FechaInicio', '', ['id'=>'datepickerini','placeholder'=>'24/12/2014','required'=>'required']); }}
								</td>
								<td style="padding:0; margin:0; width:280px;">
									{{  Form::label('', 'Hora de Inicio:')  }}
									{{  Form::select('promociones_horaInicio', ['Seleccione su hora de inicio','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24']) }}
								</td>
								<td style="padding:0; margin:0; width:280px;">
									{{  Form::label('', 'Minuto de Inicio:')  }}
									{{  Form::select('promociones_minutoInicio', ['Seleccione su minuto de inicio','00'=>'00','10'=>'10','20'=>'20','30'=>'30','40'=>'40','50'=>'50']) }}
								</td>
							</tr>
							<tr>
								<td style="padding:0; margin:0; width:280px;">
									{{  Form::label('', 'Fecha de Fin:')  }}
									{{  Form::text('promociones_FechaFin', '', ['id'=>'datepickerfin','placeholder'=>'24/12/2014','required'=>'required']); }}
								</td>
								<td style="padding:0; margin:0; width:280px;">
									{{  Form::label('', 'Hora de Fin:') }}
									{{  Form::select('promociones_HoraFin', ['Seleccione su hora de Fin','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24'])  }}
								</td>
								<td style="padding:0; margin:0; width:280px;">
									{{  Form::label('', 'Minuto de Fin:') }}
									{{  Form::select('promociones_minutoFin', ['Seleccione su minuto de Fin','00'=>'00','10'=>'10','20'=>'20','30'=>'30','40'=>'40','50'=>'50'])  }}
								</td>
							</tr>
						</div>
					</table>
					{{  Form::label('', 'Activo:')  }}
					{{  Form::select('promociones_Activo', ['Seleccione si esta activo','1'=>'Si','2'=>'No']) }}
					{{	Form::submit('guardarPromocion', ['class'=>'btn-minimal', 'title'=>'Guardar']);	}}
					{{  Form::button('Cancelar', ['id'=>'btnCancelar','class'=>'btn-minimal']); }}
				{{	Form::close()	}}
			</section>
		</div>
	</div>
	<div class="verticalspacer">
	</div>
	<script type="text/javascript">
		function EliminarPromo(meta)
		{
			window.location= "./eliminar/"+meta;
		}
	</script>
@stop