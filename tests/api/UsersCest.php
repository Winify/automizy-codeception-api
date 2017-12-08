<?php
/**
 * Created by PhpStorm.
 * User: winnie
 * Date: 2017. 12. 08.
 * Time: 11:32
 */

class UsersCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldGetAllUsers(ApiTester $I)
    {

        $I->sendGET('/users');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllCurrentUsers(ApiTester $I)
    {

        $I->sendGET('/users/current');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenUsers(ApiTester $I)
    {

        $I->sendGET('/users/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllCurrentUsersInSupportedTimezones(ApiTester $I)
    {

        $I->sendGET('/users/supported-time-zones');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}