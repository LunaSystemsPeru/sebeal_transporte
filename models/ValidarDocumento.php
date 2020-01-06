<?php


class ValidarDocumento
{
    private $url_ruc = "http://lunasystemsperu.com/consultas_json/composer/consulta_sunat_JMP.php?ruc=";
    private $url_dni = "http://lunasystemsperu.com/consultas_json/composer/consultas_dni_JMP.php?dni=";
    private $documento;

    function __construct() {

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


    public function obtener_datos_documentos() {
        if (strlen($this->documento) == 11) {
            $json = file_get_contents($this->url_ruc . $this->documento, FALSE);
            // Check for errors
            if ($json === FALSE) {
                die('Error');
            }
        }elseif (strlen($this->documento) == 8){
            $json = file_get_contents($this->url_dni . $this->documento, FALSE);
            // Check for errors
            if ($json === FALSE) {
                die('Error');
            }
        } else {
            $json = (object) array(
                "success" => false,
                "entity" => "LA CANTIDAD DE DIGITOS NO ES 11 o 8"
            );
        }

        return $json;
    }

    /*public function obtener_ruc() {
        if (strlen($this->ruc) == 11) {
            $json_ruc = file_get_contents($this->url_ruc . $this->ruc, FALSE);
            // Check for errors
            if ($json_ruc === FALSE) {
                die('Error');
            }
        } else {
            $json_ruc = (object) array(
                "success" => false,
                "entity" => "LA CANTIDAD DE DIGITOS NO ES 11"
            );
        }

        return $json_ruc;
    }

    public function obtener_dni() {
        if (strlen($this->dni) == 8) {
            $json = file_get_contents($this->url_dni . $this->dni, FALSE);
            // Check for errors
            if ($json === FALSE) {
                die('Error');
            }
        } else {
            $json = (object) array(
                "success" => false,
                "entity" => "LA CANTIDAD DE DIGITOS NO ES 8"
            );
        }

        return $json;
    }*/
}