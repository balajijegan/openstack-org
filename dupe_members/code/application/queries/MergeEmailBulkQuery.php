<?php
/**
 * Copyright 2015 Openstack Foundation
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/

/**
 * Class MergeEmailBulkQuery
 */
final class MergeEmailBulkQuery extends AbstractMergeBulkQuery {

    private $email;
    /**
     * @return string[]
     */
    public function toSQL()
    {
        return array("UPDATE Member SET Email = '{$this->email}' WHERE ID = {$this->primary_id}; ");
    }

    /**
     * @param array $params
     * @return void
     */
    public function addParams(array $params)
    {
        if(isset($params['primary_id']))
            $this->primary_id  = $params['primary_id'];
        if(isset($params['email']))
            $this->email = $params['email'];
    }
}