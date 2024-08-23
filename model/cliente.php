<?php
namespace modelo;

include_once "conexion.php";


class Cliente
{
    private $idCliente;
    private $tipoDoc;
    private $numeroIdentificacion;
    private $nombre;
    private $apellido;
    private $correo;
    private $direccion;
    private $telefono;
    private $estado = 'ACTIVO';
    private $conexion;

    public function __construct()
    {
        $this->conexion = new  \Conexion;
    }

    public function create()
    {
        try {

            $sql = $this->conexion->getConPDO()->prepare("INSERT INTO clientes (nombre,tipoDoc,numeroIdentificacion,direccion,correo,telefono,apellido,estado)VALUES(?,?,?,?,?,?,?,?)");
            $sql->bindParam(1, $this->nombre);
            $sql->bindParam(2, $this->tipoDoc);
            $sql->bindParam(3, $this->numeroIdentificacion);
            $sql->bindParam(4, $this->direccion);
            $sql->bindParam(5, $this->correo);
            $sql->bindParam(6, $this->telefono);
            $sql->bindParam(7, $this->apellido);
            $sql->bindParam(8, $this->estado);
            $sql->execute();
            return "Cliente Creado";
        } catch (\PDOException   $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function read()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM clientes WHERE estado='ACTIVO'");
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("UPDATE clientes SET tipoDoc=?,numeroIdentificacion=?,nombre=?,apellido=?,correo=?,direccion=?, telefono=? WHERE idCliente=?");
            $sql->bindParam(1, $this->tipoDoc);
            $sql->bindParam(2, $this->numeroIdentificacion);
            $sql->bindParam(3, $this->nombre);
            $sql->bindParam(4, $this->apellido);
            $sql->bindParam(5, $this->correo);
            $sql->bindParam(6, $this->direccion);
            $sql->bindParam(7, $this->telefono);
            $sql->bindParam(8, $this->idCliente);
            $sql->execute();
            return "Usuario Modificado";
        } catch (\PDOException $e) {
            return "Error:" . $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("UPDATE clientes SET estado='INACTIVO' WHERE idCliente=?");
            $sql->bindParam(1, $this->idCliente);
            $sql->execute();
            return "Usuario Eliminado";
        } catch (\PDOException $e) {
            return "Error" + $e->getMessage();
        }
    }

    public function login()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM clientes WHERE estado='ACTIVO' AND correo=? AND direccion=?");
            $sql->bindParam(1, $this->correo);
            $sql->bindParam(2, $this->direccion);
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return "Error" . $e->getMessage();
        }
    }

    public function readUpdate()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM clientes WHERE idCliente=?");
            $sql->bindParam(1, $this->idCliente);
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return "Error:" . $e->getMessage();
        }
    }


    /**
     * Get the value of idCliente
     */
    public function getId()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     */
    public function setId($idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of tipoDoc
     */
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     */
    public function setTipoDoc($tipoDoc): self
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of numeroIdentificacion
     */
    public function getnumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    /**
     * Set the value of numeroIdentificacion
     */
    public function setnumeroIdentificacion($numeroIdentificacion): self
    {
        $this->numeroIdentificacion = $numeroIdentificacion;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido($apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     */
    public function setCorreo($correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     */
    public function setDireccion($direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }


    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono($telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

}
