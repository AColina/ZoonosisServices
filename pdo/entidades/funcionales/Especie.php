<?php

include_once ('/../Entidad.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Especie
 *
 * @author GustavoG
 */
class Especie extends Entidad {

    public $nombre;

    /**
     * @OneToMany(entity=Animal,mappedBy=especie_id)
     */
    public $animales;

    public function getNombre() {
        return $this->nombre;
    }

    public function getAnimales() {
        return $this->animales;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setAnimales($animales) {
        $this->animales = $animales;
    }

}
