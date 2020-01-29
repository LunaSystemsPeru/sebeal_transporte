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
        where id_hoja_ruta = '$this->idHojaRuta' AND idenvio = '$this->idenvio'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->idenvio = $resultado['idenvio'];
    }

    public function validarIdEnvio()
    {
        $sql = "select id_hoja_ruta 
        from hoja_ruta_envios 
        where  idenvio = '$this->idenvio'";
        $resultado = $this->c_conectar->get_Row($sql);
            $this->idHojaRuta = $resultado['id_hoja_ruta'];
    }

    public function actualizar()
    {
        $sql = "UPDATE hoja_ruta_envios
                SET  WHERE  id_hoja_ruta = '$this->idHojaRuta'  AND  idenvio = '$this->idenvio' ";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM hoja_ruta_envios
                WHERE  id_hoja_ruta = '$this->idHojaRuta'  AND  idenvio = '$this->idenvio'  ";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function ver_filas()
    {
        $sql = "select c.razon_social, cd.direccion, hre.idenvio, ds.abreviatura, e.serie, e.numero, e.fecha_recepcion, e.referencia
        from hoja_ruta_envios as hre
        inner join envios e on hre.idenvio = e.id_envio
        inner join documentos_sunat ds on e.id_documento = ds.id_documento
        inner join clientes c on e.id_destinatario = c.id_clientes 
        inner join clientes_direccion cd on e.id_direccion = cd.id_direccion and e.id_destinatario = cd.id_clientes
        where hre.id_hoja_ruta = '$this->idHojaRuta' 
        order by c.razon_social asc";
        return $this->c_conectar->ejecutar_idu($sql);
    }

}
