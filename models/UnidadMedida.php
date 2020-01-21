<?php
require_once 'Conectar.php';

class UnidadMedida
{
    private $id_unidad;
    private $nombre;
    private $abreviatura;
    private $cod_sunat;
    private $c_conectar;

    /**
     * UnidadMedida constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdUnidad()
    {
        return $this->id_unidad;
    }

    /**
     * @param mixed $id_unidad
     */
    public function setIdUnidad($id_unidad)
    {
        $this->id_unidad = $id_unidad;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * @param mixed $abreviatura
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }

    /**
     * @return mixed
     */
    public function getCodSunat()
    {
        return $this->cod_sunat;
    }

    /**
     * @param mixed $cod_sunat
     */
    public function setCodSunat($cod_sunat)
    {
        $this->cod_sunat = $cod_sunat;
    }
    public function verFilas()
    {
        $sql = "select * from unidad_medida 
order by descripcion asc";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function obtener_datos()
    {
        $query = "SELECT * FROM contratos WHERE id_contrato = '" . $this->id . "' ";
        $columna = $this->c_conectar->get_Row($query);
        $this->fechaInicio=$columna["fecha_inicio"];
        $this->fechaFin=$columna["fecha_fin"];
        $this->duracion=$columna["duracion"];
        $this->idProveedor=$columna["id_proveedor"];
        $this->servicio=$columna["servicio"];
        $this->montoPactado=$columna["monto_pactado"];
        $this->montoPagado=$columna["monto_pagado"];
        $this->montoFacturado=$columna["monto_facturado"];
        $this->estado=$columna["estado"];
        $this->idClasificacion=$columna["id_clasificacion"];
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM sebeal.contratos
                WHERE id_contrato = '$this->id';";

        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function actualizarContrato()
    {
        $sql = "UPDATE contratos
                SET 
                  fecha_inicio = '$this->fechaInicio',
                  duracion = '$this->duracion',
                  monto_pactado = '$this->montoPactado'
                WHERE id_contrato = '$this->id';";

        return $this->c_conectar->ejecutar_idu($sql);
    }

}