<?php
/**
 * Created by PhpStorm.
 * User: winnie
 * Date: 2017. 12. 08.
 * Time: 11:32
 */

class JobsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldGetAllJobs(ApiTester $I)
    {

        $I->sendGET('/jobs');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenJob(ApiTester $I)
    {
        $I->sendGET('/jobs/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}