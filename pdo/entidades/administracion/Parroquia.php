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

use Doctrine\ORM\Mapping\Entity,
    Doctrine\ORM\Mapping\ManyToOne,
    Doctrine\ORM\Mapping\JoinColumn,
    Doctrine\ORM\Mapping\OneToMany,
    JMS\Serializer\Annotation\Type,
    Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Parroquia extends EntidadAdministrativa {

    /**
     * @var Municipio 
     * @Type("Municipio")
     * @ManyToOne(targetEntity="Municipio",fetch="EAGER")
     * @JoinColumn(name="municipio_id", nullable=false)
     */
    public $municipio;

    /**
     * @var Collection 
     * @Type("ArrayCollection<Cliente>")
     * @OneToMany(targetEntity="Cliente", mappedBy="parroquia") 
     */
    public $clientes;

    /**
     * @var Collection 
     * @Type("ArrayCollection<Vacunacion>")
     * @OneToMany(targetEntity="Vacunacion", mappedBy="parroquia")
     *  */
    public $vacunaciones;

    /**
     * @Type("ArrayCollection<Caso>")
     * @OneToMany(targetEntity="Caso", mappedBy="parroquia", cascade={"remove"}) 
     */
    public $casos;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getMunicipio() {
        return $this->municipio;
    }

    public function getClientes() {
        if ($this->clientes == NULL) {
            $this->clientes = new ArrayCollection();
        }
        return $this->clientes;
    }

    public function getVacunaciones() {
        if ($this->vacunaciones == NULL) {
            $this->vacunaciones = new ArrayCollection();
        }
        return $this->vacunaciones;
    }

    /**
     * 
     * @return ArrayCollection<Caso>
     */
    public function getCasos() {
        if ($this->casos == NULL) {
            $this->casos = new ArrayCollection();
        }
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
