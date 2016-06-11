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
    Doctrine\ORM\Mapping\Column,
    Doctrine\ORM\Mapping\OneToOne,
    JMS\Serializer\Annotation\Type;

/**
 * @Entity 
 */
class Persona extends EntidadAdministrativa {

    /**
     * @Type("string")
     * @Column(type="string")
     *  */
    public $apellido;

    /**
     * @Type("string")
     * @Column(type="string") 
     */
    public $cedula;

    /**
     * @Type("Cliente")
     * @OneToOne(targetEntity="Cliente", mappedBy="persona", cascade={"all"}) 
     */
    public $cliente;

    /**
     * @Type("Usuario")
     * @OneToOne(targetEntity="Usuario", mappedBy="persona", cascade={"all"})
     */
    public $usuario;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getApellido() {
        return $this->apellido;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}
