<?php

class SpeakerForm extends BootstrapForm
{

    public function __construct($controller, $name, $actions) {
        parent::__construct(
            $controller, 
            $name, 
            $this->getSpeakerFields(),
            $actions,
            $this->getSpeakerValidator()
        );
    }


    protected function getSpeakerFields() {
        return FieldList::create()
            ->text('FirstName',"Speaker's first name")
                ->configure()
                    ->setAttribute('autofocus','TRUE')
                ->end()            
            ->text('LastName', "Speaker's last name")
            ->text('Title', "Speaker's title")
            ->tinyMCEEditor('Bio',"Speaker's Bio")
                ->configure()
                    ->setRows(25)
                ->end()
            ->text('IRCHandle','IRC Handle (optional)')
             ->configure()
                ->setMaxLength(25)
            ->end()
            ->text('TwitterHandle','Twitter Handle (optional)')
            ->configure()
                ->setMaxLength(50)
            ->end()
            ->fileAttachment('Photo','Upload a speaker photo')
                ->configure()
                    ->setPermission('delete', false)
                    ->setAcceptedFiles(array('png','gif','.jpeg','.jpg'))
                    ->setView('grid')
                    // ->setThumbnailWidth(100)
                    // ->setThumbnailHeight(100)
                    ->setMaxFilesize(1)
                ->end()
            ->bootstrapIgnore('Photo')
            ->literal('RecordingAndPublishingLegalAgreement','Speakers agree that OpenStack Foundation may record and publish their talks presented during the October 2015 OpenStack Summit. If you submit a proposal on behalf of a speaker, you represent to OpenStack Foundation that you have the authority to submit the proposal on the speaker’s behalf and agree to the recording and publication of their presentation.')
            ;
    }


    public function getSpeakerValidator() {
        return RequiredFields::create('FirstName','LastName','Title','RecordingAndPublishingLegalAgreement');
    }

}