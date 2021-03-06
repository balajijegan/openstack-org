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

final class SapphireSpeakerRegistrationRequestFactory
    implements ISpeakerRegistrationRequestFactory {

    /**
     * @var ISpeakerRegistrationRequestRepository
     */
    private $repository;

    /**
     * @param ISpeakerRegistrationRequestRepository $repository
     */
    public function __construct(ISpeakerRegistrationRequestRepository $repository){
        $this->repository = $repository;
    }

    /**
     * @param IPresentationSpeaker $speaker
     * @param string $email
     * @return ISpeakerRegistrationRequest
     */
    public function build(IPresentationSpeaker $speaker, $email)
    {
        $request              = new SpeakerRegistrationRequest;
        $request->Email       = $email;
        $request->IsConfirmed = false;
        $request->SpeakerID   = $speaker->getIdentifier();
        $request->ProposerID  = Member::currentUserID();

        $already_exists = false;
        do {
            $token          = $request->generateConfirmationToken();
            $already_exists = $this->repository->existsConfirmationToken($token);
        } while($already_exists);

        return $request;
    }
}