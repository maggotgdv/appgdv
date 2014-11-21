<!DOCTYPE html>
<html class="html">
 <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Napo Super Administrador</title>

  {{  HTML::style('css/bootstrap.min.css')  }}
  {{  HTML::style('css/sb-admin.css')  }}
  {{  HTML::style('font-awesome-4.1.0/css/font-awesome.min.css')  }}
  </head>

  <body>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://admin.napoapp.com/">Napo Admin</a>
        </div>
        <ul class="nav navbar-right top-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">  
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Eduardo Rodriguez <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Napo Desarrollo de Software Creativo</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active">
              <a href="/categoria"><i class="fa fa-fw fa-edit"></i> Nueva Categoria</a>
            </li>
            <li>
              <a href="/empresa"><i class="fa fa-fw fa-edit"></i> Nueva Empresa</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                  Nueva Categoria
              </h1>
              <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="http://www.naposac.com/">Napo SAC</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i> Nueva Categoria
                </li>
              </ol>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-6">
              {{Form::open(['method'=>'POST','url'=>'categoria'])}}
                <div class="form-group">
                  {{Form::label('Nombre_cat','Nombre de la categoría')}}
                  {{Form::text('Nombre_cat','',['id'=>'Nombre_cat','class'=>'form-control'])}}
                <p class="help-block">Nombre de la Categoria</p>
                </div>
                <div class="form-group">
                  <label>Color</label>
                  {{  Form::select('Color_cat',array('#FF8000'=>'Naranja','#4C4CFF'=>'Azul','#8CC63F'=>'Verde','#D90000'=>'Rojo','#8500B2'=>'Morado','#333333'=>'Negro','#D9D900'=>'Amarillo'),null,['id'=>'Color_cat','class'=>'form-control'] ) }}
                </div>
                <div class="form-group">
                  <label>Padre</label>
                  {{  Form::select('Padre_cat',$llenarPadre,null,['id'=>'Padre_cat','class'=>'form-control'] ) }}
                </div>
                {{  Form::submit('guardarCategoria', ['class'=>'btn btn-default', 'title'=>'Guardar'])  }}
              {{  Form::close() }}
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
     <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>