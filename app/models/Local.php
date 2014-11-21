<?php
class Local extends Eloquent
{
	protected $table ="local";




	
	public $timestamp = False;
	//relacion de 1 a muchos con favoritos
	public function favoritos(){
		return $this->hasMany('Favoritos','favoritos_Local_Id');
	}
	//relacion de 1 a muchos con comentarios
	public function comentarios(){
		return $this->hasMany('Comentarios','comentarios_Local_Id');
	}
	//relacion de 1 a muchos con visitas
	public function visitas(){
		return $this->hasMany('Visitas','visitas_Local_Id');
	}
	//relacion de 1 a muchos con horario
	public function horario(){
		return $this->hasMany('Horario','horario_local_Id');
	}
	//relacion de 1 a muchos con promociones
	public function promociones(){
		return $this->hasMany('Promociones','promociones_local_Id');
	}	
	//relacion de 1 a muchos con producto
	public function producto(){
		return $this->hasMany('Producto','producto_local_Id');
	}	
	//relacion de muchos a 1 con categorias
	public function categorias(){
		return $this->belongsTo('Categorias');
	}
		//relacion de muchos a 1 con persona
	public function persona(){
		return $this->belongsTo('Persona');
	}
	//relacion de muchos a 1 con empresa
	public function empresa(){
		return $this->belongsTo('Empresa');
	}
}
?>