<?php
    class Cliente {
        private $pdo;

        private $id;
        private $cedula;
        private $nombre;
        private $apellido;
        private $direccion;
        private $telefono;
        private $email;

        public function __construct() {
            try {
                $this->pdo = Database::StartUp();
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getCedula() {
            return $this->cedula;
        }

        public function setCedula($cedula) {
            $this->cedula = $cedula;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getApellido() {
            return $this->apellido;
        }

        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function queryGetAll() {
            try {
                $sql = "SELECT *
                        FROM clientes";
                $rs = $this->pdo->prepare($sql);
                $rs->execute();
                return $rs->fetchAll(PDO::FETCH_OBJ);
            } catch(Exceptioin $e) {
                die($e->getMessage());
            }
        }

        public function queryGet() {
            try {
                $sql = "SELECT *
                        FROM cliente
                        WHERE id = ?";
                $rs = $this->pdo->prepare($sql);
                $rs->execute(array($this->id));
                return $rs->fetch(PDO::FETCH_OBJ)
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function queryUpdate() {
            try {
                $sql = "UPDATE cliente SET
                            cedula = ?,
                            nombre = ?,
                            apellido = ?,
                            direccion = ?,
                            telefono = ?,
                            email = ?
                        WHERE id = ?";
                $rs = $this->pdo->prepare($sql);
                $rs->execute(array(
                    $this->cedula,
                    $this->nombre,
                    $this->apellido,
                    $this->direccion,
                    $this->telefono,
                    $this->email,
                    $this->id
                ));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function queryInsert() {
            try {
                $sql = "INSERT INTO cliente (cedula, nombre, apellido, direccion, telefono, email)
                        VALUES (?, ?, ?, ?, ?, ?)";
                $rs = $this->pdo->prepare($sql);
                $rs->execute(array(
                    $this->cedula,
                    $this->nombre,
                    $this->apellido,
                    $this->direccion,
                    $this->telefono,
                    $this->email
                ));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    }
?>
