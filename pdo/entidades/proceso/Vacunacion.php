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
class Vacunacion extends Entidad {

    /** @Column(type="date") */
    public $fechaElaboracion;

    /**
     * @ManyToOne(targetEntity="Semana", inversedBy="vacunaciones")
     * @JoinColumn(name="semana_id", referencedColumnName="id")
     */
    public $semana;

    /**
     * @ManyToOne(targetEntity="Parroquia", inversedBy="vacunaciones")
     * @JoinColumn(name="parroquia_id", referencedColumnName="id")
     */
    public $parroquia;

    /** @OneToMany(targetEntity="RegistroVacunacion", mappedBy="$vacunacion") */
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
