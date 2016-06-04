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
class RegistroVacunacion_has_Animal {

    /** @Column(type="integer") */
    public $cantidad;

    /**
     * @ManyToOne(targetEntity="RegistroVacunacion", inversedBy="registroVacunacion_has_Animal")
     * @JoinColumn(name="registroVacunacion_id", referencedColumnName="id")
     */
    public $registroVacunacion;

    /**
     * @ManyToOne(targetEntity="Animal", inversedBy="vacunacion_has_Animal")
     * @JoinColumn(name="animal_id", referencedColumnName="id")
     */
    public $animal;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getRegistroVacunacion() {
        return $this->registroVacunacion;
    }

    public function getAnimal() {
        return $this->animal;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setRegistroVacunacion($registroVacunacion) {
        $this->registroVacunacion = $registroVacunacion;
    }

    public function setAnimal($animal) {
        $this->animal = $animal;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

}
