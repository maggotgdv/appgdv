@section('modulo')
	<div class="clearfix colelem" id="pu165-4"><!-- group -->
		{{  HTML::image('images/u165-4.png', 'Tu Perfil', ['id'=>'u165-4', 'class'=>'grpelem','width'=>'314', 'height'=>'68']); }}
		<div class="grpelem" id="u166"><!-- custom html -->
			<section id="loginProduct">
				{{	Form::open(['method'=>"POST", 'url'=>'tu-perfil', 'class'=>'minimal'])	}}
					<div id="locales">
						{{  Form::label('logo', 'Logo:')  }}
						{{   HTML::image($Logo, 'local_Logo2', ['class'=>'avatar','width'=>'90','height'=>'90','id'=>'local_Logo2']);  }}
						{{  Form::hidden('local_Logo', $Logo, ['class'=>'avatar','width'=>'90','height'=>'90','id'=>'local_Logo']);  }}

						<br />
						{{  Form::button('Cambiar Logo', ['class'=>'edit-avatar btn btn-minimal']); }}
						<br />
						<br />
						{{  Form::label('ColorEmpresa', 'Color de la Empresa:') }}
						{{  Form::select('local_Color', ['seleccionar'=>'Seleccion el color de su empresa','#7296FF'=>'Azul','#2DB200'=>'Verde','#D90000'=>'Rojo','#D9D900'=>'Amarillo','#B872FF'=>'Morado','#B28500'=>'Marron','#000000'=>'Negro'],$Color);  }}
						{{  Form::label('name', 'Usuario:') }}
						{{  Form::text('persona_Usuario', $Usuario, ['id'=>'usuario','placeholder'=>'Usuario debe tener entre 8 y 20 caracteres','disabled '=>'true']);  }}
						{{  Form::label('name', 'Nombre del Titular') }}
						{{  Form::text('persona_Nombre', $Nombre, ['id'=>'nombre','placeholder'=>'Napoleon','pattern'=>'^*{0,50}$','required'=>'required']); }}
						{{  Form::label('name', 'Apellido del Titular') }}
						{{  Form::text('persona_Apellido', $Apellido, ['id'=>'apellido','placeholder'=>'Sac','pattern'=>'^*{0,70}$','required'=>'required']);  }}
						{{  Form::label('name', 'Email del Titular')  }}
						{{  Form::text('persona_Email', $Email, ['id'=>'email','placeholder'=>'napo@napoapp.com','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}','required'=>'required']);  }}
						{{  Form::label('name', 'Telefono del Titular') }}
						{{  Form::text('persona_Telefono', $Telefono, ['id'=>'telefono','placeholder'=>'+51999999999','pattern'=>'^[+][0-9]{9,20}$','required'=>'required']);  }}
						{{  Form::label('name', 'Fecha de Nacimiento')  }}
						{{  Form::text('persona_FechaDeNacimiento', $Fnacimiento, ['id'=>'datepicker','placeholder'=>'2014/12/24','required'=>'required']) }}
						{{  Form::button('Cambiar Contraseña', ['id'=>'btnContraseña','class'=>'btn btn-minimal','onClick'=>"document.getElementById('oculto').style.visibility='visible'"]); }}
						<div id="oculto" style="visibility:hidden"> 
							{{  Form::label('name', 'Password:')  }}
							{{  Form::password('persona_Password',['id'=>'password','placeholder'=>'Password debe contener 1 mayuscula, minusculas y numeros','pattern'=>'(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$']);  }}
							{{  Form::label('name', 'Confirmar Password:')  }}
							{{  Form::password('persona_Password_confirmar', ['id'=>'conf_password','placeholder'=>'Confirmar Password','pattern'=>'(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$']); }}
						</div> 
						{{  Form::submit('GuardarTuPerfil', ['class'=>'btn-minimal']);  }}
				{{	Form::close()	}}
			</section>
		</div>
	</div>
	<div class="verticalspacer">
	</div>
	<script>
		$(function() {
			// Avatar
			$('.edit-avatar').imgPicker({
				el: '.avatar',
				type: 'avatar',
				minWidth: 90,
				minHeight: 90,
				title: 'Cambie su logo'
			});     
		});   
	</script>

@stop