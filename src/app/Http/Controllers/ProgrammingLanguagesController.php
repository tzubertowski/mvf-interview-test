<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ProgrammingLanguagesController extends BaseController
{
    public function get()
    {
        return ['data' => 'pong'];
    }
}
