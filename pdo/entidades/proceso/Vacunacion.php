<?php

/*
 * Copyright 2016 angel.colina.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
include_once ('/../Entidad.php');

use Doctrine\ORM\Mapping\Entity,
    Doctrine\ORM\Mapping\Column,
    Doctrine\ORM\Mapping\ManyToOne,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping\JoinColumn,
    JMS\Serializer\Annotation\Type;

/**
 * @Entity
 */
class Vacunacion extends Entidad {

    /**
     * @var DateTime 
     * @Type("DateTime('dd-MM-yyyy')")
     * @Column(type="date") */
    public $fechaElaboracion;

    /**
     * @Type("Semana")
     * @ManyToOne(targetEntity="Semana", inversedBy="vacunaciones")
     * @JoinColumn(name="semana_id", referencedColumnName="id")
     */
    public $semana;

    /**
     * @Type("Parroquia")
     * @ManyToOne(targetEntity="Parroquia", inversedBy="vacunaciones")
     * @JoinColumn(name="parroquia_id", referencedColumnName="id")
     */
    public $parroquia;

    /**
     * @Type("ArrayCollection<RegistroVacunacion>")
     * @OneToMany(targetEntity="RegistroVacunacion", mappedBy="vacunacion",cascade={"all"})
     *  */
    public $registroVacunacion;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getSemana() {
        return $this->semana;
    }

    public function getParroquia() {
        return $this->parroquia;
    }

    public function getRegistroVacunacion() {
        if ($this->registroVacunacion == NULL) {
            $this->registroVacunacion = new ArrayCollection();
        }
        return $this->registroVacunacion;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setSemana($semana) {
        $this->semana = $semana;
    }

    public function setParroquia($parroquia) {
        $this->parroquia = $parroquia;
    }

    public function setRegistroVacunacion($registroVacunacion) {
        $this->registroVacunacion = $registroVacunacion;
    }

}
