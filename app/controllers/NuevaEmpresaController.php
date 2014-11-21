<?php

class NuevaEmpresaController extends \BaseController {
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
			$hijo = Categorias::orderBy('categorias_Nombre','asc')->where('categorias_Nivel','=','2')->lists('categorias_Nombre','id');
			return View::make('empresa', ['llenarHijo'=>['0'=>'Sin Padre',$hijo]]);
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
		/**
		tablas a llenar Persona, local, Empresa
		**/
		/**
		Input::get
		**/
		$usuCliente = Input::get('Usu_Cliente');
		$pasCliente = Input::get('Pas_Cliente');
		$nomCliente = Input::get('Nom_Cliente');
		$apeCliente = Input::get('Ape_Cliente');
		$emaCliente = Input::get('Ema_Cliente');
		$telCliente = Input::get('Tel_Cliente');
		$fecCliente = Input::get('Fec_Cliente');
		$rucEmpresa = Input::get('Ruc_Empresa');
		$nomEmpresa = Input::get('Nom_Empresa');
		$legEmpresa = Input::get('Leg_Empresa');
		$desEmpresa = Input::get('Des_Empresa');
		$catEmpresa = Input::get('Cat_Empresa');
		/**
		/Input::get
		**/
		/**
		Guardar Empresa
		**/
		$Empresa = Empresa::insert(array('empresa_Ruc'=>$rucEmpresa, 
			'empresa_Nombre'=>$nomEmpresa,
			'empresa_Nombre_Legal'=>$legEmpresa,
			'empresa_Descripcion'=>$desEmpresa ));
		/**
		/Guardar Empresa
		**/
		$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
		$numerodeletras=12; //numero de letras para generar el texto
		$cadena = ""; //variable para almacenar la cadena generada
		for($i=0;$i<$numerodeletras;$i++)
		{
		    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres
		entre el rango 0 a Numero de letras que tiene la cadena */
		}
		/**
		Guardar Persona
		**/
		$Persona = Persona::insert(array('persona_EstadoUsuario_Id'=>1,
			'persona_Roles_Id'=>2,
			'persona_Usuario'=>$usuCliente,
			'persona_Password'=>md5($pasCliente),
			'persona_Random'=>$cadena,
			'persona_Nombre'=>$nomCliente,
			'persona_Apellido'=>$apeCliente,
			'persona_Email'=>$emaCliente,
			'persona_Telefono'=>$telCliente,
			'persona_FechaDeNacimiento'=>$fecCliente));
		/**
		/Guardar Persona
		**/
		$lastidPer=1;	
		$lastidPersona = Persona::select('id')
						->orderBy('id','desc')
						->take(1)
						->get();
		foreach ($lastidPersona as $lid)
		{
		    $lastidPer=$lid->id;
		}
		$lastidEmp=1;	
		$lastidEmpresa = Empresa::select('id')
						->orderBy('id','desc')
						->take(1)
						->get();
		foreach ($lastidEmpresa as $lid)
		{
		    $lastidEmp=$lid->id;
		}
		$lat=-16.39870250833782;
		$lon=-71.53699442882203;
		/**
		Guardar Local
		**/
		$Local = Local::insert(array('local_Categorias_Id'=>$catEmpresa,
			'local_Persona_Id'=>$lastidPer,
			'local_Empresa_Id'=>$lastidEmp,
			'local_Latitud'=>$lat,
			'local_Longitud'=>$lon,
			'local_Nombre'=>' ',
			'local_Direccion'=>' ',
			'local_Telefono'=>' ',
			'local_Delivery'=>' ',
			'local_SumLatLong'=>$lat+$lon,
			'local_logo'=>' ',
			'local_color'=>' '));
		/**
		/Guardar Local
		**/
		$lastidLoc=1;	
		$lastidLocal = Local::select('id')
						->orderBy('id','desc')
						->take(1)
						->get();
		foreach ($lastidLocal as $lid)
		{
		    $lastidLoc=$lid->id;
		}
		$resul = Comentarios::insert(array(
			'comentarios_Local_Id'=>$lastidLoc,
			'comentarios_Titulo'=>"Felicidades",
			'comentarios_Descripcion'=>"Felicidades por unirse a napo",
			'comentarios_Valoracion'=>3,
			'comentarios_Persona_Id'=>2));

		$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Datos Actualizados correctamente', 'url'=>'/empresa']);	
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
