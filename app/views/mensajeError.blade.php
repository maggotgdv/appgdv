@section('modulo')
	<div class="clearfix colelem" id="pu165-4"><!-- group -->
		{{  HTML::image('images/error.png', 'Error', ['id'=>'u186-4', 'class'=>'grpelem','width'=>'314', 'height'=>'68']); }}
		<div class="grpelem" id="u187"><!-- custom html -->
			<section id="loginProduct">
				{{	Form::open(['class'=>'minimal']);	}}
					<div id="locales">
						{{	Form::image('images\napo_error.png', 'error_logo', ['height'=>'250','id'=>'logo']);	}}
						<br	/><br	/>
						<h2 style="color:#585858">{{	$cuerpo	}}</h2>
						<br	/>
						{{	Form::button('Regresar', ['class'=>'btn-minimal','onclick'=>'history.back(-1)']);	}}
					</div>
				{{	Form::close()	}}
			</section>
		</div>
	</div>
@stop

