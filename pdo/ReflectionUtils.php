<?php

/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 07:03 PM
 */
class ReflectionUtils {

    /**
     * @param class $class
     * @return array
     */
    public function getProperty($class) {
        $reflect = new ReflectionClass($class);
        return $reflect->getDefaultProperties();
    }

    /**
     * @param $object
     * @param $nombre
     * @return mixed
     */
    public function getValor($object, $nombre) {
        $reflect = new ReflectionClass($object);
        $methods = $reflect->getMethods();
        foreach ($methods as $method) {
            if (strtolower($method->getName()) == "get" . strtolower($nombre)) {
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object);
            }
        }
        return null;
    }

    /**
     * @param $object
     * @param $nombre
     * @param $value
     * @return mixed
     */
    public function setValor($object, $nombre, $value) {
        $reflect = new ReflectionClass($object);
        $methods = $reflect->getMethods();
        foreach ($methods as $method) {
            if (strtolower($method->getName()) == "set" . strtolower($nombre)) {
                $metodoReflexionado = new ReflectionMethod($reflect->getName(), $method->getName());
                return $metodoReflexionado->invoke($object, $value);
            }
        }
        return null;
    }

    /**
     * @param type $object
     * @return type
     */
    public function getArray($object) {
        $fields = $this->getProperty($object);
        $array = Array();
        foreach ($fields as $key => $value) {
            $array = array_merge($array, array($key => $this->getValor($object, $key)));
        }
        return $array;
    }

    /**
     * @param type $object
     * @param type $array
     * @return type
     */
    public function setArray($object, $array) {
        foreach ($array as $key => $value) {
            $this->setValor($object, $key, $value);
        }
        return $object;
    }

   

    public function containsAnnotation($property, $annotation) {
        return (strpos($property->getDocComment(), $annotation) !== false);
    }

    

    /**
     *
     */
    public function newObject($class, $parametros, $excluirField = array()) {
        $reflexion = new ReflectionClass($class);
        $AM = new AnnotationManager();
        $instance = $reflexion->newInstanceWithoutConstructor();
        $param = $this->getProperty($instance);

        foreach ($param as $field => $value) {
            if (in_array($field, $excluirField)) {
                continue;
            }
            if (isset($parametros[$field])) {
                if ($this->containsAnnotation($reflexion->getProperty($field), '@ManyToOne')) {
                    $ManyToOne = $AM->getManyToOn($class, $field);
                    if (isset($ManyToOne["entity"])) {
                        $ref = new ReflectionClass($ManyToOne["entity"]);
                        // $ins = $ref->newInstanceWithoutConstructor();
                        $r = $this->crearQuery("SELECT * FROM " . $ref->getName() . " WHERE id=:id", array("id" => ceil($parametros[$field])));
                        //insert result in $int
                        $this->setValor($instance, $field, $r);
                    }
                } else if ($this->containsAnnotation($reflexion->getProperty($field), '@OneToOne')) {
                    $OneToOne = $AM->getOneToOne($class, $field);
                    if (isset($OneToOne["entity"]) && !isset($OneToOne['mappedBy'])) {
                        $ref = new ReflectionClass($OneToOne["entity"]);
                        $r = $this->crearQuery("SELECT * FROM " . $ref->getName() . " WHERE id=:id", array("id" => ceil($parametros[$field])));
                        $this->setValor($instance, $field, $r[0]);
                    }
                } else {
                    $this->setValor($instance, $field, $parametros[$field]);
                }
            } else {
                if ($this->containsAnnotation($reflexion->getProperty($field), '@OneToMany')) {
                    $OneToMany = $AM->getOneToMany($class, $field);
                    if (isset($OneToMany["entity"])) {
                        $ref = new ReflectionClass($OneToMany["entity"]);

                        $r = $this->crearQuery("SELECT e.* FROM " . $ref->getName() . " e "
                                . "INNER JOIN $class c on c.id= e." . $OneToMany["mappedBy"] . " "
                                . "WHERE c.id=:id", array("id" => ceil($parametros['id'])), -1, 0, array($OneToMany["mappedBy"]));
                        foreach ($r as $instances) {
                            $this->setValor($instances, $OneToMany["mappedBy"], $instance);
                        }
                        $this->setValor($instance, $field, $r);
                    }
                }
            }
        }
        return $instance;
    }

}
