<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->findAll();
        return view('pages/admin/categories/index', compact('categories'));
    }

    public function create()
    {
        return view('pages/admin/categories/create');
    }

    public function store()
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'name' => [
                    'label' => 'Nombre de categoría',
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

            $categoryModel = new CategoryModel();

            $name = trim($this->request->getPost('name'));
            $color = trim($this->request->getPost('color'));
            $background = trim($this->request->getPost('background'));

            $data = [
                'name' => $name,
                'slug' => mb_url_title($name, '-', TRUE),
                'color' => $color,
                'background' => $background
            ];

            $categoryCreated = $categoryModel->save($data);

            if ($categoryCreated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "La categoría se registró satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible registrar la categoría en el sistema, favor de intentar mas tarde.";
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
        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);
        return view('pages/admin/categories/edit', compact('category'));
    }

    public function update($id)
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'name' => [
                    'label' => 'Nombre de categoría',
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

            $categoryModel = new CategoryModel();

            $name = trim($this->request->getPost('name'));
            $color = trim($this->request->getPost('color'));
            $background = trim($this->request->getPost('background'));

            $data = [
                'name' => $name,
                'slug' => mb_url_title($name, '-', TRUE),
                'color' => $color,
                'background' => $background
            ];

            $categoryUpdated = $categoryModel->update($id, $data);

            if ($categoryUpdated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "La categoría se actualizó satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible actualizar la categoría en el sistema, favor de intentar mas tarde.";
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
            $categoryModel = new CategoryModel();
            $categoryDeleted = $categoryModel->delete($id);
            if ($categoryDeleted) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "La categoría se eliminó satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible eliminar la categoría en el sistema, favor de intentar mas tarde.";
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
