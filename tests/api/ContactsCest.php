<?php

class ContactsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldCreateNewContact(ApiTester $I)
    {

        $I->sendPOST('/contacts', [
                'email' => 'testuser@example.com',
                'status' => 'ACTIVE'
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllContacts(ApiTester $I)
    {
        $I->sendGET('/contacts');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenContact(ApiTester $I)
    {
        $I->sendGET('/contacts/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldRemoveGivenContact(ApiTester $I)
    {
        $I->sendDELETE('/contacts/16');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}