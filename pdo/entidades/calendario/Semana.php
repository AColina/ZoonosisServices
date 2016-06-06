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

/**
 * @Entity
 */
class Semana extends Entidad {

    /** @Column(type="string") */
    public $semana;

    /** @Column(type="integer") */
    public $year;

    /** @OneToMany(targetEntity="Vacunacion", mappedBy="semana") */
    public $vacunaciones;

    /** @OneToMany(targetEntity="Caso", mappedBy="semana", cascade={"remove"}) */
    public $casos;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getSemana() {
        return $this->semana;
    }

    public function getYear() {
        return $this->year;
    }

    public function getVacunaciones() {
        return $this->vacunaciones;
    }

    public function getCasos() {
        return $this->casos;
    }

    public function setSemana($semana) {
        $this->semana = $semana;
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
