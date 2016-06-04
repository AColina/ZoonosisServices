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
class Usuario extends Entidad {

    /** @Column(type="string") */
    public $usuario;

    /** @Column(type="string") */
    public $contrasena;

    /** @Column(type="date") */
    public $fechaNacimiento;

    /**
     * @OneToOne(targetEntity="Persona", inversedBy="usuario")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */
    public $persona;

    /** @OneToMany(targetEntity="Novedades", mappedBy="usuario") */
    public $novedades;

    /**
     * @ManyToOne(targetEntity="Permiso", inversedBy="usuarios")
     * @JoinColumn(name="permiso_id", referencedColumnName="id")
     */
    public $permiso;

    /** @OneToMany(targetEntity="RegistroVacunacion", mappedBy="usuario") */
    public $registroVacunacion;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getUsuario() {
        return $this->usuario;
    }

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
        return $this->novedades;
    }

    public function getPermiso() {
        return $this->permiso;
    }

    public function getRegistroVacunacion() {
        return $this->registroVacunacion;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
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
