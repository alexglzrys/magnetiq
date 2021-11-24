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

    public function create()
    {
        return view('pages/admin/communities/create');
    }

    public function store()
    {
        $response = [];
        try {
            // Validación de datos
            $rules = [
                'first_name' => [
                    'label' => 'nombre',
                    'rules' => 'required|min_length[3]|max_length[30]',
                    'errors' => [
                        'required' => 'El {field} es un dato requerido',
                        'min_length' => 'El {field} debe tener al menos {param} caracteres',
                        'max_length' => 'El {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'last_name' => [
                    'label' => 'apellidos',
                    'rules' => 'required|min_length[3]|max_length[30]',
                    'errors' => [
                        'required' => 'Los {field} son un dato requerido',
                        'min_length' => 'Los {field} deben tener al menos {param} caracteres',
                        'max_length' => 'Los {field} no deben exceder los {param} caracteres'
                    ]
                ],
                'email' => [
                    'label' => 'correo electrónico',
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => 'El {field} es requerido',
                        'valid_email' => 'El {field} proporcionado no parece ser un dato válido',
                        'is_unique' => 'El {field} proporcionado ya se encuentra en uso'
                    ]
                ],
                'password' => [
                    'label' => 'contraseña de usuario',
                    'rules' => 'required|min_length[8]|max_length[16]',
                    'errors' => [
                        'required' => 'La {field} es un dato requerido',
                        'min_length' => 'La {field} debe tener al menos {param} caracteres',
                        'max_length' => 'La {field} no debe exceder los {param} caracteres'
                    ]
                ],
                'avatar' => [
                    'label' => 'avatar de usuario',
                    'rules' => 'uploaded[avatar]|max_size[avatar,500]|max_dims[avatar,400,400]|ext_in[avatar,png]',
                    'errors' => [
                        'uploaded' => 'El {field} es un dato requerido',
                        'ext_in' => 'El {field} debe ser en formato jpg',
                        'max_size' => 'El {field} excede el tamaño máximo permitido de 500kb.',
                        'max_dims' => 'El {field} no debe exceder los 400x400'
                    ]
                ]
            ];

            $input = $this->validate($rules);

            if (!$input) {
                $response["status"]     = "invalid";
                $response["code"]       = 406;
                $response["message"]    = "Estimado usuario, los datos ingresados son incorrectos, verifiquelos nuevamente.";
                $response['validation'] = $this->validator->getErrors();
                return $this->response->setJSON($response);
            }

            $communityModel = new CommunityModel();

            $first_name = trim($this->request->getPost('first_name'));
            $last_name = trim($this->request->getPost('last_name'));
            $email = trim($this->request->getPost('email'));
            $password = trim($this->request->getPost('password'));
            $avatar = $this->request->getFile('avatar');

            $uploadAvatarSuccess = $this->uploadImage($avatar);

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'avatar' => $uploadAvatarSuccess,
                'role_id' => 2,
            ];

            $communityCreated = $communityModel->save($data);

            if ($communityCreated) {
                $response["status"]     = "success";
                $response["code"]       = 200;
                $response["message"]    = "El Community Manager se registró satisfactoriamente en el sistema.";
            } else {
                $response["status"]     = "error";
                $response["code"]       = 500;
                $response["message"]    = "No fue posible registrar el Community Manager en el sistema, favor de intentar mas tarde.";
            }

            return $this->response->setJSON($response);
        } catch (\Exception $e) {
            $response["status"]  = "error";
            $response["code"]    = 500;
            $response["message"] = $e->getMessage();
            return $this->response->setJSON($response);
        }
    }

    private function uploadImage($image) {
        if ($image->isValid() && !$image->hasMoved()) {
            $fileName = $image->getRandomName();
            $imageMoved = $image->move(ROOTPATH.'public/images/avatars/', $fileName);
            if ($imageMoved) {
                return 'public/images/avatars/'.$fileName;
            } else {
                throw new \Exception("Error al tratar de subir el recurso de imagen al servidor, favor de intentar más tarde.");
            }
        } else {
            throw new \Exception("Recurso de imagen no válido.");
        }
    }
}
