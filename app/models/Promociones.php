<?php
class Promociones extends Eloquent
{
	protected $table ="promociones";
	public $timestamp = False;
	//relacion de muchos a 1 con local
	public function local(){
		return $this->belongsTo('Local');
	}
}
?>