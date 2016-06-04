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
 * Description of RegistroVacunacion
 *
 * @author angel.colina
 */
class RegistroVacunacion extends Entidad {

    /**
     * @ManyToOne(entity=Vacunacion)
     */
    public $vacunacion_id;

    /**
     * @ManyToOne(entity=Usuario)
     */
    public $usuario_id;

    /**
     * @OneToMany(entity=RegistroVacunacion_has_Animal,mappedBy=registroVacunacion_id)
     */
    public $registroVacunacion_has_Animal;

    public function getVacunacion_id() {
        return $this->vacunacion_id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function getVacunacion_has_Animal() {
        return $this->vacunacion_has_Animal;
    }

    public function setVacunacion_id($vacunacion_id) {
        $this->vacunacion_id = $vacunacion_id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setVacunacion_has_Animal($vacunacion_has_Animal) {
        $this->vacunacion_has_Animal = $vacunacion_has_Animal;
    }

}
