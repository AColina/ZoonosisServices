<?php

require_once '/PDOManager.php';
require_once '/EntityImport.php';

/**
 * @author Gustavo Gonzalez
 * @author Angel Colina
 */
class QueryBuilder {

    private $query;
    private $parametros = array();
    private $contador = 1;

    /**
     * QueryBuilder constructor.
     * @param $query
     */
    public function __construct($query) {
        $this->query = $query;
    }

    public function agregarQuery($query) {
        $this->query = $query;
        $this->parametros = array();
        $this->contador = 1;
        return $this;
    }

    public function agregarCondicion($campo, $condicion, $valor, $omitirNulo = true, $obligatorio = true) {
        $isWhere = "";
        $mandatory = "";
        $c = $this->contador++;

        if (strpos($this->query, "WHERE") == false) {
            $isWhere = " WHERE ";
        } else {
            $mandatory = $obligatorio ? " AND " : " OR ";
        }

        $this->parametros = array_merge($this->parametros, array("p" . $c => $valor));

        if ($omitirNulo == true && $valor == null) {
            return $this;
        }

        $this->query .= $isWhere . $mandatory . " $campo $condicion :p$c";

        return $this;
    }

    public function ejecutarQuery($numeroResultados = 1, $posicionInicial = -1) {
        $pdo = new PDOManager();
        return $pdo->ejecutarQuery($this->query, $this->parametros, $numeroResultados, $posicionInicial);
    }

}
