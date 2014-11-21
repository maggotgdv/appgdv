@section('modulo')
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
@stop

