<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Napo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 public function up()
  {
    //
    Schema::create('estadousuario',function(Blueprint $table)
      {
      //PK ->   ID AUTOGENERADO
        $table -> increments('id');
        $table->text('estadoUsuario_Descripcion');
      });

       Schema::create('roles',function(Blueprint $table)
      {
         //PK ->   ID AUTOGENERADO
         $table -> increments('id');

         $table->text('roles_Descripcion');
      });

  Schema::create('persona',function(Blueprint $table)
   {
     //PK ->   ID AUTOGENERADO
     $table -> increments('id');

     //FK -> RELACION CON ESTADOUSUARIO
     $table->unsignedInteger('persona_EstadoUsuario_Id');
     $table->foreign('persona_EstadoUsuario_Id')->references('id')->on('estadousuario');

     //FK -> RELACION CON ROLES
     $table->unsignedInteger('persona_Roles_Id');
     $table->foreign('persona_Roles_Id')->references('id')->on('roles');
     
     //DEMAS DATOS
     $table->string('persona_Usuario',50);
     $table->string('persona_Password',70);
     $table->string('persona_Random',13);
     $table->string('persona_Nombre',50);
     $table->string('persona_Apellido',70);
     $table->string('persona_Email',70)->unique();
     $table->string('persona_Telefono',15);
     $table->date('persona_FechaDeNacimiento');
   });

 
Schema::create('empresa', function(Blueprint $table)
   {
     //PK -> ID AUTOGENERADO
     $table->increments('id');

     //DEMAS DATOS
     $table->string('empresa_Ruc',12);
     $table->string('empresa_Nombre', 40);
     $table->string('empresa_Nombre_Legal', 200);
     $table->text('empresa_Descripcion');

     });

 Schema::create('categorias',function(Blueprint $table)
   {
     //PK ->   ID AUTOGENERADO
     $table -> increments('id');

     //FK -> RELACION CON ESTADOUSUARIO
     $table->unsignedInteger('categorias_SubCategorias')->nullable();
     $table->foreign('categorias_SubCategorias')->references('id')->on('categorias');

     //DEMAS DATOS
     $table->string('categorias_Nombre',50);
     $table->string('categorias_Color',8);
     $table->string('categorias_Icono',100);
     $table->integer('categorias_Nivel');
     });



  Schema::create('local', function(Blueprint $table)
   {
     //PK -> ID AUTOGENERADO
     $table->increments('id');
	 
     //FK -> RELACION CON CATEGORIAS
     $table->unsignedInteger('local_Categorias_Id');
     $table->foreign('local_Categorias_Id')->references('id')->on('categorias');

     //FK -> RELACION CON PERSONA
     $table->unsignedInteger('local_Persona_Id');
     $table->foreign('local_Persona_Id')->references('id')->on('persona');

     //FK -> RELACION CON EMPRESA
     $table->unsignedInteger('local_Empresa_Id');
     $table->foreign('local_Empresa_Id')->references('id')->on('empresa');
     $table->double('local_Latitud',19,15);
     $table->double('local_Longitud',19,15);
     $table->string('local_Nombre',50);
     $table->string('local_Direccion',100);
     $table->string('local_Telefono',20);
     $table->string('local_Delivery',4);
     $table->string('local_SumLatLong',25,17);
   $table->string('local_logo');
     $table->string('local_color',8);
   });
  Schema::create('producto', function(Blueprint $table)
   {
     //PK ->   ID AUTOGENERADO
     $table->increments('id');
     
	 //FK -> RELACION CON LOCAL
     $table->unsignedInteger('producto_local_Id');
     $table->foreign('producto_local_Id')->references('id')->on('local');	
	
     //DEMAS DATOS
     $table->string('producto_Nombre',50);
     $table->string('producto_Foto',100)->nullable();
     $table->string('producto_Descripcion');
     $table->float('producto_Precio');
   });
  Schema::create('promociones', function(Blueprint $table)
   {
     //PK ->   ID AUTOGENERADO
     $table->increments('id');

     //FK: RELACION CON PERSONA
     $table->unsignedInteger('promociones_Persona_Id');
     $table->foreign('promociones_Persona_Id')->references('id')->on('persona');
 	
	//FK -> RELACION CON LOCAL
     $table->unsignedInteger('promociones_local_Id');
     $table->foreign('promociones_local_Id')->references('id')->on('local');	
	
   
     //DEMAS DATOS
     $table->string('promociones_Foto',200)->nullable();
     $table->string('promociones_Titulo',200);
     $table->text('promociones_Descripcion',200);
     $table->date('promociones_FechaInicio');
     $table->date('promociones_FechaFin')->nullable();
     $table->integer('promociones_Activo');
     $table->time('promociones_HoraInicio');
     $table->time('promociones_HoraFin');
     $table->text('promociones_cifrado');
   }); 
   
Schema::create('dia', function(Blueprint $table)
   {
     //PK ->   ID AUTOGENERADO
     $table->increments('id');

     //DEMAS DATOS
     $table->string('dia_Nombre',10);
   });
  Schema::create('horario', function(Blueprint $table)
   {
     //PK ->   ID AUTOGENERADO
     $table->increments('id');

	//FK -> RELACION CON LOCAL
     $table->unsignedInteger('horario_local_Id');
     $table->foreign('horario_local_Id')->references('id')->on('local');	
	
     //FK -> RELACION CON DIA
     $table->unsignedInteger('horario_Dia_Id');
     $table->foreign('horario_Dia_Id')->references('id')->on('dia');

     //DEMAS DATOS
     $table->time('horario_Entrada');
     $table->time('horario_Salida');
     $table->timestamp('updated_at');
   });


Schema::create('visitas', function(Blueprint $table)
   {
     //PK -> ID AUTOGENERADO
     $table->increments('id');

     //FK -> RELACION CON LOCAL
     $table->unsignedInteger('visitas_Local_Id');
     $table->foreign('visitas_Local_Id')->references('id')->on('local');

     //FK -> RELACION CON PERSONA
     $table->unsignedInteger('visitas_Persona_Id');
     $table->foreign('visitas_Persona_Id')->references('id')->on('persona');

     //DEMAS DATOS
     $table->integer('visitas_Contador');
   });

Schema::create('favoritos', function(Blueprint $table)
   {
     //PK -> ID AUTOGENERADO
     $table->increments('id');

     //FK -> RELACION CON LOCAL
     $table->unsignedInteger('favoritos_Local_Id');
     $table->foreign('favoritos_Local_Id')->references('id')->on('local');

     //FK -> RELACION CON PERSONA
     $table->unsignedInteger('favorito_Persona_Id');
     $table->foreign('favorito_Persona_Id')->references('id')->on('persona');
     });

Schema::create('comentarios', function(Blueprint $table)
   {
     //PK -> ID AUTOGENERADO
     $table->increments('id');

     //FK -> RELACION CON LOCAL
     $table->unsignedInteger('comentarios_Local_Id');
     $table->foreign('comentarios_Local_Id')->references('id')->on('local');

     //FK -> RELACION CON PERSONA
     $table->unsignedInteger('comentarios_Persona_Id');
     $table->foreign('comentarios_Persona_Id')->references('id')->on('persona');

     //OTROS DATOS
     $table->string('comentarios_Titulo',30)->default("Anonimo");
     $table->text('comentarios_Descripcion')->nullable();
     $table->integer('comentarios_Valoracion');
   });



  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
    Schema::drop('estadousuario',function(Blueprint $table)
      {
        Schema::drop('estadousuario');
      });

      Schema::drop('roles',function(Blueprint $table)
       {
         Schema::drop('roles');
      });

    Schema::drop('promociones', function(Blueprint $table)
       {
         Schema::drop('promociones');
       });

     Schema::drop('dia', function(Blueprint $table)
       {
        Schema::drop('dia');
       });

    Schema::drop('horario', function(Blueprint $table)
       {
        Schema::drop('horario');
     });

    Schema::drop('producto', function(Blueprint $table)
       {
         Schema::drop('producto');
       });

    Schema::drop('persona',function(Blueprint $table)
       {
        Schema::drop('persona');
       });
    Schema::drop('empresa', function(Blueprint $table)
        {
          Schema::drop('empresa');
        });

    Schema::drop('categorias',function(Blueprint $table)
       {
         Schema::drop('categorias');
       });

      
        //
    Schema::drop('local', function(Blueprint $table)
       {
      Schema::drop('local');
       });

    Schema::drop('visitas', function(Blueprint $table)
       {
         Schema::drop('visitas');
       });

    Schema::drop('favoritos', function(Blueprint $table)
     {
         Schema::drop('favoritos');
     });

    Schema::drop('comentarios', function(Blueprint $table)
       {
     Schema::drop('comentarios');
   });
  
  }

}
