<?php
require_once 'Conectar.php';

class DocumentosEmpresa
{
    private $id_documento;
    private $id_destino;
    private $serie;
    private $numero;
    private $tipo;

    private $c_conectar;

    /**
     * DocumentosEmpresa constructor.
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

    public function obtenerDatos_documento()
    {
        $sql = "select * from documentos_empresa 
        where id_documento = '$this->id_documento'";

        $resultado = $this->c_conectar->get_Row($sql);
        $this->id_destino=$resultado["id_destino"];
        $this->serie=$resultado["serie"];
        $this->numero=$resultado["numero"];
        $this->tipo=$resultado["tipo"];


    }
    public function obtenerDatos_json()
    {
        $sql = "select * from documentos_empresa 
        where id_documento = '$this->id_documento'";

        return $this->c_conectar->get_json_row($sql);
    }


}