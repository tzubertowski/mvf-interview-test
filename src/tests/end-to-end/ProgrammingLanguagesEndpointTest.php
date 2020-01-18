<?php

use VCR\VCR;

class ProgrammingLanguagesEndpointTest extends TestCase
{
    use DataProvidersTrait;

    /**
     * @dataProvider provideInvalidInput
     * @param array $requestData
     * @param mixed $expectedJson
     */
    public function testThrowsValidationException(array $requestData, $expectedJson)
    {
        $this->get(
            'programming-languages?' . http_build_query($requestData)
        );
        $this->seeStatusCode(422);
        $this->seeJsonContains($expectedJson);
    }

    public function testGetsFavouriteLanguagesForValidUsername()
    {
        VCR::turnOn();
        VCR::insertCassette('github');

        $data = [
            'type' => 'favourite',
            'userName' => 'foo'
        ];
        $this->get(
            'programming-languages?' . http_build_query($data)
        );
        $this->seeStatusCode(200);
        $this->seeJson([
            "C" => 1,
            "C++" => 2,
            "HTML" => 2,
            "Haskell" => 1,
            "OCaml" => 1,
        ]);

        VCR::eject();
        VCR::turnOff();
    }

}