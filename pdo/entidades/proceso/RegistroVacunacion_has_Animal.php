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

/**
 * Description of RegistroVacunacion_has_Animal
 *
 * @author angel.colina
 */
class RegistroVacunacion_has_Animal {

    /**
     * @id
     * @ManyToOne(entity=RegistroVacunacion)
     */
    public $registroVacunacion_id;

    /**
     * @id
     * @ManyToOne(entity=Animal)
     */
    public $animal_id;
    public $cantidad;

    public function getRegistroVacunacion_id() {
        return $this->registroVacunacion_id;
    }

    public function getAnimal_id() {
        return $this->animal_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setRegistroVacunacion_id($registroVacunacion_id) {
        $this->registroVacunacion_id = $registroVacunacion_id;
    }

    public function setAnimal_id($animal_id) {
        $this->animal_id = $animal_id;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

}
