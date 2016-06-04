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
 * Description of Cliente
 *
 * @author GustavoG
 * @author Angel Colina
 */
class Cliente extends Entidad {

    public $telefono;
    public $correo;
    public $direccion;

    /**
     * @ManyToOne(entity=Parroquia)
     */
    public $parroquia_id;

    /**
     * @OneToOne(entity=Persona)
     */
    public $persona_id;

    /**
     * @OneToMany(entity=Novedades,mappedBy=cliente_id)
     */
    public $novedades;

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getParroquia_id() {
        return $this->parroquia_id;
    }

    public function getPersona_id() {
        return $this->persona_id;
    }

    public function getNovedades() {
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

    public function setParroquia_id($parroquia_id) {
        $this->parroquia_id = $parroquia_id;
    }

    public function setPersona_id($persona_id) {
        $this->persona_id = $persona_id;
    }

    public function setNovedades($novedades) {
        $this->novedades = $novedades;
    }

}
