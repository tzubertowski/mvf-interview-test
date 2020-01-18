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
        foreach ($this->languages as $key => $languageName) {
            // Filter out empty language names
            if (empty($languageName)) {
                continue;
            }
            if (isset($statistics[$languageName])) {
                $statistics[$languageName] += 1;
                continue;
            }
            $statistics[$languageName] = 1;
        }
        return $statistics;
    }
}