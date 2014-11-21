<?php
class Roles extends Eloquent
{
	protected $table ="roles";
	public $timestamp = False;
	//relacion de 1 a muchos con persona
	public function persona(){
		return $this->hasMany('Persona','persona_Roles_Id');
	}
}
?>