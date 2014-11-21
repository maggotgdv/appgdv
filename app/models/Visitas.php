<?php
class Visitas extends Eloquent
{
	protected $table ="visitas";
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