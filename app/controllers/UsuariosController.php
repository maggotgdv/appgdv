<?php 

	class UsuariosController extends BaseController{
		
		protected $layout = 'master';

		function index(){
			return View::make('index');
		}

		function post_validar(){
			$Persona = new Persona;
			$Local = new Local;

			$user = Input::get('persona_Usuario');
			$pass = Input::get('persona_Password');

			$datosPersona = $Persona->
				where('persona_Usuario','=',$user)->
				where('persona_Password','=',md5($pass))->first();
			if (!$datosPersona){
				if($Persona->where('persona_Usuario','=',$user)->first())
				{
					$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Compuebe que la contraseña sea correcta']);	
				}else{
					$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'El Usuario no existe']);	
				}
			}
			else if($datosPersona->persona_Roles_Id==3){
				$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
			} else if($datosPersona->persona_EstadoUsuario_Id == 2){
				$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Su usuario se encuentra inactivo, favor comunicarse con la empresa para mas informacion']);		
			} else if($datosPersona->persona_EstadoUsuario_Id == 3){
				$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Su usuario fue eliminado, favor comunicarse con la empresa para mas informacion']);		
			} else{
				$datosLocal = $Local ->
				where('local_Persona_Id','=',$datosPersona->id)->first();

				//SESIONES
				Session::put('sesion_Nombre_local',$datosPersona->persona_Roles_Id);
				Session::put('sesion_Id_Persona',$datosPersona->id);
				Session::put('sesion_Nombre_Persona', $datosPersona->persona_Nombre);
				Session::put('sesion_Id_Local', $datosLocal->id);
				Session::put('sesion_Id_Empresa', $datosLocal->local_Empresa_Id);

				$this->principal();
			}
		}		
		
		function producto(){
			$producto = Producto::where('producto_local_Id','=',Session::get('sesion_Id_Local'))->get();
			return View::make('producto', ['Producto'=>$producto]);
		}
		function principal(){
				if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			$Delivery="";
			$Latitud=0;
			$Longitud=0;
			$Telefono="";
			$Direccion="";
			$NombreCom="";
			$Categoria="";
			//MOSTRANDO LA TABLA EMPRESA (NOMBRE)
			$empresa = Local::where('id','=',Session::get('sesion_Id_Local'))->get();
			foreach ($empresa as $Empresa){
				$NombreCom = $Empresa->local_Nombre;
			}

			//MOSTRANDO LA TABLA LOCAL (DIRECC, TELEF, CATEGOR)
			$local = Local::where('id','=',Session::get('sesion_Id_Local'))->get();
			foreach ($local as $Local) {
				$Direccion = $Local->local_Direccion;
				$Telefono = $Local->local_Telefono;
				$Delivery = $Local->local_Delivery;
				$Categoria = $Local->local_Categorias_Id;
				$Latitud = $Local->local_Latitud;
				$Longitud = $Local->local_Longitud;
			}
			if($Delivery == ""){
				$Delivery = 'seleccionar';
			}

			$llenarCategoria = DB::table('categorias')->orderBy('categorias_Nombre')->lists('categorias_Nombre','id');
			$LatLong = $Latitud.$Longitud;

			//MOSTRANDO LA TABLA PRODUCTO 
			$producto = Producto::where('producto_local_Id','=',Session::get('sesion_Id_Local'))->get();

			//MOSTRANDO LA TABLA HORARIO 
			$horaLunes = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',1)->get();
			if ($horaLunes == "[]"){
				$LunesE = ["",""];
				$LunesS = ["",""];
			}
			else {
				foreach ($horaLunes as $HoraLunes) {
					$LunesEntrada = $HoraLunes->horario_Entrada;
					$LunesSalida = $HoraLunes->horario_Salida;
				}
				$LunesE = explode(':',$LunesEntrada);
				$LunesS = explode(':',$LunesSalida);
			}

			$horaMartes = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',2)->get();
			if ($horaMartes == "[]"){
				$MartesE = ["",""];
				$MartesS = ["",""];
			}
			else {
				foreach ($horaMartes as $HoraMartes) {
					$MartesEntrada = $HoraMartes->horario_Entrada;
					$MartesSalida = $HoraMartes->horario_Salida;
				}
				$MartesE = explode(':',$MartesEntrada);
				$MartesS = explode(':',$MartesSalida);
			}

			$horaMiercoles = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',3)->get();
			if ($horaMiercoles == "[]"){
				$MiercolesE = ["",""];
				$MiercolesS = ["",""];
			}
			else {
				foreach ($horaMiercoles as $HoraMiercoles) {
					$MiercolesEntrada = $HoraMiercoles->horario_Entrada;
					$MiercolesSalida = $HoraMiercoles->horario_Salida;
				}
				$MiercolesE = explode(':',$MiercolesEntrada);
				$MiercolesS = explode(':',$MiercolesSalida);
			}

			$horaJueves = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',4)->get();
			if ($horaJueves == "[]"){
				$JuevesE = ["",""];
				$JuevesS = ["",""];
			}
			else {
				foreach ($horaJueves as $HoraJueves) {
					$JuevesEntrada = $HoraJueves->horario_Entrada;
					$JuevesSalida = $HoraJueves->horario_Salida;
				}
				$JuevesE = explode(':',$JuevesEntrada);
				$JuevesS = explode(':',$JuevesSalida);
			}

			$horaViernes = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',5)->get();
			if ($horaViernes == "[]"){
				$ViernesE = ["",""];
				$ViernesS = ["",""];
			}
			else {
				foreach ($horaViernes as $HoraViernes) {
					$ViernesEntrada = $HoraViernes->horario_Entrada;
					$ViernesSalida = $HoraViernes->horario_Salida;
				}
				$ViernesE = explode(':',$ViernesEntrada);
				$ViernesS = explode(':',$ViernesSalida);
			}

			$horaSabado = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',6)->get();
			if ($horaSabado == "[]"){
				$SabadoE = ["",""];
				$SabadoS = ["",""];
			}
			else {
				foreach ($horaSabado as $HoraSabado) {
					$SabadoEntrada = $HoraSabado->horario_Entrada;
					$SabadoSalida = $HoraSabado->horario_Salida;
				}
				$SabadoE = explode(':',$SabadoEntrada);
				$SabadoS = explode(':',$SabadoSalida);
			}

			$horaDomingo = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',7)->get();
			if ($horaDomingo == "[]"){
				$DomingoE = ["",""];
				$DomingoS = ["",""];
			}
			else {
				foreach ($horaDomingo as $HoraDomingo) {
					$DomingoEntrada = $HoraDomingo->horario_Entrada;
					$DomingoSalida = $HoraDomingo->horario_Salida;
				}
				$DomingoE = explode(':',$DomingoEntrada);
				$DomingoS = explode(':',$DomingoSalida);
			}


			$this->layout->modulo = View::make('principal', ['NombreCom'=>$NombreCom,'Direccion'=>$Direccion,'Telefono'=>$Telefono,'Delivery'=>$Delivery,'llenarCategoria'=>$llenarCategoria,'Categoria'=>$Categoria,'Producto'=>$producto,'Latitud'=>$Latitud,'Longitud'=>$Longitud,'LunesE'=>$LunesE,'LunesS'=>$LunesS,'MartesE'=>$MartesE,'MartesS'=>$MartesS,'MiercolesE'=>$MiercolesE,'MiercolesS'=>$MiercolesS,'JuevesE'=>$JuevesE,'JuevesS'=>$JuevesS,'ViernesE'=>$ViernesE,'ViernesS'=>$ViernesS,'SabadoE'=>$SabadoE,'SabadoS'=>$SabadoS,'DomingoE'=>$DomingoE,'DomingoS'=>$DomingoS]);
		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}
		}

		function tuperfil(){
			if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{//MOSTRANDO LA TABLA LOCAL (LOGO, COLOR DE LA EMPRESA)
			$local = Local::where('id','=',Session::get('sesion_Id_Local'))->get();
			foreach ($local as $Local){
				$urlLogo = "$Local->local_logo";
				$color = $Local->local_color;
			}
			if($urlLogo == ""){
				$urlLogo = 'assets/img/default_avatar.png';
			}
			if($color == ""){
				$color = 'seleccionar';
			}
			//MOSTRANDO LA TABLA PERSONA (USUARIO, PASS, NOMBRE, APELLIDO, EMAIL, TELEFONO, FNAC)
			$persona = Persona::where('id','=',Session::get('sesion_Id_Persona'))->get();
			foreach($persona as $Persona){
				$Usuario = $Persona->persona_Usuario;
				$Nombre = $Persona->persona_Nombre;
				$Apellido = $Persona->persona_Apellido;
				$Email = $Persona->persona_Email;
				$Telefono = $Persona->persona_Telefono;
				$Fnacimiento = $Persona->persona_FechaDeNacimiento;
			}

			$this->layout->modulo = View::make('tu-perfil', ['random'=>Session::get('sesion_Id_Local'),'Logo'=>$urlLogo,'Color'=>$color,'Usuario'=>$Usuario,'Nombre'=>$Nombre,'Apellido'=>$Apellido,'Email'=>$Email,'Telefono'=>$Telefono,'Fnacimiento'=>$Fnacimiento]);
		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}
		}

		function promociones(){
if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			//MOSTRANDO LA TABLA PROMOCIONES
			$promocion = Promociones::where('promociones_local_Id','=',Session::get('sesion_Id_Local'))->get();
			

			$this->layout->modulo = View::make('promociones', ['promocion'=>$promocion]);
		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}
		}

		function post_guardarPrincipal(){
if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			try{
				//ACTUALIZANDO LA TABLA EMPRESA (NOMBRE)|
				$eNombre = Input::get('empresa_Nombre');
				$updateEmpresa = [
					'local_Nombre' => $eNombre
				];
				$Uempresa = DB::table('local')->where('id','=',Session::get('sesion_Id_Local'))->update($updateEmpresa);

				//ACTUALIZANDO LA TABLA LOCAL (DIRECC, TELEF, CATEGOR)
				$lDireccion = Input::get('local_Direccion');
				$lTelefono = Input::get('local_Telefono');
				$lDelivery = Input::get('local_Delivery');
				$lCategoria = Input::get('categoria');
				$lLatitud = Input::get('local_Latitud');
				$lLongitud = Input::get('local_Longitud');
				$updateLocal = [
					'local_Direccion' => $lDireccion,
					'local_Telefono' => $lTelefono,
					'local_Delivery' => $lDelivery,
					'local_Categorias_Id' => $lCategoria,
					'local_Latitud' => $lLatitud,
					'local_Longitud' => $lLongitud
				];	
				$Ulocal = DB::table('local')->where('id','=',Session::get('sesion_Id_Local'))->update($updateLocal);

				//ACTUALIZANDO LA TABLA PRODUCTO 
					//primero actualizamos los productos que ya existen,
				
				$cantProducto = DB::table('producto')->where('producto_local_Id','=',Session::get('sesion_Id_Local'))->get();
				foreach ($cantProducto as $prod) {
					$pId = $prod->id;
					$pNombre = Input::get('producto_Nombre_'.$pId);
					$pDescripcion = Input::get('producto_Descripcion_'.$pId);
					$pPrecio = Input::get('producto_Precio_'.$pId);
					$pFoto = Input::get('producto_Foto_'.$pId);
					$updatePro = [
						'producto_Nombre' => $pNombre,
						'producto_Descripcion' => $pDescripcion,
						'producto_Precio' => $pPrecio,
						'producto_Foto' => $pFoto
					];
					$Upro = DB::table('producto')->where('id','=',$pId)->update($updatePro);		
				}
					//ahora guardamos los productos nuevos
				$NombreT="demo";
				$lastid=0;
				$cont = 2;	
				while ($NombreT!=null) {
					$nNombre = Input::get('producto_Nombre_D'.$cont);
					$nDescripcion = Input::get('producto_Descripcion_D'.$cont);
					$nPrecio = Input::get('producto_Precio_D'.$cont);
					$nFoto = Input::get('producto_Foto_D'.$cont);
					$lastidtable = Producto::select('id')
								->orderBy('id','desc')
								->take(1)
								->get();
					foreach ($lastidtable as $lid)
					{
					    $lastid=$lid->id + 1;
					    $lsha1=sha1(md5($lastid));
					}
					if ($nNombre!=null) {
						$insertProducto = [
							'producto_local_Id' => Session::get('sesion_Id_Local'),
							'producto_Nombre' => $nNombre,
							'producto_Descripcion' => $nDescripcion,
							'producto_Precio' => $nPrecio,
							'producto_Foto' => $nFoto,	
							'producto_cifrado' => $lsha1	
						];
												
						$Ipro = Producto::insert($insertProducto);

					}
					$cont++;
					$NombreT = Input::get('producto_Nombre_D'.$cont);
					
				}

				//ACTUALIZANDO LA TABLA HORARIO 
				$LunesE = Input::get('hora_Entrada_Lunes').':'.Input::get('minuto_Entrada_Lunes').':00';
				$LunesS = Input::get('hora_Salida_Lunes').':'.Input::get('minuto_Salida_Lunes').':00';
				$updateLunes = [
					'horario_Entrada' => $LunesE,
					'horario_Salida' => $LunesS
				];
				if($LunesE!='::00'&&$LunesS!='::00')
				{
					$res=Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',1)->get();
					if($res== "[]")
					{
						$hLunes = Horario::insert(array(
							'horario_local_Id'=> Session::get('sesion_Id_Local'),
							'horario_Dia_Id'=>1,
							'horario_Entrada' => $LunesE,
							'horario_Salida' => $LunesS));
					}else{
						$hLunes = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',1)->update($updateLunes);
					}
				}
				$MartesE = Input::get('hora_Entrada_Martes').':'.Input::get('minuto_Entrada_Martes').':00';
				$MartesS = Input::get('hora_Salida_Martes').':'.Input::get('minuto_Salida_Martes').':00';
				$updateMartes = [
					'horario_Entrada' => $MartesE,
					'horario_Salida' => $MartesS
				];
				if($MartesE!='::00'&&$MartesS!='::00')
				{
					$res2=Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',2)->get();
					if($res2== "[]")
					{
						$hMartes = Horario::insert(array(
							'horario_local_Id'=> Session::get('sesion_Id_Local'),
							'horario_Dia_Id'=>2,
							'horario_Entrada' => $MartesE,
							'horario_Salida' => $MartesS));
						
					}else{
						$hMartes = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',2)->update($updateMartes);
						
					}
				}
				$MiercolesE = Input::get('hora_Entrada_Miercoles').':'.Input::get('minuto_Entrada_Miercoles').':00';
				$MiercolesS = Input::get('hora_Salida_Miercoles').':'.Input::get('minuto_Salida_Miercoles').':00';
				$updateMiercoles = [
					'horario_Entrada' => $MiercolesE,
					'horario_Salida' => $MiercolesS
				];
				if($MiercolesE!='::00'&&$MiercolesS!='::00')
				{
					$res3=Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',3)->get();
					if($res3== "[]")
					{	$hMiercoles = Horario::insert(array(
							'horario_local_Id'=> Session::get('sesion_Id_Local'),
							'horario_Dia_Id'=>3,
							'horario_Entrada' => $MiercolesE,
							'horario_Salida' => $MiercolesS));
						
					}else{
						$hMiercoles = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',3)->update($updateMiercoles);
						
					}
				}
				$JuevesE = Input::get('hora_Entrada_Jueves').':'.Input::get('minuto_Entrada_Jueves').':00';
				$JuevesS = Input::get('hora_Salida_Jueves').':'.Input::get('minuto_Salida_Jueves').':00';
				$updateJueves = [
					'horario_Entrada' => $JuevesE,
					'horario_Salida' => $JuevesS
				];
				if($JuevesE!='::00'&&$JuevesS!='::00')
				{
					$res4=Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',4)->get();
					if($res4== "[]")
					{
						$hJueves = Horario::insert(array(
							'horario_local_Id'=> Session::get('sesion_Id_Local'),
							'horario_Dia_Id'=>4,
							'horario_Entrada' => $JuevesE,
							'horario_Salida' => $JuevesS));
						
					}else{
						$hJueves = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',4)->update($updateJueves);
						
					}
				}
				$ViernesE = Input::get('hora_Entrada_Viernes').':'.Input::get('minuto_Entrada_Viernes').':00';
				$ViernesS = Input::get('hora_Salida_Viernes').':'.Input::get('minuto_Salida_Viernes').':00';
				$updateViernes = [
					'horario_Entrada' => $ViernesE,
					'horario_Salida' => $ViernesS
				];
				if($ViernesE!='::00'&&$ViernesS!='::00')
				{
					$res5= Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',5)->get();
					if($res5== "[]")
					{
						$hViernes = Horario::insert(array(
							'horario_local_Id'=> Session::get('sesion_Id_Local'),
							'horario_Dia_Id'=>5,
							'horario_Entrada' => $ViernesE,
							'horario_Salida' => $ViernesS));
						
					}else{
						$hViernes = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',5)->update($updateViernes);
						
					}
				}
				$SabadoE = Input::get('hora_Entrada_Sabado').':'.Input::get('minuto_Entrada_Sabado').':00';
				$SabadoS = Input::get('hora_Salida_Sabado').':'.Input::get('minuto_Salida_Sabado').':00';
				$updateSabado = [
					'horario_Entrada' => $SabadoE,
					'horario_Salida' => $SabadoS
				];
				if($SabadoE!='::00'&&$SabadoS!='::00')
				{
					$res6=Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',6)->get();
					if($res6== "[]")
					{
						$hSabado = Horario::insert(array(
							'horario_local_Id'=> Session::get('sesion_Id_Local'),
							'horario_Dia_Id'=>6,
							'horario_Entrada' => $SabadoE,
							'horario_Salida' => $SabadoS));
					}else{
						$hSabado = Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',6)->update($updateSabado);
						
					}
				}
				$DomingoE = Input::get('hora_Entrada_Domingo').':'.Input::get('minuto_Entrada_Domingo').':00';
				$DomingoS = Input::get('hora_Salida_Domingo').':'.Input::get('minuto_Salida_Domingo').':00';
				if($DomingoE!='::00'&&$DomingoE!='::00')
				{
					$updateDomingo = [
						'horario_Entrada' => $DomingoE,
						'horario_Salida' => $DomingoS
					];
					$res7=Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',7)->get();
					if($res7== "[]")
					{
						$hDomingo = Horario::insert(array(
								'horario_local_Id'=> Session::get('sesion_Id_Local'),
								'horario_Dia_Id'=>7,
								'horario_Entrada' => $DomingoE,
								'horario_Salida' => $DomingoS));
					}else{							
						
						$hDomingo =  Horario::where('horario_local_Id','=',Session::get('sesion_Id_Local'))->where('horario_Dia_Id','=',7)->update($updateDomingo);
					}
				}
				$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Datos Actualizados correctamente','url'=>'../principal']);	
			}
			catch (Exception $e) {
    			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>$e]);
			}

		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}		
		}

		
		function post_guardarTuPerfil(){
			if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			//ACTUALIZANDO LA TABLA LOCAL (LOGO, COLOR)
			$lLogo = Input::get('local_Logo');
			$lColor = Input::get('local_Color');
			$updateLocal = [
				'local_logo' => $lLogo,
				'local_color' => $lColor
			];
			$Ulocal = DB::table('local')->where('id','=',Session::get('sesion_Id_Local'))->update($updateLocal);

			//ACTUALIZANDO LA TABLA PERSONA (USUARIO, PASS, NOMBRE, APELLIDO, EMAIL, TELEFONO, FNAC)
			$pNombre = Input::get('persona_Nombre');
			$pApellido = Input::get('persona_Apellido');
			$pEmail = Input::get('persona_Email');
			$pTelefono = Input::get('persona_Telefono');
			$pFnacimiento = Input::get('persona_FechaDeNacimiento');

			$updatePersona = [
				'persona_Nombre' => $pNombre,
				'persona_Apellido' => $pApellido,
				'persona_Email' => $pEmail,
				'persona_Telefono' => $pTelefono,
				'persona_FechaDeNacimiento' => $pFnacimiento
			];

			try{
				$Upersona = DB::table('persona')->where('id','=',Session::get('sesion_Id_Persona'))->update($updatePersona);
			}catch (Exception $e) {
    			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>$e]);
			}
			if (Input::get('persona_Password') != ""){
				$pPassword = Input::get('persona_Password');
				$pConfPassword = Input::get('persona_Password_confirmar');

				if($pPassword != $pConfPassword){
					$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Las contraseñas deben ser iguales']);
				}
				else{
					$updatePassword = [
						'persona_Password' => md5($pPassword)
					];
					$Upassword = DB::table('persona')->where('id','=',Session::get('sesion_Id_Persona'))->update($updatePassword);	
					$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Datos Actualizados correctamente'/*URL*/,'url'=> '../tu-perfil']);	
				}
			}else{
				$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Datos Actualizados correctamente','url'=>'../tu-perfil']);
			}
			}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}	
		}
		function post_guardarPromociones(){
if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			//INSERTANDO A LA TABLA PROMOCIONES
			$pTitulo = Input::get('promociones_N_Titulo');
			$pDescripcion = Input::get('promociones_N_Descripcion');
			$pFoto = Input::get('promociones_N_Foto');
			$pFechaInicio = Input::get('promociones_FechaInicio');
			$pHoraInicio = Input::get('promociones_horaInicio').':'.Input::get('promociones_minutoInicio').':00';
			$pFechaFin = Input::get('promociones_FechaFin');
			$pHoraFin = Input::get('promociones_HoraFin').':'.Input::get('promociones_minutoFin').':00';
			$pActivo = Input::get('promociones_Activo');
			$lastid=0;
			
			$lastidtable = Promociones::select('id')
							->orderBy('id','desc')
							->take(1)
							->get();
			foreach ($lastidtable as $lid)
			{
			    $lastid=$lid->id + 1;
			    $lsha1=sha1(md5($lastid));
			}

			$insertPromociones = [
				'promociones_local_Id' => Session::get('sesion_Id_Local'),
				'promociones_Persona_Id' => Session::get('sesion_Id_Persona'),
				'promociones_Titulo' => $pTitulo,
				'promociones_Descripcion' => $pDescripcion,
				'promociones_Foto' => $pFoto,
				'promociones_FechaInicio' => $pFechaInicio,
				'promociones_HoraInicio' => $pHoraInicio,
				'promociones_FechaFin' => $pFechaFin,
				'promociones_HoraFin' => $pHoraFin,
				'promociones_Activo' => $pActivo,
				'promociones_cifrado'=>$lsha1
			];
			try{
	
				$Ipromocion = Promociones::insert($insertPromociones);
			/**
			MODIFICAR EL /PUBLIC
			*/
			$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Datos Actualizados correctamente','url'=>'../promociones']);	
			}catch (Exception $e) {
    			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>$e]);
			}
			}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}	
		}

		function eliminar($id){
if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			Promociones::where('promociones_cifrado','=',$id)->delete();
			/**
			MODIFICAR EL /PUBLIC
			*/
			$this->layout->modulo = View::make('mensajeExito',['cuerpo'=>'Promo eliminada correctamente!','url'=>'../promociones']);	
			//return Redirect::to('promociones');
		}else{
			$this->layout->modulo = View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}
		}
		function eliminarPro($id){
if(Session::get('sesion_Nombre_local')==2 || Session::get('sesion_Nombre_local')==1)
		{
			Producto::where('producto_cifrado','=',$id)->delete();
			/**
			MODIFICAR EL /PUBLIC
			*/
			return View::make('mensajeExito2',['cuerpo'=>'Promo eliminada correctamente!','url'=>'../producto']);	
			//return Redirect::to('promociones');
		}else{
				return  View::make('mensajeError',['cuerpo'=>'Usted no tiene los permisos para acceder, favor comunicarse con la empresa para más información']);
		}
		}

		function recuperarContrasena(){
			return View::make('recuperarContrasena');
		}

		function post_recuperarContrasena(){
			echo "klasjdflkajsdlf";
		}
		
	}
	
 ?>