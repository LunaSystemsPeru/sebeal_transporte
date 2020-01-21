<?php

require_once 'Conectar.php';

class Usuario
{
    private $id_usuario;
    private $documento;
    private $datos;
    private $direccion;
    private $fecha_nacimiento;
    private $email;
    private $telefono;
    private $fecha_ingreso;
    private $id_agencia;
    private $usuario;
    private $password;
    private $estado;
    private $c_conectar;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * @param mixed $fecha_nacimiento
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * @param mixed $fecha_ingreso
     */
    public function setFechaIngreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;
    }

    /**
     * @return mixed
     */
    public function getIdAgencia()
    {
        return $this->id_agencia;
    }

    /**
     * @param mixed $id_agencia
     */
    public function setIdAgencia($id_agencia)
    {
        $this->id_agencia = $id_agencia;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_usuario) +1, 1) as codigo from usuarios";
        $this->id_usuario = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from usuarios 
        where id_usuario = '$this->id_banco'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->documento = $resultado['documento'];
        $this->datos = $resultado['datos'];
        $this->direccion = $resultado['direccion'];
        $this->fecha_nacimiento = $resultado['fecha_nacimiento'];
        $this->email = $resultado['email'];
        $this->telefono = $resultado['telefono'];
        $this->fecha_ingreso = $resultado['fecha_ingreso'];
        $this->id_agencia = $resultado['id_agencia'];
        $this->usuario = $resultado['usuario'];
        $this->password = $resultado['password'];
        $this->estado = $resultado['estado'];
    }


    public function insertar()
    {
        $sql = "insert into usuarios values ('$this->id_usuario', '$this->documento', '$this->datos', '$this->direccion', '$this->fecha_nacimiento', '$this->email', '$this->telefono', '$this->fecha_ingreso', '$this->id_agencia', '$this->usuario', '$this->password', '1')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function actualizar()
    {
        $sql = "update usuarios set documento = '$this->documento', datos = '$this->datos', direccion = '$this->direccion', fecha_nacimiento = '$this->fecha_nacimiento', email = '$this->email', 
                    telefono = '$this->telefono', id_agencia = '$this->id_agencia', usuario = '$this->usuario' 
                    where id_usuario = '$this->id_usuario'";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function verFila_usuario()
    {
        $sql = "SELECT id_usuario, usuario, datos, fecha_nacimiento, id_agencia, fecha_ingreso
                FROM usuarios";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verFilas()
    {
        $sql = "select * 
        from usuarios ";
        return $this->c_conectar->get_Cursor($sql);
    }

}