@section('modulo')
	<div class="clearfix colelem" id="pu156-4">
		<div class="grpelem" id="u154">
			<section id="loginProduct">	
				{{	Form::open(['class'=>'minimal']);	}}  
					<div id="locales">
						<h2>{{	$encabezado	}}</h2>
						<p>{{	$cuerpo	}}</p>
						<br	/>
						{{	Form::button('Regresar', ['class'=>'btn-minimal','onclick'=>'history.back(-1)']);	}}
					</div>
				{{	Form::close()	}}  
			</section>
		</div>
	</div>
@stop

