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
            $categoryModel = new CategoryModel();

            $name = $this->request->getPost('name');
            $color = $this->request->getPost('color');
            $background = $this->request->getPost('background');

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
            $categoryModel = new CategoryModel();

            $name = $this->request->getPost('name');
            $color = $this->request->getPost('color');
            $background = $this->request->getPost('background');

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


}
