<?php

namespace App\Http\Controllers;

use App\User\UserRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProgrammingLanguagesController extends BaseController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|in:favourite',
            'userName' => 'required',
        ]);

        return $this->userRepository->getFavouriteLanguages(
            $request->input('userName')
        )->getStatistics();
    }
}
