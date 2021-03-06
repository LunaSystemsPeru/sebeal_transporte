<?php

require_once 'Conectar.php';

class Envio
{
    private $id_envio;
    private $fecha_recepcion;
    private $fecha_envio;
    private $fecha_entrega;
    private $id_documento;
    private $serie;
    private $numero;
    private $id_destinatario;
    private $id_remitente;
    private $id_direccion;
    private $id_aorigen;
    private $id_adestino;
    private $id_usuario;
    private $id_cliente;
    private $total_pactado;
    private $total_facturado;
    private $total_pagado;
    private $estado; //1 para pendiente, 2 para enviado, 3 para entregado, 4 anulado
    private $referencia;
    private $c_conectar;

    /**
     * Envio constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdEnvio()
    {
        return $this->id_envio;
    }

    /**
     * @param mixed $id_envio
     */
    public function setIdEnvio($id_envio)
    {
        $this->id_envio = $id_envio;
    }

    /**
     * @return mixed
     */
    public function getFechaRecepcion()
    {
        return $this->fecha_recepcion;
    }

    /**
     * @param mixed $fecha_recepcion
     */
    public function setFechaRecepcion($fecha_recepcion)
    {
        $this->fecha_recepcion = $fecha_recepcion;
    }

    /**
     * @return mixed
     */
    public function getFechaEnvio()
    {
        return $this->fecha_envio;
    }

    /**
     * @param mixed $fecha_envio
     */
    public function setFechaEnvio($fecha_envio)
    {
        $this->fecha_envio = $fecha_envio;
    }

    /**
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
    }

    /**
     * @param mixed $fecha_entrega
     */
    public function setFechaEntrega($fecha_entrega)
    {
        $this->fecha_entrega = $fecha_entrega;
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
    public function getIdDestinatario()
    {
        return $this->id_destinatario;
    }

    /**
     * @param mixed $id_destinatario
     */
    public function setIdDestinatario($id_destinatario)
    {
        $this->id_destinatario = $id_destinatario;
    }

    /**
     * @return mixed
     */
    public function getIdRemitente()
    {
        return $this->id_remitente;
    }

    /**
     * @param mixed $id_remitente
     */
    public function setIdRemitente($id_remitente)
    {
        $this->id_remitente = $id_remitente;
    }

    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->id_direccion;
    }

    /**
     * @param mixed $id_direccion
     */
    public function setIdDireccion($id_direccion)
    {
        $this->id_direccion = $id_direccion;
    }

    /**
     * @return mixed
     */
    public function getIdAorigen()
    {
        return $this->id_aorigen;
    }

    /**
     * @param mixed $id_aorigen
     */
    public function setIdAorigen($id_aorigen)
    {
        $this->id_aorigen = $id_aorigen;
    }

    /**
     * @return mixed
     */
    public function getIdAdestino()
    {
        return $this->id_adestino;
    }

    /**
     * @param mixed $id_adestino
     */
    public function setIdAdestino($id_adestino)
    {
        $this->id_adestino = $id_adestino;
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
    public function getTotalPactado()
    {
        return $this->total_pactado;
    }

    /**
     * @param mixed $total_pactado
     */
    public function setTotalPactado($total_pactado)
    {
        $this->total_pactado = $total_pactado;
    }

    /**
     * @return mixed
     */
    public function getTotalFacturado()
    {
        return $this->total_facturado;
    }

    /**
     * @param mixed $total_facturado
     */
    public function setTotalFacturado($total_facturado)
    {
        $this->total_facturado = $total_facturado;
    }

    /**
     * @return mixed
     */
    public function getTotalPagado()
    {
        return $this->total_pagado;
    }

    /**
     * @param mixed $total_pagado
     */
    public function setTotalPagado($total_pagado)
    {
        $this->total_pagado = $total_pagado;
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
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param mixed $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    public function generarCodigo()
    {
        $sql = "select ifnull(max(id_envio) +1, 1) as codigo from envios";
        $this->id_envio = $this->c_conectar->get_valor_query($sql, "codigo");
    }

    public function verFilas()
    {
        $sql = "SELECT e.id_envio as id, e.fecha_recepcion, ds.abreviatura, e.serie, e.numero, cd.razon_social as destinatario, cr.razon_social as remitente, c.direccion as direntrega, u.usuario, e.estado, de.nombre as destino, e.referencia  
        FROM envios as e 
        inner join documentos_sunat ds on e.id_documento = ds.id_documento
        inner join clientes cr on e.id_remitente = cr.id_clientes
        inner join clientes cd on e.id_destinatario = cd.id_clientes
        inner join clientes_direccion c on cd.id_clientes = c.id_clientes and c.id_direccion = e.id_direccion
        inner join usuarios u on e.id_usuario = u.id_usuario 
        inner join destinos_empresa de on c.id_destino = de.id_destino
        where e.estado = 1 and e.id_aorigen = ".$_SESSION['id_origen']."
        order by e.fecha_recepcion asc, cr.razon_social asc, e.referencia asc";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verFilasCobranzas()
    {
        $sql = "SELECT e.id_envio as id, e.fecha_recepcion, ds.abreviatura, e.serie, e.numero, c2.razon_social as destinatario, c2.razon_social as remitente, c.direccion as direntrega, u.usuario, e.estado, de.nombre as destino, e.referencia, e.total_facturado, e.total_pactado, e.total_pagado  
        FROM envios as e 
        inner join documentos_sunat ds on e.id_documento = ds.id_documento
        inner join clientes c2 on e.id_cliente = c2.id_clientes
        inner join clientes_direccion c on c2.id_clientes = c.id_clientes and c.id_direccion = e.id_direccion
        inner join usuarios u on e.id_usuario = u.id_usuario 
        inner join destinos_empresa de on c.id_destino = de.id_destino
        where e.estado = 2 and e.id_aorigen = ".$_SESSION['id_origen']."
        order by e.fecha_recepcion asc, c2.razon_social asc, e.referencia asc";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function verFilasClientesCobranzas()
    {
        $sql = "SELECT e.id_cliente, c.documento, c.razon_social, sum(e.total_pactado)as pactado, sum(e.total_pagado) as pagado
        from envios as e 
        inner join clientes c on e.id_cliente = c.id_clientes
        where e.estado = 2 and e.total_pagado != e.total_pactado
        group by e.id_cliente";
        return $this->c_conectar->get_Cursor($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from envios 
        where id_envio = '$this->id_envio'";
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha_recepcion = $resultado['fecha_recepcion'];
        $this->fecha_envio = $resultado['fecha_envio'];
        $this->fecha_entrega = $resultado['fecha_entrega'];
        $this->id_documento = $resultado['id_documento'];
        $this->serie = $resultado['serie'];
        $this->numero = $resultado['numero'];
        $this->id_destinatario = $resultado['id_destinatario'];
        $this->id_remitente = $resultado['id_remitente'];
        $this->id_direccion = $resultado['id_direccion'];
        $this->id_aorigen = $resultado['id_aorigen'];
        $this->id_adestino = $resultado['id_adestino'];
        $this->id_usuario = $resultado['id_usuario'];
        $this->id_cliente = $resultado['id_cliente'];
        $this->total_pactado = $resultado['total_pactado'];
        $this->total_facturado = $resultado['total_facturado'];
        $this->total_pagado = $resultado['total_pagado'];
        $this->estado = $resultado['estado'];
        $this->referencia = $resultado['referencia'];

    }

    public function insertar()
    {
        $sql = "INSERT INTO envios 
                VALUES ('$this->id_envio',
                        '$this->fecha_recepcion',
                        '1000-01-01',
                        '1000-01-01',
                        '$this->id_documento',
                        '$this->serie',
                        '$this->numero',
                        '$this->id_destinatario',
                        '$this->id_remitente',
                        '$this->id_direccion',
                        '$this->id_aorigen',
                        '$this->id_adestino',
                        '$this->id_usuario',
                        '$this->id_cliente',
                        '$this->total_pactado',
                        '0',
                        '0',
                        '1',
                        '$this->referencia');";
        return $this->c_conectar->ejecutar_idu($sql);
    }

    public function eliminar()
    {
        $sql = "DELETE
                FROM envios
                WHERE id_envio = '$this->id_envio'";
        return $this->c_conectar->ejecutar_idu($sql);
    }
}