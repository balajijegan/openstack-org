<?php
/**
 * Copyright 2014 Openstack Foundation
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
 * Class SummitTypeFactory
 */
final class SummitTypeFactory
	implements ISummitTypeFactory {

	/**
     * @param int $summit_id
	 * @param array $data
	 * @return ISummitType
	 */
	public function buildSummitType(array $data, $summit_id)
	{
		$summit_type = new SummitType();
        $summit_type->setTitle(trim($data['title']));
        $summit_type->setDescription(trim($data['description']));
        $summit_type->setAudience(trim($data['audience']));
        $summit_type->setStartDate(trim($data['start_date']));
        $summit_type->setEndDate(trim($data['end_date']));
        $summit_type->setSummitId(trim($summit_id));

		return $summit_type;
	}

}