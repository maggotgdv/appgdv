<?php

class CategoriasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categorias = Categorias::orderBy('categorias_Nombre','asc')->remember(30)->get();//
		
		//$response->header('Content', json_encode($categorias, JSON_UNESCAPED_SLASHES));
		return  Response::make(json_encode(array(
        	'error' => false,
        	'data' => $categorias->toArray())
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
		$categorias = Categorias::find($id);//
		if(! $categorias)
		{
			return Response::make(json_encode(array(
        	'error' => true)
			, JSON_UNESCAPED_SLASHES))
			->header('Content-Type', "application/json");
		}
		return Response::make(json_encode(array(
        	'error' => false,
        	'data' => $categorias->toArray())
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
