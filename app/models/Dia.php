<?php
class Dia extends Eloquent
{
	protected $table ="dia";
	public $timestamp = False;
	//relacion de 1 a muchos con horario
	public function horario(){
		return $this->hasMany('Horario','horario_Dia_Id');
	}
}
?>