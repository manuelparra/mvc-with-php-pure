<?php
    require_once '../controller/cliente-controller.php';

    $controller = new ClienteController();

    if ($_REQUEST['a'] == 'agregar' || $_REQUEST['a'] == 'modificar') {
        $controller->Consultar();
    } elseif ($_REQUEST['a'] == 'ver') {
        $controller->Listar();
    } elseif ($_REQUEST['a'] == 'guardar') {
        $controller->Guardar();
    } elseif ($_REQUEST['a'] == 'eliminar') {
        $controller->Eliminar();
    }
?>
