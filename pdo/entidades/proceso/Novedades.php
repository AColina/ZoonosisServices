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
class Novedades extends EntidadAdministrativa {

    /** @Column(type="date") */
    public $fechaElaboracion;

    /** @Column(type="text") */
    public $descripcion;

    /**
     * @ManyToOne(targetEntity="Cliente", inversedBy="novedades")
     * @JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    public $cliente;

    /**
     * @ManyToOne(targetEntity="Usuario", inversedBy="novedades")
     * @JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    public $usuario;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}
