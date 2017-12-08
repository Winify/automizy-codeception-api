<?php
/**
 * Created by PhpStorm.
 * User: winnie
 * Date: 2017. 12. 08.
 * Time: 11:31
 */

class NewsletterCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldCreateNewsletter(ApiTester $I)
    {
        $I->sendPOST('/newsletters', [
                'maxWidth' => 800,
                'tags' => [
                    'test',
                    'bananas'
                ],
                'attachments' => [10],
                'name' => 'My first test newsletter',
                'subject' => 'Free Bananas',
                'htmlCode' => '<html><head></head><body><b>TEST</b></body></html>'
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllNewsletters(ApiTester $I)
    {
        $I->sendGET('/newsletters');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenNewsletter(ApiTester $I)
    {
        $I->sendGET('/newsletters/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldRemoveNewsletter(ApiTester $I)
    {
        $I->sendDELETE('/newsletters/2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldUpdateGivenNewsletter(ApiTester $I)
    {
        $I->sendPATCH('/newsletters/1', [
                'tags' => [
                    'updated',
                    'bananas'
                ]
            ]
        );
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}