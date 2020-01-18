<?php

namespace App\User;

use App\Exceptions\User\UserRepositoriesFetchException;
use App\User\DTO\ProgrammingLanguages;
use Github\Api\ApiInterface;
use Github\Exception\ErrorException;

final class UserRepository
{
    private $queryBuilder;

    public function __construct(ApiInterface $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function getFavouriteLanguages(string $userName): ProgrammingLanguages
    {
        try {
            $userRepositories = $this->queryBuilder->repositories($userName);
        } catch (ErrorException $e) {
            throw new UserRepositoriesFetchException(
                'Unable to fetch user repositories data, username: ' . $userName
            );
        }
        $languages = array_map(function ($repository) {
            return $repository['language'];
        }, $userRepositories);

        return new ProgrammingLanguages($languages);
    }
}