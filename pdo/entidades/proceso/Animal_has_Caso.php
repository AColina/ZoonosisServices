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

/**
 * @Entity
 */
class Animal_has_Caso {

    /** @Column(type="integer") */
    public $cantidadIngresado;

    /** @Column(type="integer") */
    public $cantidadPositivos;

    /**
     * @ManyToOne(targetEntity="Animal", inversedBy="animal_has_Caso")
     * @JoinColumn(name="animal_id", referencedColumnName="id")
     */
    public $animal;

    /**
     * @ManyToOne(targetEntity="Caso", inversedBy="animal_has_Caso")
     * @JoinColumn(name="caso_id", referencedColumnName="id")
     */
    public $caso;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getAnimal() {
        return $this->animal;
    }

    public function getCaso() {
        return $this->caso;
    }

    public function getCantidadIngresado() {
        return $this->cantidadIngresado;
    }

    public function getCantidadPositivos() {
        return $this->cantidadPositivos;
    }

    public function setAnimal($animal) {
        $this->animal = $animal;
    }

    public function setCaso($caso) {
        $this->caso = $caso;
    }

    public function setCantidadIngresado($cantidadIngresado) {
        $this->cantidadIngresado = $cantidadIngresado;
    }

    public function setCantidadPositivos($cantidadPositivos) {
        $this->cantidadPositivos = $cantidadPositivos;
    }

}
