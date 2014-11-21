<?php

class CategoriaSeleccionadoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null, $limite = null, $latitud = null, $longitud = null)
    {
        if (isset($id) && isset($limite) && isset($latitud) && isset($longitud)) 
        {
        	$grado = 1;
        	$kilometros = 111319.444;
        	$distancia= ($limite * $grado)/$kilometros;
        	$latitud_maximo = $latitud + $distancia;
        	$latitud_minimo = $latitud - $distancia;
        	$longitud_maximo = $longitud + $distancia;
        	$longitud_minimo = $longitud - $distancia;
        	$local = Local::distinct()->remember(30)
            		->join('categorias','local.local_Categorias_Id','=','categorias.id')
            		->join('empresa','local.local_Empresa_Id','=','empresa.id')
            		->join('comentarios','comentarios_Local_Id','=','local.id')
            		->select('local.id','local.local_Nombre','local.local_Latitud','local.local_Longitud','local.local_Direccion','local.local_Telefono','local.local_Delivery','local.local_logo','local.local_color','categorias.categorias_Nombre','categorias.categorias_Color','categorias.categorias_Icono','empresa.empresa_Nombre_Legal',DB::raw('CAST(ROUND(AVG("comentarios_Valoracion"),0) AS INT) as rating'))
            		->where('categorias.id','=',$id)
            		->whereBetween('local_Latitud', array($latitud_minimo, $latitud_maximo))
            		->whereBetween('local_Longitud', array($longitud_minimo, $longitud_maximo))
            		->groupBy('local.id','local.local_Nombre','local.local_Latitud','local.local_Longitud','local.local_Direccion','local.local_Telefono','local.local_Delivery','local.local_logo','local.local_color','categorias.categorias_Nombre','categorias.categorias_Color','categorias.categorias_Icono','empresa.empresa_Nombre_Legal')
            		->get();
			return  Response::make(json_encode(array(
        	'error' => false,
        	'data' => $local->toArray())
			, JSON_UNESCAPED_SLASHES))
			->header('Content-Type', "application/json");
        }

        $local = Local::all();//
		return  Response::make(json_encode(array(
        	'error' => false,
        	'data' => $local->toArray())
			, JSON_UNESCAPED_SLASHES))
			->header('Content-Type', "application/json");
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
