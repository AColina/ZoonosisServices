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

use Doctrine\ORM\Mapping\Entity,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\ORM\Mapping\ManyToOne,
    Doctrine\ORM\Mapping\OneToOne,
    Doctrine\ORM\Mapping\JoinColumn,
    Doctrine\ORM\Mapping\Column,
    JMS\Serializer\Annotation\Type,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 */
class Cliente extends Entidad {

    /**
     * @Type("string")
     * @Column(type="string") 
     */
    public $telefono;

    /**
     * @Type("string")
     * @Column(type="string") 
     */
    public $correo;

    /**
     * @Type("string")
     * @Column(type="string")
     *  */
    public $direccion;

    //relaciones

    /**
     * 
     * @Type("Parroquia")
     * @ManyToOne(targetEntity="Parroquia", inversedBy="clientes")
     * @JoinColumn(name="parroquia_id", referencedColumnName="id")
     */
    public $parroquia;

    /**
     * @Type("Persona")
     * @OneToOne(targetEntity="Persona", inversedBy="cliente")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */
    public $persona;

    /**
     * @var ArrayCollection 
     * @Type("ArrayCollection<Novedades>")
     * @OneToMany(targetEntity="Novedades", mappedBy="cliente") */
    public $novedades;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getParroquia() {
        return $this->parroquia;
    }

    public function getPersona() {
        return $this->persona;
    }

    public function getNovedades() {
        if ($this->novedades == NULL) {
            $this->novedades = new ArrayCollection();
        }
        return $this->novedades;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setParroquia($parroquia) {
        $this->parroquia = $parroquia;
    }

    public function setPersona($persona) {
        $this->persona = $persona;
    }

    public function setNovedades($novedades) {
        $this->novedades = $novedades;
    }

}
