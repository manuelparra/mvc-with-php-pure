<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>CRUD utilizando MVC</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/css/index.css" />
        <script src="../assets/js/validacion.js"></script>
    </head>
    <body>
        <div class="container wrap-body">
            <header>
                <h1 class="page-header text-center">
                    <?php echo ($this->cli->getId() != null) ? 'Cliente ' . $this->cli->getNombre() : 'Nuevo Registro de Cliente'; ?>
                </h1>
            </header>
            <ol class="breadcrumb">
                <li><a href="<?php echo $_REQUEST['x']; ?>">Atras</a></li>
                <li class="active"><?php echo ($this->cli->getId() != null) ? 'Datos de: ' . $this->cli->getNombre() : 'Nuevo Registro'; ?></li>
            </ol>

            <form id="from-cliente" action="cliente.php?a=guardar&x=<?php echo $_REQUEST['x']; ?>" method="post" enctype="multipart/from-data">
                <input type="hidden" name="id" value="<?php echo $this->cli->getId(); ?>" />

                <div class="form-group">
                    <label>Cedula</label>
                    <input type="text" name="cedula" value="<?php echo $this->cli->getCedula(); ?>" class="form-control" placeholder="Ingrese su cédula" data-validacion-tipo="requerido" />
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $this->cli->getNombre(); ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido" />
                </div>

                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="apellido" value="<?php echo $this->cli->getApellido(); ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido" />
                </div>

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="direccion" value="<?php echo $this->cli->getDireccion(); ?>" class="form-control" placeholder="Ingrese su dirección" data-validacion-tipo="requerido" />
                </div>

                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" name="telefono" value="<?php echo $this->cli->getTelefono(); ?>" class="form-control" placeholder="Ingrese su numero de telefono" data-validacion-tipo="requerido" />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $this->cli->getEmail(); ?>" class="form-control" placeholder="Ingrese su correo electronico" data-validacion-tipo="requerido" />
                </div>

                <div class="text-right">
                    <button id="enviar" class="btn btn-success">Guardar</button>
                </div>
            </form>
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
