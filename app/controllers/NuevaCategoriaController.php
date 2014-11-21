<?php

class NuevaCategoriaController extends \BaseController {
	protected $layout = 'master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Session::get('sesion_Nombre_local')==1)
		{
			$padre = Categorias::orderBy('categorias_Nombre','asc')->where('categorias_Nivel','=','1')->lists('categorias_Nombre','id');
			return View::make('categoria', ['llenarPadre'=>['0'=>'Sin Padre',$padre]]);
		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Session::get('sesion_Nombre_local')==1)
		{
			try{
					$cNombre = Input::get('Nombre_cat');
					$cColor = Input::get('Color_cat');
					$cPadre = Input::get('Padre_cat');
					$cNivel = 1;
					if($cPadre != 0)
					{
						$cNivel = 2;
					}
					$cSql = Categorias::insert(array(
				'categorias_SubCategorias'=>$cPadre,
				'categorias_Nombre'=>$cNombre,
				'categorias_Color'=>$cColor,
				'categorias_Icono'=>'http://admin.napoapp.com/images/'.str_replace("#","%23",$cColor).'.png',
				'categorias_Nivel'=>$cNivel));
				}
				catch (Exception $e) {
	    			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>$e]);
				}

				$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Datos Actualizados correctamente', 'url'=>'/categoria']);	
		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Sesion Expirada']);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
