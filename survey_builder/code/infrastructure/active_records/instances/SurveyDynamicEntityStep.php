<?php
/**
 * Copyright 2015 OpenStack Foundation
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
 * Class SurveyDynamicEntityStep
 */
class SurveyDynamicEntityStep
    extends SurveyStep
    implements ISurveyDynamicEntityStep {

    static $db = array(
    );

    static $indexes = array(
    );

    static $has_one = array(
        'Template' => 'SurveyDynamicEntityStepTemplate',
    );

    static $many_many = array(
    );

    static $has_many = array(
        'EntitySurveys' => 'EntitySurvey',
    );

    private static $defaults = array(
    );

    /**
     * @return ISurveyAnswer[]
     * @throws AbstractMethodException
     */
    public function getAnswers()
    {
       throw new AbstractMethodException('getAnswers');
    }

    /**
     * @return ISurveyDynamicEntityStepTemplate
     */
    public function template(){
        return AssociationFactory::getInstance()->getMany2OneAssociation($this, 'Template')->getTarget();
    }

    /**
     * @return IEntitySurvey[]
     */
    public function getEntitySurveys()
    {
        return AssociationFactory::getInstance()->getOne2ManyAssociation($this, 'EntitySurveys')->toArray();
    }

    /**
     * @param IEntitySurvey $entity_survey
     * @return void
     */
    public function addEntitySurvey(IEntitySurvey $entity_survey)
    {
        AssociationFactory::getInstance()->getOne2ManyAssociation($this, 'EntitySurveys')->add($entity_survey);
    }
}