<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ClientModel;
use App\Models\SocialNetworkModel;

class ClientController extends BaseController
{
    public function index()
    {
        $clientModel = new ClientModel();
        $clients = $clientModel->findAll();
        return view('pages/admin/clients/index', compact('clients'));
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $socialNetworkModel = new SocialNetworkModel();
        $categories = $categoryModel->findAll();
        $social_networks = $socialNetworkModel->findAll();
        return view('pages/admin/clients/create', compact('categories', 'social_networks'));
    }

    public function store()
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'name' => [
                    'label' => 'nombre del cliente',
                    'rules' => 'required|min_length[3]|max_length[60]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'email' => [
                    'label' => 'correo electrónico',
                    'rules' => 'required|max_length[60]|valid_email|is_unique[clients.email]',
                    'errors' => [
                        'required' => 'El {field} es requerido',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres',
                        'valid_email' => 'El {field} proporcionado no parece ser un dato válido',
                        'is_unique' => 'El {field} proporcionado ya se encuentra en uso'
                    ]
                ],
                'password' => [
                    'label' => 'contraseña de cliente',
                    'rules' => 'required|min_length[8]|max_length[16]',
                    'errors' => [
                        'required' => 'La {field} es un dato requerido',
                        'min_length' => 'La {field} debe tener al menos {param} caracteres',
                        'max_length' => 'La {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'avatar' => [
                    'label' => 'avatar de cliente',
                    'rules' => 'uploaded[avatar]|max_size[avatar,500]|max_dims[avatar,400,400]|ext_in[avatar,png]',
                    'errors' => [
                        'uploaded' => 'El {field} es un dato requerido',
                        'ext_in' => 'El {field} debe ser en formato jpg',
                        'max_size' => 'El {field} excede el tamaño máximo permitido de 500kb.',
                        'max_dims' => 'El {field} no debe exceder los 400x400'
                    ]
                ],
                'categories.*' => [
                    'label' => 'categorías asociadas',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Las {field} son un dato requerido',
                        'numeric' => 'Las {field} deben ser un valor numérico',
                    ]
                ],
                'networks.*' => [
                    'label' => 'redes sociales asociadas',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Las {field} son un dato requerido',
                        'numeric' => 'Las {field} deben ser un valor numérico',
                    ]
                ],
            ];

            $input = $this->validate($rules);

            if (!$input) {
                $response["status"]     = "invalid";
                $response["code"]       = 406;
                $response["message"]    = "Estimado usuario, los datos ingresados son incorrectos, verifiquelos nuevamente.";
                $response['validation'] = $this->validator->getErrors();
                return $this->response->setJSON($response);
            }

            $name = trim($this->request->getPost('name'));
            $email = trim($this->request->getPost('email'));
            $password = trim($this->request->getPost('password'));
            $categories = $this->request->getPost('categories');
            $social_networks = $this->request->getPost('networks');
            $avatar = $this->request->getFile('avatar');

            $clientModel = new ClientModel();
            $clientCreated = $clientModel->createClient($name, $email, $password, $avatar, $categories, $social_networks);

            if ($clientCreated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "El Cliente se registró satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible registrar el Cliente en el sistema, favor de intentar mas tarde.";
            }

            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response["status"]  = "error";
            $response["code"]    = 500;
            $response["message"] = $e->getMessage();
            return $this->response->setJSON($response);
        }
    }

    public function edit($id)
    {
        $clientModel = new ClientModel();
        $categoryModel = new CategoryModel();
        $socialNetworkModel = new SocialNetworkModel();
        $client = $clientModel->find($id);
        $currentCategories = $clientModel->getCategoriesClient($id);
        $currentSocialNetworks = $clientModel->getSocialNetworksClient($id);
        $categories = $categoryModel->findAll();
        $social_networks = $socialNetworkModel->findAll();
        return view('pages/admin/clients/edit', compact('client', 'currentCategories', 'currentSocialNetworks', 'categories', 'social_networks'));
    }

    public function update($id)
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'name' => [
                    'label' => 'nombre del cliente',
                    'rules' => 'required|min_length[3]|max_length[60]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'email' => [
                    'label' => 'correo electrónico',
                    'rules' => "required|max_length[60]|valid_email|is_unique[clients.email,id,$id]",
                    'errors' => [
                        'required' => 'El {field} es requerido',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres',
                        'valid_email' => 'El {field} proporcionado no parece ser un dato válido',
                        'is_unique' => 'El {field} proporcionado ya se encuentra en uso'
                    ]
                ],
                'password' => [
                    'label' => 'contraseña de cliente',
                    'rules' => 'permit_empty|min_length[8]|max_length[16]',
                    'errors' => [
                        'min_length' => 'La {field} debe tener al menos {param} caracteres',
                        'max_length' => 'La {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'avatar' => [
                    'label' => 'avatar de cliente',
                    'rules' => 'max_size[avatar,500]|max_dims[avatar,400,400]|ext_in[avatar,png]',
                    'errors' => [
                        'ext_in' => 'El {field} debe ser en formato jpg',
                        'max_size' => 'El {field} excede el tamaño máximo permitido de 500kb.',
                        'max_dims' => 'El {field} no debe exceder los 400x400'
                    ]
                ],
                'categories.*' => [
                    'label' => 'categorías asociadas',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Las {field} son un dato requerido',
                        'numeric' => 'Las {field} deben ser un valor numérico',
                    ]
                ],
                'networks.*' => [
                    'label' => 'redes sociales asociadas',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'Las {field} son un dato requerido',
                        'numeric' => 'Las {field} deben ser un valor numérico',
                    ]
                ],
            ];

            $input = $this->validate($rules);

            if (!$input) {
                $response["status"]     = "invalid";
                $response["code"]       = 406;
                $response["message"]    = "Estimado usuario, los datos ingresados son incorrectos, verifiquelos nuevamente.";
                $response['validation'] = $this->validator->getErrors();
                return $this->response->setJSON($response);
            }

            $name = trim($this->request->getPost('name'));
            $email = trim($this->request->getPost('email'));
            $password = trim($this->request->getPost('password'));
            $categories = $this->request->getPost('categories');
            $social_networks = $this->request->getPost('networks');
            $avatar = $this->request->getFile('avatar');

            $clientModel = new ClientModel();
            $clientUpdated = $clientModel->editClient($id, $name, $email, $password, $avatar, $categories, $social_networks);

            if ($clientUpdated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "El Cliente actualizó satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible actualizar el Cliente en el sistema, favor de intentar mas tarde.";
            }

            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response["status"]  = "error";
            $response["code"]    = 500;
            $response["message"] = $e->getMessage();
            return $this->response->setJSON($response);
        }
    }

    public function destroy($id)
    {
        $response = [];
        try {
            $clientModel = new ClientModel();
            $clientDeleted = $clientModel->delete($id);
            if ($clientDeleted) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "El Cliente se eliminó satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible eliminar el Cliente en el sistema, favor de intentar mas tarde.";
            }
            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response["status"]  = "error";
            $response["code"]    = 500;
            $response["message"] = $e->getMessage();
            return $this->response->setJSON($response);
        }
    }


}
