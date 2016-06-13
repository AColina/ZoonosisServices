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

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use JMS\Serializer\Annotation\Type;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Caso extends Entidad {

    /**
     * @Type("DateTime('d-m-Y')")
     * @Column(type="date") 
     */
    public $fechaElaboracion;

    /**
     * @var Parroquia 
     * @Type("Parroquia")
     * @ManyToOne(targetEntity="Parroquia", inversedBy="casos", fetch="EAGER")
     * @JoinColumn(name="parroquia_id")
     */
    public $parroquia;

    /**
     * @var Semana 
     * @Type("Semana")
     * @ManyToOne(targetEntity="Semana", fetch="EAGER")
     * @JoinColumn(name="semana_id")
     */
    public $semana;

    /**
     * @var ArrayCollection 
     * @Type("ArrayCollection<Animal_has_Caso>")
     * @OneToMany(targetEntity="Animal_has_Caso", mappedBy="caso", cascade={"all"}, fetch="EAGER")
     */
    public $animal_has_Caso;

    public function __construct() {
        
    }

    //GETTER AND SETTER

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    /**
     * 
     * @return Parroquia
     */
    public function getParroquia() {
        return $this->parroquia;
    }

    /**
     * 
     * @return Semana
     */
    public function getSemana() {
        return $this->semana;
    }

    /**
     * 
     * @return ArrayCollection
     */
    public function getAnimal_has_Caso() {
        if ($this->animal_has_Caso == NULL) {
            $this->animal_has_Caso = new ArrayCollection();
        }
        return $this->animal_has_Caso;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setParroquia($parroquia) {
        if ($parroquia != null) {
            $parroquia->getCasos()->add($this);
        }
        $this->parroquia = $parroquia;
    }

    public function setSemana(Semana $semana) {
        $this->semana = $semana;
    }

    public function setAnimal_has_Caso($animal_has_Caso) {
        $this->animal_has_Caso = $animal_has_Caso;
    }

}
