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

namespace Doctrine\Custom;

require_once '/../ORM/NativeQuery.php';
require_once '/../ORM/Internal/Hydration/SingleScalarHydrator.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Doctrine\ORM\Query;

class CustomGenerator extends AbstractIdGenerator {

    static $cache = array();

    public function generate(EntityManager $em, $entity) {
//        $id = $em->createNativeQuery(
//                        'SELECT crmid FROM vtiger_crmentity_seq WHERE used = 0 LIMIT 1', new Query\ResultSetMapping()
//                )->getResult(Query::HYDRATE_SINGLE_SCALAR);
//        $em->getConnection()->executeUpdate(
//                'UPDATE vtiger_crmentity_seq SET used = 1 WHERE crmid = ?', array($id)
//        );
$query="SELECT * FROM information_schema.tables "
                        . "WHERE table_name='" . get_class($entity) . "' LIMIT 1";
                echo $query."<br>";
        $id = $em->createNativeQuery($query, new Query\ResultSetMapping())->getResult();
     
        var_dump($id);
        return $id;
    }

}
