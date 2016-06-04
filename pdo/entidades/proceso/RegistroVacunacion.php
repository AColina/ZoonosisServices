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
class RegistroVacunacion extends Entidad {

    /**
     * @ManyToOne(targetEntity="Vacunacion", inversedBy="registroVacunacion")
     * @JoinColumn(name="vacunacion_id", referencedColumnName="id")
     */
    public $vacunacion;

    /**
     * @ManyToOne(targetEntity="Usuario", inversedBy="$registroVacunacion")
     * @JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    public $usuario;

    /** @OneToMany(targetEntity="RegistroVacunacion_has_Animal", mappedBy="$registroVacunacion") */
    public $registroVacunacion_has_Animal;

    public function __construct() {
        
    }

    //GETTER AND SETTER

    public function getVacunacion() {
        return $this->vacunacion;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getRegistroVacunacion_has_Animal() {
        return $this->registroVacunacion_has_Animal;
    }

    public function setVacunacion($vacunacion) {
        $this->vacunacion = $vacunacion;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setRegistroVacunacion_has_Animal($registroVacunacion_has_Animal) {
        $this->registroVacunacion_has_Animal = $registroVacunacion_has_Animal;
    }

}
