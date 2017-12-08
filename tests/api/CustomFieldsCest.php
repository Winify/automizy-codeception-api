<?php
/**
 * Created by PhpStorm.
 * User=> winnie
 * Date=> 2017. 12. 03.
 * Time=> 21=>41
 */

class CustomFieldsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldCreateNewCustomField(ApiTester $I)
    {

        $I->sendPOST('/custom-fields', [
                'name' => 'Test Custom Field API',
                'type' => 'STRING',
                'defaultValue' => 'api testing'
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllCustomFields(ApiTester $I)
    {
        $I->sendGET('/custom-fields');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCustomField(ApiTester $I)
    {
        $I->sendGET('/custom-fields/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldRemoveGivenCustomField(ApiTester $I)
    {
        $I->sendDELETE('/custom-fields/2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}