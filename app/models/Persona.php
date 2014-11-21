<?php
class Persona extends Eloquent
{
	protected $table ="persona";

	//reglas de validacion
	private $regla = array(
		'persona_Usuario'	=> 'required|min:7',
		'persona_Password'	=> 'required',
/*		'persona_Nombre'	=> 'alpha|required'
/*		'persona_Apellido'	=> 'required|alpha'
/*		'persona_Email'		=> 'required|email'
/*		'persona_Telefono'	=> 'required'
*/		);

	//mensajes de validacion
	private $mensajes = array(
		'persona_Usuario.required'	=> 'El usuario es obligatorio.',
		'persona_Usuario.min'		=> 'El usuario debe tener al menos 8 caracteres.',
		'persona_Password.required'	=> 'El password es obligatorio.'
/*		'persona_Nombre.alpha'		=> 'El nombre debe contener solo letras.',
/*		'persona_Nombre.required'	=> 'El nombre es obligatorio.'
/*		'persona_Apellido.required'	=> 'El apellido es obligatorio.'
/*		'persona_Apellido.alpha'	=> 'El apellido debe contener solo letras.'
/*		'persona_Email.required'	=> 'El email es obligatorio.'
/*		'persona_Email.email'		=> 'El email no es un correo electronico valido.'
/*		'persona_Telefono.required'	=> 'El telefono	es obligatorio.'
*/		);
	
	private $errores;

	function validador($data){
		$validacion = Validator::make($data, $this->regla, $this->mensajes);

		if($validacion->fails()){
			$this->errores = $validacion->messages()->all();
			return false;
		}
		return true;	
	}

	function mostrarErrores(){
		return $this->errores;
	}



	public $timestamp = False;
	//relacion de 1 a muchos con local
	public function local(){
		return $this->hasMany('Local','local_Persona_Id');
	}
	//relacion de 1 a muchos con visitas
	public function visitas(){
		return $this->hasMany('Visitas','visitas_Persona_Id');
	}
	//relacion de 1 a muchos con favoritos
	public function favoritos(){
		return $this->hasMany('Favoritos','favorito_Persona_Id');
	}
	//relacion de 1 a muchos con comentarios
	public function comentarios(){
		return $this->hasMany('Comentarios','comentarios_Persona_Id');
	}

}
?>