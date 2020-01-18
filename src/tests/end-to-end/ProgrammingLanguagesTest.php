<?php

class ProgrammingLanguagesTest extends TestCase
{
    public function testProgrammingLanguagesIsCallable()
    {
        $this->get('programming-languages');
        $this->seeStatusCode(200);
        $this->seeJson(['data' => 'pong']);
    }

}