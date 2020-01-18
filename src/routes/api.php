<?php

$router->get(
    '/programming-languages',
    [
        'as' => 'profile',
        'uses' => 'ProgrammingLanguagesController@get',
    ]
);
