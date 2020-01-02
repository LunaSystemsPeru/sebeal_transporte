<?php

require_once 'Conectar.php';

class Empresa
{
    private $id_empresa;
    private $ruc;
    private $razon_social;
    private $nombre_comercial;
    private $password;
    private $estado;
    private $c_conectar;

    /**
     * Empresa constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdEmpresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    /**
     * @return mixed
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    /**
     * @return mixed
     */
    public function getNombreComercial()
    {
        return $this->nombre_comercial;
    }

    /**
     * @param mixed $nombre_comercial
     */
    public function setNombreComercial($nombre_comercial)
    {
        $this->nombre_comercial = $nombre_comercial;
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


}