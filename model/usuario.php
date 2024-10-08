<?php
namespace modelo;

include_once "conexion.php";

class Usuario
{
    private $idUsuario;
    private $tipoDoc;
    private $numeroIdentificacion;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;
    private $direccion;
    private $telefono;
    private $genero;
    private $rol;
    private $estado = 'ACTIVO';
    private $conexion;

    public function __construct()
    {
        $this->conexion = new  \Conexion;
    }

    public function create()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("INSERT INTO usuarios (tipoDoc,numeroIdentificacion,nombre,apellido,correo,contrasena,estado)VALUES(?,?,?,?,?,?,?)");
            $sql->bindParam(1, $this->tipoDoc);
            $sql->bindParam(2, $this->numeroIdentificacion);
            $sql->bindParam(3, $this->nombre);
            $sql->bindParam(4, $this->apellido);
            $sql->bindParam(5, $this->correo);
            $sql->bindParam(6, $this->contrasena);
            $sql->bindParam(7, $this->estado);
            $sql->execute();
            return "Usuario Creado";
        } catch (\PDOException   $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function read()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM usuarios WHERE estado='ACTIVO'");
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
            $sql = $this->conexion->getConPDO()->prepare("UPDATE usuarios SET tipoDoc=?,numeroIdentificacion=?,nombre=?,apellido=?,correo=?,contrasena=? WHERE idUsuario=?");
            $sql->bindParam(1, $this->tipoDoc);
            $sql->bindParam(2, $this->numeroIdentificacion);
            $sql->bindParam(3, $this->nombre);
            $sql->bindParam(4, $this->apellido);
            $sql->bindParam(5, $this->correo);
            $sql->bindParam(6, $this->contrasena);
            $sql->bindParam(7, $this->idUsuario);
            $sql->execute();
            return "Usuario Modificado";
        } catch (\PDOException $e) {
            return "Error:" . $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("UPDATE usuarios SET estado='INACTIVO' WHERE idUsuario=?");
            $sql->bindParam(1, $this->idUsuario);
            $sql->execute();
            return "Usuario Eliminado";
        } catch (\PDOException $e) {
            return "Error" + $e->getMessage();
        }
    }

    public function login()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM usuarios WHERE estado='ACTIVO' AND correo=? AND contrasena=?");
            $sql->bindParam(1, $this->correo);
            $sql->bindParam(2, $this->contrasena);
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
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM usuarios WHERE idUsuario=?");
            $sql->bindParam(1, $this->idUsuario);
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return "Error:" . $e->getMessage();
        }
    }


    /**
     * Get the value of idUsuario
     */
    public function getId()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     */
    public function setId($idUsuario): self
    {
        $this->idUsuario = $idUsuario;

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
     * Get the value of contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     */
    public function setContrasena($contrasena): self
    {
        $this->contrasena = $contrasena;

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

    /**
     * Get the value of telefono
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of telefono
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

}
