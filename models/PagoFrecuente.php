<?php
require_once 'Conectar.php';

class PagoFrecuente
{
Private $idfrecuente;
Private $fecha_recordatorio;
Private $monto;
Private $pagado;
Private $id_proveedor;
Private $servicio;
Private $frecuencia;
Private $estado;
Private $id_clasificacion;

Private $c_conectar;
    /**
     * PagoFrecuente constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdFrecuente()
    {
        return $this->idfrecuente;
    }

    /**
     * @param mixed $idfrecuente
     */
    public function setIdFrecuente($idfrecuente)
    {
        $this->id_frecuente = $idfrecuente;
    }

    /**
     * @return mixed
     */
    public function getFechaRecordatorio()
    {
        return $this->fecha_recordatorio;
    }

    /**
     * @param mixed $fecha_recordatorio
     */
    public function setFechaRecordatorio($fecha_recordatorio)
    {
        $this->fecha_recordatorio = $fecha_recordatorio;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    /**
     * @return mixed
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param mixed $servicio
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;
    }

    /**
     * @return mixed
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * @param mixed $frecuencia
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
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

    /**
     * @return mixed
     */
    public function getIdClasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * @param mixed $id_clasificacion
     */
    public function setIdClasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;
    }
    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_frecuente) +1, 1) as codigo from pagos_frecuentes";
        $this->idfrecuente = $this->c_conectar->get_valor_query($sql, "codigo");
    }
    public function insertar()
    {
        $sql = "INSERT INTO pagos_frecuentes
                VALUES
                  (
                    '$this->idfrecuente',
                    '$this->fecha_recordatorio',
                    '$this->monto',
                    '$this->pagado',
                    '$this->id_proveedor',
                    '$this->servicio',
                    '$this->frecuencia',
                    
                    
                    '$this->id_clasificacion',
                    '$this->estado'
                  ) ;";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function verFilas(){
        $sql = "select * 
        from pagos_frecuentes ";
        return $this->c_conectar->get_Cursor($sql);
    }
}