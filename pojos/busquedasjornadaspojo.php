<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use JMS\Serializer\Annotation\Type;

/**
 * Description of BusquedasJornadasPojo
 *
 * @author angel.colina
 */
class BusquedasJornadasPojo {

    /**
     *
     * @Type("integer")
     */
    public $cantidad;

    /**
     *
     * @Type("RegistroVacunacion_has_Animal")
     */
    public $resultados;

    function __construct($cantidad = 0, $resultados = NULL) {
        $this->cantidad = $cantidad;
        $this->resultados = $resultados;
    }

}
