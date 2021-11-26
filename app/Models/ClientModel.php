<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'clients';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 1;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['name', 'email', 'avatar', 'password', 'slug'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    public function createClient($name, $email, $password, $avatar, $categories, $social_networks) {
        try {
            $avatarPath = $this->uploadImage($avatar);
            $dataClient = [
                'name' => $name,
                'slug' => mb_url_title($name, '-', TRUE),
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'avatar' => $avatarPath,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->db = db_connect('default');
            $this->db->transBegin();
            // Operaciones tabla clients
            $this->db->table('clients')->insert($dataClient);
            $clientID = $this->db->insertID();
            // Operaciones tabla pivote client_has_categories
            $dataCategories = [];
            foreach ($categories as $category) {
                array_push($dataCategories, [
                    'client_id' => $clientID,
                    'category_id' => $category
                ]);
            }
            $this->db->table('client_has_categories')->insertBatch($dataCategories);
            // Operaciones tabla pivote client_has_social_networks
            $dataSocialNetworks = [];
            foreach ($social_networks as $social_network) {
                array_push($dataSocialNetworks, [
                    'client_id' => $clientID,
                    'social_network_id' => $social_network
                ]);
            }
            $this->db->table('client_has_social_networks')->insertBatch($dataSocialNetworks);
            // Confirmar operaciones en base de datos
            if ($this->db->transStatus() === FALSE) {
                $this->db->transRollback();
                return false;
            } else {
                $this->db->transCommit();
                return true;
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            throw new \Exception("Error de conexión temporal a la base de datos, favor de intentar más tarde.");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function editClient($id, $name, $email, $password, $avatar, $categories, $social_networks) {
        try {
            $dataClient = [
                'name' => $name,
                'slug' => mb_url_title($name, '-', TRUE),
                'email' => $email,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($avatar->getError() !== 4) {
                $avatarPath = $this->uploadImage($avatar);
                $dataClient['avatar'] = $avatarPath;
            }
            if ($password) {
                $dataClient['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->db = db_connect('default');
            $this->db->transBegin();
            // Operaciones tabla clients
            $this->db->table('clients')->where('id', $id)->update($dataClient);
            // Operaciones tabla pivote client_has_categories
            $this->db->table('client_has_categories')->where('client_id', $id)->delete();
            $dataCategories = [];
            foreach ($categories as $category) {
                array_push($dataCategories, [
                    'client_id' => $id,
                    'category_id' => $category
                ]);
            }
            $this->db->table('client_has_categories')->insertBatch($dataCategories);
            // Operaciones tabla pivote client_has_social_networks
            $this->db->table('client_has_social_networks')->where('client_id', $id)->delete();
            $dataSocialNetworks = [];
            foreach ($social_networks as $social_network) {
                array_push($dataSocialNetworks, [
                    'client_id' => $id,
                    'social_network_id' => $social_network
                ]);
            }
            $this->db->table('client_has_social_networks')->insertBatch($dataSocialNetworks);
            // Confirmar operaciones en base de datos
            if ($this->db->transStatus() === FALSE) {
                $this->db->transRollback();
                return false;
            } else {
                $this->db->transCommit();
                return true;
            }
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            throw new \Exception("Error de conexión temporal a la base de datos, favor de intentar más tarde.");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getCategoriesClient($id)
    {
        try {
            $this->db = db_connect('default');
            $builder = $this->db->table('client_has_categories');
            $query = $builder->where('client_id', $id)->get()->getResult();
            return $query;
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            throw new \Exception("Error de conexión temporal a la base de datos, favor de intentar más tarde.");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getSocialNetworksClient($id)
    {
        try {
            $this->db = db_connect('default');
            $builder = $this->db->table('client_has_social_networks');
            $query = $builder->where('client_id', $id)->get()->getResult();
            return $query;
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            throw new \Exception("Error de conexión temporal a la base de datos, favor de intentar más tarde.");
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }
    }

    private function uploadImage($image) {
        if ($image->isValid() && !$image->hasMoved()) {
            $fileName = $image->getRandomName();
            $imageMoved = $image->move(ROOTPATH.'public/images/avatars/clients/', $fileName);
            if ($imageMoved) {
                return 'public/images/avatars/clients/'.$fileName;
            } else {
                throw new \Exception("Error al tratar de subir el recurso de imagen al servidor, favor de intentar más tarde.");
            }
        } else {
            throw new \Exception("Recurso de imagen no válido.");
        }
    }
}
