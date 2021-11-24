<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CommunityModel;

class CommunityController extends BaseController
{
    public function index()
    {
        $communityModel = new CommunityModel();
        $communities = $communityModel->where('role_id =', 2)->get()->getResult();
        return view('pages/admin/communities/index', compact('communities'));
    }
}
