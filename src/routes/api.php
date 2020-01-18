<?php

$router->get(
    '/programming-languages',
    [
        'as' => 'programming_languages',
        'uses' => 'ProgrammingLanguagesController@get',
    ]
);
