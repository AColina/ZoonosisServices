<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '/../Doctrine/Common/Persistence/ObjectManager.php';
require_once '/../Doctrine/DBAL/Configuration.php';
require_once '/../Doctrine/ORM/Configuration.php';
require_once '/../Doctrine/ORM/Tools/Setup.php';
require_once '/../Doctrine/ORM/Proxy/ProxyFactory.php';
require_once '/../Doctrine/Common/Lexer.php';
require_once '/../Doctrine/Common/Annotations/Reader.php';
require_once '/../Doctrine/Common/EventManager.php';
require_once '/../Doctrine/Common/PropertyChangedListener.php';
require_once '/../Doctrine/DBAL/DriverManager.php';
require_once '/../Doctrine/DBAL/DBALException.php';
require_once '/../Doctrine/Common/Persistence/Mapping/Driver/MappingDriver.php';
require_once '/../Doctrine/DBAL/Driver/Connection.php';
require_once '/../Doctrine/Common/Persistence/Mapping/ClassMetadataFactory.php';
require_once '/../Doctrine/Common/Persistence/Mapping/AbstractClassMetadataFactory.php';
require_once '/../Doctrine/Common/Persistence/Mapping/ClassMetadata.php';
require_once '/../Doctrine/ORM/ORMException.php';
require_once '/../Doctrine/ORM/Mapping/MappingException.php';
require_once '/../Doctrine/ORM/Mapping/ClassMetadataFactory.php';
require_once '/../Doctrine/ORM/Mapping/NamingStrategy.php';
require_once '/../Doctrine/ORM/Mapping/DefaultNamingStrategy.php';
require_once '/../Doctrine/ORM/Mapping/ClassMetadataInfo.php';
require_once '/../Doctrine/ORM/Mapping/ClassMetadata.php';
require_once '/../Doctrine/DBAL/Query/Expression/ExpressionBuilder.php';
require_once '/../Doctrine/ORM/Query/QueryException.php';
require_once '/../Doctrine/DBAL/SQLParserUtils.php';
require_once '/../Doctrine/DBAL/Connection.php';
require_once '/../Doctrine/DBAL/Driver.php';
require_once '/../Doctrine/DBAL/Exception/DriverException.php';
require_once '/../Doctrine/DBAL/Exception/ServerException.php';
require_once '/../Doctrine/DBAL/Exception/InvalidFieldNameException.php';
require_once '/../Doctrine/DBAL/VersionAwarePlatformDriver.php';
require_once '/../Doctrine/DBAL/Driver/ExceptionConverterDriver.php';
require_once '/../Doctrine/DBAL/Driver/AbstractMySQLDriver.php';
require_once '/../Doctrine/DBAL/Driver/PDOMySql/Driver.php';
require_once '/../Doctrine/Common/Persistence/Mapping/Driver/AnnotationDriver.php';
require_once '/../Doctrine/ORM/Mapping/Driver/AnnotationDriver.php';
require_once '/../Doctrine/ORM/Mapping/QuoteStrategy.php';
require_once '/../Doctrine/ORM/Mapping/DefaultQuoteStrategy.php';
require_once '/../Doctrine/ORM/Mapping/Annotation.php';
require_once '/../Doctrine/ORM/Query/FilterCollection.php';
require_once '/../Doctrine/ORM/Query/ResultSetMapping.php';
require_once '/../Doctrine/ORM/Query/Parser.php';
require_once '/../Doctrine/ORM/Query/ParserResult.php';
require_once '/../Doctrine/ORM/Query/AST/Node.php';
require_once '/../Doctrine/ORM/Query/AST/SelectExpression.php';
require_once '/../Doctrine/ORM/Query/AST/SelectClause.php';
require_once '/../Doctrine/ORM/Query/AST/RangeVariableDeclaration.php';
require_once '/../Doctrine/ORM/Query/AST/IdentificationVariableDeclaration.php';
require_once '/../Doctrine/ORM/Query/AST/FromClause.php';
require_once '/../Doctrine/ORM/Query/AST/SelectStatement.php';
require_once '/../Doctrine/ORM/Query/AST/WhereClause.php';
require_once '/../Doctrine/ORM/Query/AST/ConditionalPrimary.php';
require_once '/../Doctrine/ORM/Query/AST/ArithmeticExpression.php';
require_once '/../Doctrine/ORM/Query/AST/PathExpression.php';
require_once '/../Doctrine/ORM/Query/AST/InputParameter.php';
require_once '/../Doctrine/ORM/Query/AST/ComparisonExpression.php';
require_once '/../Doctrine/ORM/Query/AST/AggregateExpression.php';
require_once '/../Doctrine/ORM/Query/AST/OrderByItem.php';
require_once '/../Doctrine/ORM/Query/AST/OrderByClause.php';
require_once '/../Doctrine/ORM/Query/AST/Literal.php';
require_once '/../Doctrine/ORM/Query/AST/Join.php';
require_once '/../Doctrine/ORM/Query/AST/JoinAssociationPathExpression.php';
require_once '/../Doctrine/ORM/Query/AST/JoinAssociationDeclaration.php';
require_once '/../Doctrine/ORM/Query/AST/LikeExpression.php';
require_once '/../Doctrine/ORM/Query/AST/NullComparisonExpression.php';
require_once '/../Doctrine/ORM/Query/AST/ConditionalTerm.php';
require_once '/../Doctrine/ORM/Query/AST/Functions/FunctionNode.php';
require_once '/../Doctrine/ORM/Query/AST/Functions/LowerFunction.php';
require_once '/../Doctrine/ORM/Query/Lexer.php';
require_once '/../Doctrine/ORM/Query/TreeWalker.php';
require_once '/../Doctrine/ORM/Query/SqlWalker.php';
require_once '/../Doctrine/ORM/Query/Exec/AbstractSqlExecutor.php';
require_once '/../Doctrine/ORM/Query/Exec/SingleSelectExecutor.php';
require_once '/../Doctrine/Common/Annotations/CachedReader.php';
require_once '/../Doctrine/Common/Annotations/Annotation/Target.php';
require_once '/../Doctrine/Common/Annotations/DocLexer.php';
require_once '/../Doctrine/Common/Annotations/DocParser.php';
require_once '/../Doctrine/Common/Annotations/SimpleAnnotationReader.php';
require_once '/../Doctrine/Common/Annotations/AnnotationRegistry.php';
require_once '/../Doctrine/Common/Annotations/TokenParser.php';
require_once '/../Doctrine/Common/Annotations/AnnotationException.php';
require_once '/../Doctrine/Common/Cache/Cache.php';
require_once '/../Doctrine/Common/Cache/CacheProvider.php';
require_once '/../Doctrine/Common/Cache/ArrayCache.php';
require_once '/../Doctrine/Common/Collections/Expr/Expression.php';
require_once '/../Doctrine/Common/Collections/Selectable.php';
require_once '/../Doctrine/Common/Collections/Collection.php';
require_once '/../Doctrine/Common/Collections/ArrayCollection.php';
require_once '/../Doctrine/Common/Collections/Expr/Comparison.php';
require_once '/../Doctrine/ORM/Internal/Hydration/AbstractHydrator.php';
require_once '/../Doctrine/ORM/Internal/Hydration/SimpleObjectHydrator.php';
require_once '/../Doctrine/ORM/Internal/Hydration/ObjectHydrator.php';
require_once '/../Doctrine/ORM/AbstractQuery.php';
require_once '/../Doctrine/ORM/Query.php';
require_once '/../Doctrine/ORM/UnitOfWork.php';
require_once '/../Doctrine/ORM/EntityManager.php';
require_once '/../Doctrine/ORM/ORMException.php';
require_once '/../Doctrine/ORM/Events.php';
require_once '/../Doctrine/ORM/Persisters/BasicEntityPersister.php';
require_once '/../Doctrine/DBAL/LockMode.php';
require_once '/../Doctrine/DBAL/Events.php';
require_once '/../Doctrine/DBAL/Types/Type.php';
require_once '/../Doctrine/DBAL/Types/StringType.php';
require_once '/../Doctrine/DBAL/Types/TextType.php';
require_once '/../Doctrine/DBAL/Types/DateType.php';
require_once '/../Doctrine/DBAL/Types/IntegerType.php';
require_once '/../Doctrine/DBAL/Exception/DriverException.php';
require_once '/../Doctrine/DBAL/Driver/DriverException.php';
require_once '/../Doctrine/DBAL/Driver/PDOException.php';
require_once '/../Doctrine/DBAL/Driver/ResultStatement.php';
require_once '/../Doctrine/DBAL/Driver/Statement.php';
require_once '/../Doctrine/DBAL/Driver/PDOStatement.php';
require_once '/../Doctrine/DBAL/Platforms/AbstractPlatform.php';
require_once '/../Doctrine/DBAL/Platforms/MySqlPlatform.php';
require_once '/../Doctrine/DBAL/Driver/ServerInfoAwareConnection.php';
require_once '/../Doctrine/DBAL/Driver/PDOConnection.php';
require_once '/../Doctrine/ORM/Id/AbstractIdGenerator.php';
require_once '/../Doctrine/ORM/Id/AssignedGenerator.php';
require_once '/../Doctrine/ORM/Id/IdentityGenerator.php';
require_once '/../Doctrine/Common/Util/ClassUtils.php';
require_once '/../Doctrine/Common/ClassLoader.php';
require_once '/../Doctrine/Common/Persistence/Proxy.php';
require_once '/../Doctrine/ORM/Proxy/Proxy.php';
require_once '/../Doctrine/ORM/Query/Parameter.php';
require_once '/../Doctrine/ORM/Query/ParameterTypeInferer.php';
require_once '/../Doctrine/ORM/PersistentCollection.php';
require_once '/../Doctrine/ORM/ORMInvalidArgumentException.php';
require_once '/../Doctrine/Common/Persistence/Mapping/ReflectionService.php';
require_once '/../Doctrine/Common/Persistence/Mapping/RuntimeReflectionService.php';
require_once '/../Doctrine/Instantiator/InstantiatorInterface.php';
require_once '/../Doctrine/Instantiator/Instantiator.php';
require_once '/../Doctrine/ORM/Mapping/MappedSuperclass.php';
require_once '/../Doctrine/ORM/Mapping/Id.php';
require_once '/../Doctrine/ORM/Mapping/Column.php';
require_once '/../Doctrine/ORM/Mapping/GeneratedValue.php';
require_once '/../Doctrine/ORM/Mapping/Entity.php';
require_once '/../Doctrine/ORM/Mapping/ManyToOne.php';
require_once '/../Doctrine/ORM/Mapping/JoinColumn.php';
require_once '/../Doctrine/ORM/Mapping/OneToMany.php';
require_once '/../Doctrine/ORM/Internal/CommitOrderCalculator.php';
require_once '/../Doctrine/ORM/Id/SequenceGenerator.php';
require_once '/../Doctrine/DBAL/Statement.php';
require_once '/../Doctrine/DBAL/Exception/ConstraintViolationException.php';
require_once '/../Doctrine/DBAL/Exception/NotNullConstraintViolationException.php';
require_once '/Serializor.php';

use \Doctrine\ORM\EntityManager;

/**
 * Description of PDOManager
 *
 * @author Angel Colina
 */
class PDOManager {

    //Datos de base de datos
    const host = "localhost";
    const user = "root";
    const pass = "";
    const db = "zoonosis";
    const driver = "pdo_mysql";

    //datos de doctrine
    /**
     *
     * @var EntityManager
     */
    private $entityManager;
    private $ultimoQuery;

    public function __construct() {
        $this->entityManager = NULL;
    }

    public static function inicializarEntityManager() {
        try {
            $paths = array($path = array(__DIR__ . '/entidades'));

            $config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, true);

            $connectionOptions = array(
                'driver' => PDOManager::driver,
                'hostname' => PDOManager::host,
                'dbname' => PDOManager::db,
                'user' => PDOManager::user,
                'charset' => 'UTF8',
                'password' => PDOManager::pass
            );

            return Doctrine\ORM\EntityManager::create($connectionOptions, $config);
        } catch (Doctrine\ORM\ORMException $ex) {
            die($ex->getMessage());
        }
        return NULL;
    }

    public function iniciarTransaccion() {
        if ($this->entityManager == null) {
            $this->entityManager = $this->inicializarEntityManager();
            $this->entityManager->beginTransaction();
        }
    }

    public function finalizarTransaccion($commit) {
        if ($commit) {
            $this->entityManager->flush();
            $this->entityManager->commit();
        } else {
            $this->entityManager->rollback();
        }

        $this->entityManager->close();
        $this->entityManager = NULL;
    }

    /**
     * 
     * @param class calse
     * @param integer id
     * @return Entidad
     */
    public function obtenerEntidad($clase, $id) {
        $entityManager = PDOManager::inicializarEntityManager();
        $o = $entityManager->find($clase, $id);
        $entityManager->close();
        return $o;
    }

    /**
     * 
     * @param object $entidad
     * @param boolean $usaTransaccion
     * @return boolean
     */
    public function persistirEntidad(Entidad $entidad, $usaTransaccion = FALSE) {
        if ($usaTransaccion) {
            $this->entityManager->persist($entidad);
            $this->entityManager->flush();
            return true;
        } else {
            return $this->operacionCUD($entidad, 'INSERTAR');
        }
    }

    /**
     * 
     * @param object $entidad
     * @param boolean $usaTransaccion
     * @return object
     */
    public function actualizarEntidad(Entidad $entidad, $usaTransaccion = FALSE) {
        if ($usaTransaccion) {
            return $this->entityManager->merge($entidad);
        } else {
            return $this->operacionCUD($entidad, 'ACTUALIZAR');
        }
    }

    /**
     * Elimina un Registro en la Base de Datos
     *
     * @param entidad Instancia de una Entidad de JPA
     * @param idEntidad ID que del Registro
     * @param usaTransaccion
     * @return TRUE si la operación termina Exitosamente
     */
    public function eliminarEntidad($entidad, $usaTransaccion = FALSE) {
        if ($usaTransaccion) {
            $this->entityManager->remove($entidad);
            return true;
        } else {
            return $this->operacionCUD($entidad, 'ELIMINAR');
        }
    }

    public function ejecutarQuery($query, $parametros, $numeroResultados = 1, $posicionInicial = -1) {
        return $this->createQuery($query, $parametros, false, $numeroResultados, $posicionInicial);
    }

    //METODOS PRIVADOS
    private function createQuery($query, $parametros, $esNamedQuery, $numeroResultados, $posicionInicial) {

        $emLocal = PDOManager::inicializarEntityManager();
        $queryEjecutable = NULL;
        if ($esNamedQuery) {
            $queryEjecutable = $emLocal->createNamedQuery($query);
        } else {
            $queryEjecutable = $emLocal->createQuery($query);
        }

        return $this->ejecutarQueryGeneral($queryEjecutable, $emLocal, $parametros, $numeroResultados, $posicionInicial);
    }

    private function ejecutarQueryGeneral($query, $entityManager, $parametros, $numeroResultados, $posicionInicial) {
        if ($parametros != null && count($parametros) > 0) {
            foreach ($parametros as $key => $value) {
                $query->setParameter($key, $value);
            }
        }
        if ($numeroResultados > 0) {
            $query->setMaxResults($numeroResultados);
        }
        if ($posicionInicial > 0) {
            $query->setFirstResult($posicionInicial);
        }
        $this->ultimoQuery = $query->getSql();
        if ($numeroResultados > 1 || $numeroResultados <= 0) {
            return $query->getResult();
        } else {
            require_once '/../Doctrine/ORM/UnexpectedResultException.php';
            require_once '/../Doctrine/ORM/NoResultException.php';
            try {
                return $query->getSingleResult();
            } catch (Doctrine\ORM\NoResultException $ex) {
                return null;
            } finally {
                $entityManager->close();
            }
        }
    }

    private function operacionCUD($entidad, $operaciones) {
        $pdo = new PDOManager();
        try {
            $pdo->iniciarTransaccion();
            $emLocal = $pdo->getEntityManager();
            $rt = true;
            switch ($operaciones) {
                case 'INSERTAR':
                    $emLocal->persist($entidad);
                    $emLocal->flush();
                    break;
                case 'ACTUALIZAR':
                    $rt = $emLocal->merge($entidad);
                    $emLocal->flush();
                    break;
                case 'ELIMINAR':
                    $emLocal->remove($entidad);
                    $emLocal->flush();
                    break;
            }

            $pdo->finalizarTransaccion(true);
            return $rt;
        } catch (\Exception $ex) {
            echo "ERROR AL INTENTAR HACER UNA OPERACION CUD: " . $ex->getMessage() . "<br>";
            return false;
        } finally {
            $emLocal->close();
        }
    }

    //GETTER
    public function getUltimoQuery() {
        return $this->ultimoQuery;
    }

    /**
     * 
     * @return EntityManager
     */
    public function getEntityManager() {
        return $this->entityManager;
    }

}
