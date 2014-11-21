<?php
class Comentarios extends Eloquent
{
	protected $table ="comentarios";
	protected $fillable = array('comentarios_Local_Id', 'comentarios_Titulo', 'comentarios_Descripcion','comentarios_Valoracion','comentarios_Persona_Id');
	protected $guarded = array('id');
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