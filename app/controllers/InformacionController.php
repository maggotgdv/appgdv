<?php

class InformacionController extends \BaseController {

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
				->join('horario','local.id','=','horario_local_Id')
				->join('dia','dia.id','=','horario_Dia_Id')
				->select("local_Nombre", "local_Direccion", "local_Telefono",  "local_Delivery", "dia_Nombre", "horario_Entrada", "horario_Salida")
				->where('local.id','=',$id)
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
