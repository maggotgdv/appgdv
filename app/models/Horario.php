<?php
class Horario extends Eloquent
{
	protected $table ="horario";
	
	public $timestamp = false;
	//relacion de 1 a muchos con local
	public function local(){
		return $this->hasMany('Local','local_Horario_Id');
	}
	//relacion de muchos a 1 con dia
	public function dia(){
		return $this->belongsTo('Dia');
	}
	
}
?>