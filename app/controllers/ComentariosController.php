<?php

class ComentariosController extends \BaseController {

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
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id,$titulo,$descripcion,$valoracion)
	{
		$resul = Comentarios::insert(array(
			'comentarios_Local_Id'=>(int)$id,
			'comentarios_Titulo'=>$titulo,
			'comentarios_Descripcion'=>$descripcion,
			'comentarios_Valoracion'=>(int)$valoracion,
			'comentarios_Persona_Id'=>2));

	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$result = Comentarios::distinct()
				->select('comentarios.id','comentarios.comentarios_Titulo','comentarios.comentarios_Descripcion','comentarios.comentarios_Valoracion')
				->where('comentarios.comentarios_Local_Id','=',$id)
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
