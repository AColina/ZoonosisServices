<?php

require_once '/PDOManager.php';
require_once '/EntityImport.php';

/**
 * @author Gustavo Gonzalez
 * @author Angel Colina
 */
class QueryBuilder {

    /**
     *
     * @var string
     */
    private $query;

    /**
     *
     * @var array
     */
    private $parametros = array();

    /**
     *
     * @var integer
     */
    private $contador = 1;

    /**
     *
     * @var string
     */
    private $sentenciaFinal;

    /**
     * 
     * @param string $query
     * @param string $sentenciaFinal
     */
    public function __construct($query, $sentenciaFinal = "") {
        $this->query = $query;
        $this->sentenciaFinal = $sentenciaFinal;
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
        if ($omitirNulo == true && $valor == null) {
            return $this;
        }
        $this->parametros = array_merge($this->parametros, array("p" . $c => $valor));

        $this->query .= $isWhere . $mandatory . " $campo $condicion :p$c";

        return $this;
    }

    public function ejecutarQuery($numeroResultados = 1, $posicionInicial = -1) {
        $pdo = new PDOManager();
        $this->query = $this->query . " " . $this->sentenciaFinal;
//        echo $this->query;
        $valores = $pdo->ejecutarQuery($this->query, count($this->parametros) > 0 ? $this->parametros : null, $numeroResultados, $posicionInicial);
        if ($numeroResultados == 1 && is_array($valores)) {
            return $valores[1];
        }
        return $valores;
    }

}
