<?php
/**
 *CreatedbyPhpStorm.
 *User:winnie
 *Date:2017.12.08.
 *Time:11:30
 */

class SegmentsCest
{
    public function _before(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Authorization', 'Bearer 4f0101890c03d3bf5ffb88cc724a2782f235b873');
    }

    public function shouldGetSegmentCalculation(ApiTester $I)
    {
        $I->sendGET('/segments/1/calculate');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldCreateSegment(ApiTester $I)
    {
        $I->sendPOST('/segments', [
                'name' => 'New Segment' . date(new DateTime('now')),
                'conditions' => [
                    [
                        [
                            'type' => 'EMAIL',
                            'relation' => 'IN',
                            'value' => '@gmail.'
                        ],
                        [
                            'type' => 'CUSTOM_FIELD',
                            'relation' => 'EQ',
                            'value' => 'payed',
                            'customField' => 13
                        ]
                    ],
                    [
                        [
                            'type' => 'CONTACT_TAG',
                            'relation' => 'IN',
                            'value' => 'test_tag'
                        ],
                        [
                            'type' => 'LEAD_SCORE',
                            'relation' => 'GT',
                            'value' => 1000
                        ]
                    ]
                ]
            ]
        );
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }

    public function shouldGetAllSegments(ApiTester $I)
    {
        $I->sendGET('/segments');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldGetGivenSegment(ApiTester $I)
    {
        $I->sendGET('/segments/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldRemoveSegment(ApiTester $I)
    {
        $I->sendDELETE('/segments/2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }

    public function shouldUpdateGivenSegment(ApiTester $I)
    {
        $I->sendPATCH('/segments/1', [
                'name' => 'Updated' . date(new DateTime('now')),
                'conditions' => [
                    [
                        [
                            'type' => 'EMAIL',
                            'relation' => 'IN',
                            'value' => '@gmail.'
                        ],
                        [
                            'type' => 'CUSTOM_FIELD',
                            'relation' => 'EQ',
                            'value' => 'payed',
                            'customField' => 13
                        ]
                    ],
                    [
                        [
                            'type' => 'CONTACT_TAG',
                            'relation' => 'IN',
                            'value' => 'test_tag'
                        ],
                        [
                            'type' => 'LEAD_SCORE',
                            'relation' => 'GT',
                            'value' => 1000
                        ]
                    ]
                ]
            ]
        );
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}