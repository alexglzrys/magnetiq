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

    public function create()
    {
        return view('pages/admin/tags/create');
    }

    public function store()
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'name' => [
                    'label' => 'Nombre de etiqueta',
                    'rules' => 'required|min_length[3]|max_length[30]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'color' => [
                    'label' => 'Color de texto',
                    'rules' => 'required|min_length[7]|max_length[7]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'background' => [
                    'label' => 'Color de fondo',
                    'rules' => 'required|min_length[7]|max_length[7]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
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

            $tagModel = new TagModel();

            $name = trim($this->request->getPost('name'));
            $color = trim($this->request->getPost('color'));
            $background = trim($this->request->getPost('background'));

            $data = [
                'name' => $name,
                'slug' => mb_url_title($name, '-', TRUE),
                'color' => $color,
                'background' => $background
            ];

            $tagCreated = $tagModel->save($data);

            if ($tagCreated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "La etiqueta se registró satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible registrar la etiqueta en el sistema, favor de intentar mas tarde.";
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
        $tagModel = new TagModel();
        $tag = $tagModel->find($id);
        return view('pages/admin/tags/edit', compact('tag'));
    }

    public function update($id)
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'name' => [
                    'label' => 'Nombre de etiqueta',
                    'rules' => 'required|min_length[3]|max_length[30]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'color' => [
                    'label' => 'Color de texto',
                    'rules' => 'required|min_length[7]|max_length[7]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'background' => [
                    'label' => 'Color de fondo',
                    'rules' => 'required|min_length[7]|max_length[7]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
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

            $tagModel = new TagModel();

            $name = trim($this->request->getPost('name'));
            $color = trim($this->request->getPost('color'));
            $background = trim($this->request->getPost('background'));

            $data = [
                'name' => $name,
                'slug' => mb_url_title($name, '-', TRUE),
                'color' => $color,
                'background' => $background
            ];

            $tagUpdated = $tagModel->update($id, $data);

            if ($tagUpdated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "La etiqueta se actualizó satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible actualizar la etiqueta en el sistema, favor de intentar mas tarde.";
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
            $tagModel = new TagModel();
            $tagDeleted = $tagModel->delete($id);
            if ($tagDeleted) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "La etiqueta se eliminó satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible eliminar la etiqueta en el sistema, favor de intentar mas tarde.";
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
