<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use JMS\Serializer\Annotation\Type;

/**
 * Description of BusquedasNovedadesPojo
 *
 * @author angel.colina
 */
class BusquedasNovedadesPojo {

    /**
     *
     * @Type("integer")
     */
    public $cantidad;

    /**
     *
     * @Type("Novedades")
     */
    public $resultados;

    function __construct($cantidad = 0, $resultados = NULL) {
        $this->cantidad = $cantidad;
        $this->resultados = $resultados;
    }

}
