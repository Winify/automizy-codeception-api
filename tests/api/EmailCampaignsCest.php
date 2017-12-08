<?php
/**
 *CreatedbyPhpStorm
 *User:winnie
 *Date:20171208
 *Time:11:31
 */

class EmailCampaignsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldGetGivenEmailCampaign(ApiTester $I)
    {
        $I->sendGET('/campaigns/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllEmailCampaigns(ApiTester $I)
    {
        $I->sendGET('/campaigns');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldCreateNewEmailCampaign(ApiTester $I)
    {
        $I->sendPOST('/campaigns', [
                'newsletter' => 3,
                'sendFromName' => 'Automizy',
                'sendFromEmail' => 'noreply@automizy.com',
                'sendTime' => '2015-07-07 10:00:00',
                'replyToEmail' => 'noreply@automizy.com',
                'notificationEmail' => 'notifications@automizy.com',
                'segments' => [1, 2],
                'embedImages' => true,
                'name' => 'My E-mail Campaign'
            ]
        );
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldUpdateGivenEmailCampaign(ApiTester $I)
    {
        $I->sendPATCH('/campaigns/1', [
                'newsletter' => 3,
                'sendFromName' => 'Automizy',
                'sendFromEmail' => 'noreply@automizy.com',
                'sendTime' => '2015-07-07 10:00:00',
                'replyToEmail' => 'noreply@automizy.com',
                'notificationEmail' => 'notifications@automizy.com',
                'segments' => [1],
                'embedImages' => true,
                'name' => 'My E-mail Campaign'
            ]
        );
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignLinks(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/links');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignRecipients(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/recipients');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignOpenStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/opens');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignClickStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/clicks');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignShareStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/shares');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignUnsubscribeStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/unsubscribes');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignBounceStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/bounces');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignGeoStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/geo-locations');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignHeatMapStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/1/heat-map');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignCombinedStatistics(ApiTester $I)
    {
        $I->sendPOST('/campaigns/1/combined', [
                'open' => [
                    'type' => 'open',
                    'format' => 'total',
                    'from' => '2015.11.01',
                    'to' => '2015.11.10'
                ],
                'deviceOpenPie' => [
                    'type' => 'open',
                    'format' => 'aggregate',
                    'groupBy' => 'device',
                    'from' => '2015.11.01',
                    'to' => '2015.11.10'
                ],
                'geoChart' => [
                    'type' => 'geo - location',
                    'format' => 'raw',
                    'from' => '2015.11.01',
                    'to' => '2015.11.10'
                ]
            ]
        );
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignGlobalOpenStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/globalStatistics/open');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignGlobalClickStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/globalStatistics/click');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignGlobalUnsubscribeStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/globalStatistics/unsubscribe');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenCampaignGlobalBounceStatistics(ApiTester $I)
    {
        $I->sendGET('/campaigns/globalStatistics/bounce');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

}