<?php

class Categorias extends Eloquent
{
	protected $table ="categorias";
	public $timestamp = False;
	//relacion de 1 a muchos con local
	public function local(){
		return $this->hasMany('Local','local_Categorias_Id');
	}
}

?>