<?php
/**
 *CreatedbyPhpStorm.
 *User:winnie
 *Date:2017.12.08.
 *Time:11:32
 */

class WebhooksCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldCreateWebhook(ApiTester $I)
    {
        $I->sendPOST('/webhooks', [
                'type' => 'CLICK',
                'url' => 'https://automizy.com'
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllWebhooks(ApiTester $I)
    {
        $I->sendGET('/webhooks');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenWebhook(ApiTester $I)
    {
        $I->sendGET('/webhooks/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldRemoveGivenWebhook(ApiTester $I)
    {
        $I->sendDELETE('/webhooks/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldUpdateGivenWebhook(ApiTester $I)
    {
        $I->sendPATCH('/webhooks/2', [
            'type' => 'BOUNCE',
            'url' => 'https://automizy.com'
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}