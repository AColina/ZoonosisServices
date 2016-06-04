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
require_once ('/../Entidad.php');

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;
use JMS\Serializer\Annotation\Type;

/**
 * @Entity
 */
class Caso extends Entidad {

    /**
     * @Type("DateTime")
     * @Column(type="date") 
     */
    public $fechaElaboracion;

    /**
     * @Type("Parroquia")
     * @ManyToOne(targetEntity="Parroquia", inversedBy="casos")
     * @JoinColumn(name="parroquia_id", referencedColumnName="id")
     */
    public $parroquia;

    /**
     * @Type("Semana")
     * @ManyToOne(targetEntity="Semana", inversedBy="casos")
     * @JoinColumn(name="semana_id", referencedColumnName="id")
     */
    public $semana;

    /**
     * @Type("array<Animal_has_Caso>")
     * @OneToMany(targetEntity="Animal_has_Caso", mappedBy="caso") 
     */
    public $animal_has_Caso;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getParroquia() {
        return $this->parroquia;
    }

    public function getSemana() {
        return $this->semana;
    }

    public function getAnimal_has_Caso() {
        return $this->animal_has_Caso;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setParroquia($parroquia) {
        $this->parroquia = $parroquia;
    }

    public function setSemana($semana) {
        $this->semana = $semana;
    }

    public function setAnimal_has_Caso($animal_has_Caso) {
        $this->animal_has_Caso = $animal_has_Caso;
    }

}
