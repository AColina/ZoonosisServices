<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use JMS\Serializer\Annotation\Type;

/**
 * Description of BusquedasCasoPojo
 *
 * @author angel.colina
 */
class BusquedasCasoPojo {

    /**
     *
     * @Type("integer")
     */
    public $cantidad;

    /**
     *
     * @Type("Caso")
     */
    public $resultados;

    function __construct($cantidad = 0, $resultados = NULL) {
        $this->cantidad = $cantidad;
        $this->resultados = $resultados;
    }

}
