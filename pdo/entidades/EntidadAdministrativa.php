<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '/Entidad.php';
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Column;
use JMS\Serializer\Annotation\Type;

/** @MappedSuperclass */
abstract class EntidadAdministrativa extends Entidad {

    /** 
     * @Type("string")
     * @Column(type="string") */
    public $nombre;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function __toString() {
        return $this->nombre;
    }

}
