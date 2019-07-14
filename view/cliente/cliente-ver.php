<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>CRUD utilizando MVC</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/css/index.css" />
    </head>
    <body>
        <div class="container wrap-body">
            <header>
                <h1 class="page-header text-center">Lista de Clientes</h1>
            </header>

            <div class="well well-sm text-left">
                <a class="btn btn-primary" href="../view/cliente.php?a=modificar&x=cliente.php?a=ver">Nuevo cliente</a>
                <a class="btn btn-info btn-sm" href= "../index.html">Atras</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 100px;">Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th style="width: 330px;">Direccion</th>
                        <th style="width: 100px;">Telefono</th>
                        <th style="width: 200px;">Email</th>
                        <th style="width: 65px;"></th>
                        <th style="width: 65px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->cli->queryGetAll() as $result): ?>
                        <tr>
                            <td><?php echo $result->cedula; ?></td>
                            <td><?php echo $result->nombre; ?></td>
                            <td><?php echo $result->apellido; ?>
                            <td><?php echo $result->direccion; ?></td>
                            <td><?php echo $result->telefono; ?></td>
                            <td><?php echo $result->email ?></td>
                            <td>
                                <a href="../view/cliente.php?a=modificar&id=<?php echo $result->id; ?>&x=cliente.php?a=ver">Editar</a>
                            </td>
                            <td>
                                <a onclick="javascript:return confirm('¿Desea eliminar este registro?');" href="../../cliente-controller.php?a=eliminar&id=<?php echo $result->id; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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
