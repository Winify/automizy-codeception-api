<?php
/**
 * Created by PhpStorm.
 * User: winnie
 * Date: 2017. 12. 08.
 * Time: 11:32
 */

class SplitTestsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldCreateNewSplitTest(ApiTester $I)
    {
        $I->sendPOST('/split-tests', [
                'name' => 'My first split test',
                'conditionCheckDelay' => [
                    'days' => 1,
                    'hours' => 2,
                    'minutes' => 30
                ],
                'sendTime' => '2015-06-22 14=>00=>00',
                'percentage' => 10,
                'winAction' => 'SEND_REMAINING',
                'winCondition' => 'MOST_LINK_CLICK',
                'segments' => [1, 4, 10],
                'newsletters' => [
                    [
                        'newsletter' => 3,
                        'name' => 'Third campaign',
                        'embedImages' => true,
                        'sendFromEmail' => 'myemail@mymail.com',
                        'replyToEmail' => 'myemail@mymail.com',
                        'sendFromName' => 'John Doe',
                    ],
                    [
                        'newsletter' => 4,
                        'name' => 'Fourth campaign',
                        'embedImages' => false,
                        'sendFromEmail' => 'myemail@mymail.com',
                        'replyToEmail' => 'myemail@mymail.com',
                        'sendFromName' => 'John Doe',
                    ]
                ]
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }
}