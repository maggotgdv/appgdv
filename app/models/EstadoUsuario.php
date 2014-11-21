<?php
class EstadoUsuario extends Eloquent
{
	protected $table ="estadousuario";
	public $timestamp = False;
	//relacion de 1 a muchos con persona
	public function persona(){
		return $this->hasMany('Persona','persona_EstadoUsuario_Id');
	}
}
?>