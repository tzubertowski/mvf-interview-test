<?php

namespace App\User\DTO;

class ProgrammingLanguages
{
    private $languages = [];

    public function __construct(array $languages)
    {
        $this->languages = $languages;
    }

    public function getStatistics()
    {
        $statistics = [];
        foreach ($this->languages as $languageName) {
            // Filter out empty language names
            if (!$languageName) {
                continue;
            }
            if (isset($statistics[$languageName])) {
                $statistics[$languageName] += 1;
                break;
            }
            $statistics[$languageName] = 1;
        }
        return $statistics;
    }
}