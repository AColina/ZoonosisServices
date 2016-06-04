<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal_has_Caso
 *
 * @author GustavoG
 */
class Animal_has_Caso {

    /**
     * @Id
     * @ManyToOne(entity=Animal)
     */
    public $animal_id;

    /**
     * @Id
     * @ManyToOne(entity=Caso)
     */
    public $caso_id;
    public $cantidadIngresado;
    public $cantidadPositivos;

    public function getAnimal_id() {
        return $this->animal_id;
    }

    public function getCaso_id() {
        return $this->caso_id;
    }

    public function getCantidadIngresado() {
        return $this->cantidadIngresado;
    }

    public function getCantidadPositivos() {
        return $this->cantidadPositivos;
    }

    public function setAnimal_id($animal_id) {
        $this->animal_id = $animal_id;
    }

    public function setCaso_id($caso_id) {
        $this->caso_id = $caso_id;
    }

    public function setCantidadIngresado($cantidadIngresado) {
        $this->cantidadIngresado = $cantidadIngresado;
    }

    public function setCantidadPositivos($cantidadPositivos) {
        $this->cantidadPositivos = $cantidadPositivos;
    }

}
