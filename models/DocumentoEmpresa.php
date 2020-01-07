<?php

require_once 'Conectar.php';

class DocumentoEmpresa
{
private $id_documento;
private $id_destino;
private $serie;
private $numero;
private $tipo; //1 para fisico, 2 para virtual
private $c_conectar;

    /**
     * DocumentoEmpresa constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * @param mixed $id_documento
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;
    }

    /**
     * @return mixed
     */
    public function getIdDestino()
    {
        return $this->id_destino;
    }

    /**
     * @param mixed $id_destino
     */
    public function setIdDestino($id_destino)
    {
        $this->id_destino = $id_destino;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function verFilas()
    {
        $sql = "SELECT de.id_documento, de.id_destino, ds.abreviatura, ds.cod_sunat, ds.nombre, d.nombre as destino 
        FROM documentos_empresa as de 
        inner join documentos_sunat ds on de.id_documento = ds.id_documento 
        inner join destinos_empresa d on de.id_destino = d.id_destino
        order by ds.nombre asc ";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function insertar()
    {
        $sql = "INSERT INTO documentos_empresa 
                VALUES ('$this->id_documento',
                        '$this->id_destino',
                        '$this->serie',
                        '$this->numero',
                        '$this->tipo');";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function actualizar()
    {
        $sql = "UPDATE 
                documentos_empresa
                SET serie = '$this->serie', 
                numero = '$this->numero', 
                tipo = '$this->tipo' 
                where id_documento = '$this->id_documento' and id_destino = '$this->id_destino' ";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM documentos_empresa
                where id_documento = '$this->id_documento' and id_destino = '$this->id_destino' ";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}