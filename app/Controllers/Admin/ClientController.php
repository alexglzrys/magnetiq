<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class ClientController extends BaseController
{
    public function index()
    {
        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();
        return view('pages/admin/clients/index', compact('clients'));
    }
}
