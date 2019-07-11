<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>CRUD utilizando MVC</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/css/index.css" />
    </head>
    <body>
        <div class="container wrap-body">
            <header>
                <h1 class="page-header text-center">
                    <?php echo $cli->id != null ? $cli->getNombre : 'Nuevo Registro';?>
                </h1>
            </header>

            <ol class="breadcrumb">
                <li><a href="?c=Alumno">Alumnos</a></li>
                <li class="active"><?php echo $cli->id != ? $cli->getNombre : 'Nuevo Registro';?></li>
            </ol>

            <div class="well well-sm text-left">
                <a class="btn btn-primary" href="view/cliente/cliente-agregar-editar.php?c=cliente&a=add">Nuevo cliete</a>
                <a class="btn btn-info btn-sm" href="?c=view-cliente&a=show">Ver cliente</a>
            </div>

            <div id="container-title" class="central-screen">
                <div id="title">
                    <h1 class="name-company" data-content="PHP">PHP</h1>
                </div>
            </div>

            <div class="row to-bottom">
                <div class="col-xs-12">
                    <hr />
                    <footer class="well well-sm text-center">
                        <p class="align-more-bottom">Ejemplo desarrollado por <a href="github.com/manuelparra">Manuel Parra</a></p>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
