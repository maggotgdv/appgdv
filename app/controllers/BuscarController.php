<?php

class BuscarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$result = Local::distinct()->remember(30)
				->join('empresa','local.local_Empresa_Id','=','empresa.id')
				->join('producto','producto.producto_local_Id','=','local.id')
				->join('categorias','local.local_Categorias_Id','=','categorias.id')
            	->join('comentarios','comentarios_Local_Id','=','local.id')
				->select('local.id','local.local_Nombre','local.local_Latitud','local.local_Longitud','local.local_Direccion','local.local_Telefono','local.local_Delivery','local.local_logo','local.local_color','categorias.categorias_Nombre','categorias.categorias_Color','categorias.categorias_Icono','empresa.empresa_Nombre_Legal',DB::raw('CAST(ROUND(AVG("comentarios_Valoracion"),0) AS INT) as rating'))
				->whereRaw('lower(local."local_Nombre") like lower(?) or lower(categorias."categorias_Nombre") like lower(?) or lower(empresa."empresa_Nombre_Legal") like lower(?) or lower(producto."producto_Nombre") like lower(?)',array("%$id%","%$id%","%$id%","%$id%"))
				->groupBy('local.id','local.local_Nombre','local.local_Latitud','local.local_Longitud','local.local_Direccion','local.local_Telefono','local.local_Delivery','local.local_logo','local.local_color','categorias.categorias_Nombre','categorias.categorias_Color','categorias.categorias_Icono','empresa.empresa_Nombre_Legal')
				->get();
		return  Response::make(json_encode(array(
        	'error' => false,
        	'data' => $result->toArray())
			, JSON_UNESCAPED_SLASHES))
			->header('Content-Type', "application/json");
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
