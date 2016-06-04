<?php

include_once ('/../Entidad.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author GustavoG
 */
class Animal extends Entidad {

    public $nombre;

    /**
     * @ManyToOne(entity=Especie)
     */
    public $especie_id;

    /**
     * @OneToMany(entity=RegistroVacunacion_has_Animal,mappedBy=animal_id)
     */
    public $vacunacion_has_Animal;

    /**
     * @OneToMany(entity=Animal_has_Caso,mappedBy=animal_id)
     */
    public $animal_has_Caso;

    public function getNombre() {
        return $this->nombre;
    }

    public function getEspecie_id() {
        return $this->especie_id;
    }

    public function getVacunacion_has_Animal() {
        return $this->vacunacion_has_Animal;
    }

    public function getAnimal_has_Caso() {
        return $this->animal_has_Caso;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEspecie_id($especie_id) {
        $this->especie_id = $especie_id;
    }

    public function setVacunacion_has_Animal($vacunacion_has_Animal) {
        $this->vacunacion_has_Animal = $vacunacion_has_Animal;
    }

    public function setAnimal_has_Caso($animal_has_Caso) {
        $this->animal_has_Caso = $animal_has_Caso;
    }

}
