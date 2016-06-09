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
include_once ('/../EntidadAdministrativa.php');

use Doctrine\ORM\Mapping\Entity,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\ORM\Mapping\Column,
    JMS\Serializer\Annotation\Type,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Semana extends EntidadAdministrativa {

    /**
     * @Type("integer")
     * @Column(type="integer") */
    public $year;

    /**
     * @Type("ArrayCollection<Vacunacion>")
     * @OneToMany(targetEntity="Vacunacion", mappedBy="semana") */
    public $vacunaciones;

    /**
     * @Type("ArrayCollection<Caso>")
     * @OneToMany(targetEntity="Caso", mappedBy="semana", cascade={"remove"}) */
    public $casos;

    public function __construct() {
        
    }

    //GETTER AND SETTER


    public function getYear() {
        return $this->year;
    }

    public function getVacunaciones() {
        return $this->vacunaciones;
    }

    public function getCasos() {
        return $this->casos;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setVacunaciones($vacunaciones) {
        $this->vacunaciones = $vacunaciones;
    }

    public function setCasos($casos) {
        $this->casos = $casos;
    }

}
