<?php


require_once 'Conectar.php';


class HojaRutaEnvio
{

    private $idHojaRuta;
    private $idenvio;

    private $c_conectar;


    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    public function getIdHojaRuta()
    {
        return $this->idHojaRuta;
    }

    public function setIdHojaRuta($idHojaRuta)
    {
        $this->idHojaRuta = $idHojaRuta;
    }

    public function getIdenvio()
    {
        return $this->idenvio;
    }

    public function setIdenvio($idenvio)
    {
        $this->idenvio = $idenvio;
    }


    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_hoja_ruta) +1, 1) as codigo from hoja_ruta_envios";
        $this->idHojaRuta = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function insertar()
    {
        $sql = "insert into hoja_ruta_envios values ('$this->idHojaRuta', '$this->idenvio')";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from hoja_ruta_envios 
        where id_hoja_ruta = '$this->idHojaRuta' AND idenvio = '$this->idenvio'" ;
        $resultado = $this->c_conectar->get_Row($sql);
         $this->idenvio = $resultado['idenvio'];
        }

    public function actualizar()
    {
        $sql = "UPDATE hoja_ruta_envios
                SET  WHERE  id_hoja_ruta = '$this->idHojaRuta'  AND  idenvio = '$this->idenvio' " ;
         return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM hoja_ruta_envios
                WHERE  id_hoja_ruta = '$this->idHojaRuta'  AND  idenvio = '$this->idenvio'  " ; 
        return $this->c_conectar->ejecutar_idu($sql);
    }

}
