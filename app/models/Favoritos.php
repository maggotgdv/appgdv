<?php
class Favoritos extends Eloquent
{
	protected $table ="favoritos";
	public $timestamp = False;
	//relacion de muchos a 1 con local
	public function local(){
		return $this->belongsTo('Local');
	}
	//relacion de muchos a 1 con persona
	public function persona(){
		return $this->belongsTo('Persona');
	}
}
?>