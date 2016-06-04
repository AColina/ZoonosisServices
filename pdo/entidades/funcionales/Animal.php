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

/**
 * @Entity
 */
class Animal extends EntidadAdministrativa {

    /**
     * @ManyToOne(targetEntity="Especie", inversedBy="animales")
     * @JoinColumn(name="especie_id", referencedColumnName="id")
     */
    public $especie;

    /** @OneToMany(targetEntity="RegistroVacunacion_has_Animal", mappedBy="animal") */
    public $vacunacion_has_Animal;

    /** @OneToMany(targetEntity="Animal_has_Caso", mappedBy="animal") */
    public $animal_has_Caso;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getEspecie() {
        return $this->especie;
    }

    public function getVacunacion_has_Animal() {
        return $this->vacunacion_has_Animal;
    }

    public function getAnimal_has_Caso() {
        return $this->animal_has_Caso;
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function setVacunacion_has_Animal($vacunacion_has_Animal) {
        $this->vacunacion_has_Animal = $vacunacion_has_Animal;
    }

    public function setAnimal_has_Caso($animal_has_Caso) {
        $this->animal_has_Caso = $animal_has_Caso;
    }

}
