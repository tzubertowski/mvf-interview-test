<?php

trait DataProvidersTrait
{
    public function provideInvalidInput()
    {
        return [
            [
                [],
                [
                    "type" => [
                        "The type field is required."
                    ],
                    "userName" => [
                        "The user name field is required."
                    ],
                ],
            ],
            [
                ['type' => 'wrong',],
                [
                    "type" => [
                        "The selected type is invalid."
                    ],
                ]
            ],

            [
                ['userName' => 'foo',],
                [
                    "type" => [
                        "The type field is required."
                    ],
                ]
            ],
        ];
    }
}