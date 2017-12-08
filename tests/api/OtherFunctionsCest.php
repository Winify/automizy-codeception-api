<?php
/**
 * Created by PhpStorm.
 * User: winnie
 * Date: 2017. 12. 08.
 * Time: 11:33
 */

class OtherFunctionsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldGetLoggedInAccount(ApiTester $I)
    {

        $I->sendGET('/account');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetUnsubscribedForm(ApiTester $I)
    {

        $I->sendGET('/custom-html/unsubscribe');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetContactImports(ApiTester $I)
    {

        $I->sendGET('/contact-imports');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}