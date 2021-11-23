<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TagModel;

class TagController extends BaseController
{
    public function index()
    {
        $tagModel = new TagModel();
        $tags = $tagModel->findAll();
        return view('pages/admin/tags/index', compact('tags'));
    }
}
