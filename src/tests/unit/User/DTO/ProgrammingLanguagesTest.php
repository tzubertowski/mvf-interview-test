<?php

use App\User\DTO\ProgrammingLanguages;

class ProgrammingLanguagesTest extends TestCase
{
    public function testCanInstantiateWithEmptyLanguageArray()
    {
        $sut = new ProgrammingLanguages([]);
        $this->assertInstanceOf(ProgrammingLanguages::class, $sut);
    }

    public function testReturnsEmptyStatisticsForNoLanguages()
    {
        $sut = new ProgrammingLanguages([]);
        $this->assertInstanceOf(ProgrammingLanguages::class, $sut);
        $this->assertEmpty($sut->getStatistics());
    }

    public function testCountsSingleOccurence()
    {
        $languages = ['php'];
        $sut = new ProgrammingLanguages($languages);
        $this->assertEquals([
            'php' => 1,
        ], $sut->getStatistics());
    }

    public function testCountsMultipleOccurrences()
    {
        $languages = ['php', 'python', 'php',];
        $sut = new ProgrammingLanguages($languages);
        $this->assertEquals([
            'php' => 2,
            'python' => 1,
        ], $sut->getStatistics());
    }

    public function testFiltersOutNullLanguageNames()
    {
        $languages = ['php', null, 'php',];
        $sut = new ProgrammingLanguages($languages);
        $this->assertEquals([
            'php' => 2,
        ], $sut->getStatistics());
    }
}