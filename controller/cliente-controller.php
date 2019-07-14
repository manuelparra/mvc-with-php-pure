<?php
    require_once '../model/database.php';
    require_once '../model/cliente.php';
    class ClienteController {
        private $cli;

        public function __CONSTRUCT() {
            $this->cli = new Cliente();
        }

        public function Consultar() {
            if (isset($_REQUEST['id'])) {
                $this->cli->setId($_REQUEST['id']);
                $this->cli->queryGet();
            }
            require_once '../view/cliente/cliente-agregar-editar.php';
        }

        public function listar() {
            require_once '../view/cliente/cliente-ver.php';
        }

        public function Guardar() {
            $this->cli->setId($_REQUEST['id']);
            $this->cli->setCedula($_REQUEST['cedula']);
            $this->cli->setNombre($_REQUEST['nombre']);
            $this->cli->setApellido($_REQUEST['apellido']);
            $this->cli->setDireccion($_REQUEST['direccion']);
            $this->cli->setTelefono($_REQUEST['telefono']);
            $this->cli->setEmail($_REQUEST['email']);

            if ($this->cli->getId() != null) {
                $this->cli->queryUpdate();
                header('Location: cliente.php?a=ver');
            } else {
                $this->cli->queryInsert();
                header('Location: ' . $_REQUEST['x']);
            }
        }

        public function Eliminar() {
            $cli = new Cliente();

            $cli->setId($_REQUEST['id']);
            $cli->queruDelete();

            header('Location: ../view/cliente.php');
        }
    }
?>
