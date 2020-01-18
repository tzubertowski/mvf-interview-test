<?php

use App\Exceptions\User\UserRepositoriesFetchException;
use App\User\DTO\ProgrammingLanguages;
use App\User\UserRepository;
use Github\Api\ApiInterface;
use Github\Exception\ErrorException;

class UserRepositoryTest extends TestCase
{
    public function testHandlesApiExceptions()
    {
        $apiMock = \Mockery::mock(ApiInterface::class);
        $apiMock->shouldReceive('repositories')->andThrow(
            ErrorException::class,
            'Some kind of issue with github API'
        );
        $sut = new UserRepository($apiMock);

        $this->expectException(UserRepositoriesFetchException::class);
        $sut->getFavouriteLanguages('foo');
    }

    public function testHandlesEmptyRepositoriesList()
    {
        $apiMock = \Mockery::mock(ApiInterface::class);
        $apiMock->shouldReceive('repositories')->andReturn([]);
        $sut = new UserRepository($apiMock);

        $languages = $sut->getFavouriteLanguages('foo');
        $this->assertInstanceOf(ProgrammingLanguages::class, $languages);
        $this->assertEmpty($languages->getStatistics());
    }

    public function testReturnsStatistics()
    {
        $apiMock = \Mockery::mock(ApiInterface::class);
        $apiMock->shouldReceive('repositories')->andReturn([
            [
                'repository_url' => 'abc',
                'language' => 'php',
            ],
            [
                'repository_url' => 'abc',
                'language' => 'php',
            ],
            [
                'repository_url' => 'abca',
                'language' => 'javascript',
            ],
            [
                'repository_url' => 'abca',
                'language' => null,
            ],
        ]);
        $sut = new UserRepository($apiMock);

        $languages = $sut->getFavouriteLanguages('foo');
        $this->assertInstanceOf(ProgrammingLanguages::class, $languages);
        $this->assertEquals(
            [
                'php' => 2,
                'javascript' => 1,
            ],
            $languages->getStatistics()
        );
    }
}