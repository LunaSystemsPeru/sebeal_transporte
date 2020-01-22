<?php
require_once 'Conectar.php';

class HojaRuta
{
    private $id_hoja_ruta;
    private $fecha;
    private $idOrigen;
    private $idDestino;
    private $idChofer;
    private $idVehiculo;
    private $idUsuario;
    private $idContrato;
    private $capacidad_contratada;
    private $monto_contrato;
    private $monto_facturado;

    private $c_conectar;

    /**
     * HojaRuta constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getMontoContrato()
    {
        return $this->monto_contrato;
    }

    /**
     * @param mixed $monto_contrato
     */
    public function setMontoContrato($monto_contrato)
    {
        $this->monto_contrato = $monto_contrato;
    }

    /**
     * @return mixed
     */
    public function getMontoFacturado()
    {
        return $this->monto_facturado;
    }

    /**
     * @param mixed $monto_facturado
     */
    public function setMontoFacturado($monto_facturado)
    {
        $this->monto_facturado = $monto_facturado;
    }


    /**
     * @return mixed
     */
    public function getIdHojaRuta()
    {
        return $this->id_hoja_ruta;
    }

    /**
     * @param mixed $id_hoja_ruta
     */
    public function setIdHojaRuta($id_hoja_ruta)
    {
        $this->id_hoja_ruta = $id_hoja_ruta;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdOrigen()
    {
        return $this->idOrigen;
    }

    /**
     * @param mixed $idOrigen
     */
    public function setIdOrigen($idOrigen)
    {
        $this->idOrigen = $idOrigen;
    }

    /**
     * @return mixed
     */
    public function getIdDestino()
    {
        return $this->idDestino;
    }

    /**
     * @param mixed $idDestino
     */
    public function setIdDestino($idDestino)
    {
        $this->idDestino = $idDestino;
    }

    /**
     * @return mixed
     */
    public function getIdChofer()
    {
        return $this->idChofer;
    }

    /**
     * @param mixed $idChofer
     */
    public function setIdChofer($idChofer)
    {
        $this->idChofer = $idChofer;
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
    }

    /**
     * @param mixed $idVehiculo
     */
    public function setIdVehiculo($idVehiculo)
    {
        $this->idVehiculo = $idVehiculo;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * @param mixed $idContrato
     */
    public function setIdContrato($idContrato)
    {
        $this->idContrato = $idContrato;
    }


    /**
     * @return mixed
     */
    public function getCapacidadContratada()
    {
        return $this->capacidad_contratada;
    }

    /**
     * @param mixed $capacidad_contratada
     */
    public function setCapacidadContratada($capacidad_contratada)
    {
        $this->capacidad_contratada = $capacidad_contratada;
    }
    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_hoja_ruta) +1, 1) as codigo from hoja_ruta";
        $this->id_hoja_ruta = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function obtenerDatos()
    {
        $sql = "select * from hoja_ruta 
        where id_hoja_ruta = '$this->id_hoja_ruta'";
        $resultado = $this->c_conectar->get_Row($sql);
        if ($resultado) {
            $this->fecha = $resultado['fecha'];
            $this->idOrigen = $resultado['id_origen'];
            $this->idDestino = $resultado['id_destino'];
            $this->idChofer = $resultado['id_chofer'];
            $this->idVehiculo = $resultado['id_vehiculo'];
            $this->idUsuario = $resultado['id_usuario'];
            $this->capacidad_contratada = $resultado['capacidad_contratada'];
        }
    }

    public function inserta(){
        $sql = "insert into hoja_ruta values ('$this->id_hoja_ruta', '$this->fecha', '$this->idOrigen', '$this->idDestino', '$this->idChofer', '$this->idVehiculo', '$this->idUsuario', '$this->capacidad_contratada','$this->monto_contrato','$this->monto_facturado')";
        return $this->c_conectar->ejecutar_idu($sql);
    }
    public function ver_filas(){
        $sql = "SELECT 
              hoja_ruta.id_hoja_ruta,
              hoja_ruta.fecha,
              hoja_ruta.capacidad_contratada,
              chofer.datos,
              vehiculo.placa,
              origen.nombre as origen,
              destino.nombre as destino 
            FROM
              hoja_ruta 
              INNER JOIN chofer  ON  
                  hoja_ruta.id_chofer = chofer.id_chofer  
              INNER JOIN vehiculo   ON 
                  hoja_ruta.id_vehiculo = vehiculo.id_vehiculo 
              INNER JOIN destinos_empresa AS origen  ON 
                  hoja_ruta.id_origen = origen.id_destino 
              INNER JOIN destinos_empresa AS destino ON
                  hoja_ruta.id_destino = destino.id_destino ";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}