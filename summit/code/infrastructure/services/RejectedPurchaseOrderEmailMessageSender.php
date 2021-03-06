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

class RejectedPurchaseOrderEmailMessageSender implements IMessageSenderService {

    /**
     * @param IEntity $subject
     * @throws InvalidArgumentException
     */
    public function send(IEntity $subject)
    {
        if(is_null($subject)) throw new InvalidArgumentException('$subject cant be null');

        $email = EmailFactory::getInstance()->buildEmail(REJECTED_PURCHASE_ORDER_EMAIL_FROM,
            $subject->getEmail(),
            REJECTED_PURCHASE_ORDER_EMAIL_SUBJECT);

        $email->setTemplate('RejectedSummitSponsorshipPackagePurchaseOrderEmail');


        $email->populateTemplate(array(
            'RecipientFullName' => $subject->getFullName(),
            'PackageName'       => $subject->package()->getName(),
            'SummitName'        => $subject->package()->getSummitName()
        ));

        $email->send();
    }
}