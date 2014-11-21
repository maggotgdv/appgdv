<?php
class Empresa extends Eloquent
{
	protected $table ="empresa";

	public $timestamp = False;
	//relacion de 1 a muchos con local
	public function local(){
		return $this->hasMany('Local','local_Empresa_Id');
	}
}
?>