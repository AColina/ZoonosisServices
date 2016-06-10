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
    Doctrine\ORM\Mapping\ManyToOne,
    Doctrine\ORM\Mapping\OneToOne,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping\JoinColumn,
    JMS\Serializer\Annotation\Type;

/**
 * @Entity 
 */
class Usuario extends EntidadAdministrativa {

    /**
     * @var string 
     * @Type("string")
     * @Column(type="string") */
    public $contrasena;

    /**
     * @var DateTime 
     * @Type("DateTime('d-m-Y')")
     * @Column(type="date") */
    public $fechaNacimiento;

    /**
     * @var Persona 
     * @Type("Persona")
     * @OneToOne(targetEntity="Persona", inversedBy="usuario",fetch="EAGER")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */
    public $persona;

    /**
     * @var ArrayCollection 
     * @Type("ArrayCollection<Novedades>")
     *  @OneToMany(targetEntity="Novedades", mappedBy="usuario", cascade={"all"}) */
    public $novedades;

    /**
     * @var Permiso 
     * @Type("Permiso")
     * @ManyToOne(targetEntity="Permiso", inversedBy="usuarios",fetch="EAGER")
     * @JoinColumn(name="permiso_id", referencedColumnName="id")
     */
    public $permiso;

    /**
     * @var ArrayCollection 
     * @Type("ArrayCollection<RegistroVacunacion>")
     * @OneToMany(targetEntity="RegistroVacunacion", mappedBy="usuario") */
    public $registroVacunacion;

    public function __construct() {
        
    }

    //GETTER AND SETTER


    public function getContrasena() {
        return $this->contrasena;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
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

    public function getPermiso() {
        return $this->permiso;
    }

    public function getRegistroVacunacion() {
        if ($this->registroVacunacion == NULL) {
            $this->registroVacunacion = new ArrayCollection();
        }
        return $this->registroVacunacion;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setPersona($persona) {
        $this->persona = $persona;
    }

    public function setNovedades($novedades) {
        $this->novedades = $novedades;
    }

    public function setPermiso($permiso) {
        $this->permiso = $permiso;
    }

    public function setRegistroVacunacion($registroVacunacion) {
        $this->registroVacunacion = $registroVacunacion;
    }

}
