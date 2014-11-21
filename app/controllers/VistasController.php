<?php

class VistasController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
		return View::make('index');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function administrador_principal()
	{
		return View::make('principal');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function administrador_tu_perfil()
	{
		return View::make('tu-perfil');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function administrador_promociones()
	{
		return View::make('promociones');
	}
}