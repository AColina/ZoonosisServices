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
require_once ('/../EntidadAdministrativa.php');

/**
 * @Entity
 */
class Parroquia extends EntidadAdministrativa {

    /**
     * @ManyToOne(targetEntity="Municipio", inversedBy="parroquias")
     * @JoinColumn(name="municipio_id", referencedColumnName="id")
     */
    public $municipio;

    /** @OneToMany(targetEntity="Cliente", mappedBy="parroquia") */
    public $clientes;

    /** @OneToMany(targetEntity="Vacunacion", mappedBy="parroquia") */
    public $vacunaciones;

    /** @OneToMany(targetEntity="Caso", mappedBy="parroquia") */
    public $casos;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getMunicipio() {
        return $this->municipio;
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function getVacunaciones() {
        return $this->vacunaciones;
    }

    public function getCasos() {
        return $this->casos;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setClientes($clientes) {
        $this->clientes = $clientes;
    }

    public function setVacunaciones($vacunaciones) {
        $this->vacunaciones = $vacunaciones;
    }

    public function setCasos($casos) {
        $this->casos = $casos;
    }

}
