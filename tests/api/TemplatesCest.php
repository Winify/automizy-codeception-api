<?php
/**
 * Created by PhpStorm.
 * User: winnie
 * Date: 2017. 12. 08.
 * Time: 11:32
 */

class TemplatesCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldCreateTemplate(ApiTester $I)
    {
        $I->sendPOST('/templates', [
                'name' => 'My first test template',
                'htmlCode' => '<html><head></head><body><b>TEST</b></body></html>'
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllTemplates(ApiTester $I)
    {
        $I->sendGET('/templates');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenTemplate(ApiTester $I)
    {
        $I->sendGET('/templates/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldRemoveTemplate(ApiTester $I)
    {
        $I->sendDELETE('/templates/2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldUpdateGivenTemplate(ApiTester $I)
    {
        $I->sendPATCH('/templates/1', [
                'name' => 'Updated template'
            ]
        );
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}