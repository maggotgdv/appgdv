<?php

class PromocionesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Promociones::all();
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
		$result = Promociones::distinct()
				->select('promociones.id','promociones.promociones_Foto','promociones.promociones_Titulo','promociones.promociones_Descripcion')
				->whereRaw('(CURRENT_DATE BETWEEN promociones."promociones_FechaInicio" AND promociones."promociones_FechaFin") AND (TIME \'now\' - \'5 hour\'::interval BETWEEN promociones."promociones_HoraInicio" AND promociones."promociones_HoraFin") AND promociones."promociones_local_Id" = ?',[$id])
				->get();
		return Response::make(json_encode(array(
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
