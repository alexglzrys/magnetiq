<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CommunityController extends BaseController
{
    public function index()
    {
        return view('pages/community/calendar');
    }
}
