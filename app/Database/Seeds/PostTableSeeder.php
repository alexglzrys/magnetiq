<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        // Status: Borrador, Revisión, Aprobado
        // Post type: Imagen
        // 
        $data = [
            [
                'title' => 'Plumones lavables',
                'copy' => 'Crayola tiene para ti los plumones lavables para este regreso a clases',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+3 day")),
                'post_type_id' => 1,
                'status_id' => 1,
                'brand_id' => 2,
                'category_id' => 1,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Lapiceros mágicos',
                'copy' => 'Lapiceros delgados con diferentes colores, te sorprenderan. Solo agita y prueba el nuevo color.',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+5 day")),
                'post_type_id' => 1,
                'status_id' => 2,
                'brand_id' => 2,
                'category_id' => 1,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Muebles escolares',
                'copy' => 'Ven y conoce la nueva linea de muebles escolares que Crayola tiene para ti este regreso a clases.',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+3 day")),
                'post_type_id' => 1,
                'status_id' => 2,
                'brand_id' => 2,
                'category_id' => 3,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Juegos de mesa',
                'copy' => 'Diviertete con toda tu familia con los diferentes juegos de mesa que Crayola Toys tiene para ti',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+3 day")),
                'post_type_id' => 1,
                'status_id' => 3,
                'brand_id' => 3,
                'category_id' => 1,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Juegos para bebés',
                'copy' => 'Crayola te presenta su nueva linea de juguetes para bebés',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+4 day")),
                'post_type_id' => 1,
                'status_id' => 1,
                'brand_id' => 3,
                'category_id' => 2,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Ya conoces nuestra App',
                'copy' => 'Descarga la nueva App de Crayola Alternative y diviertete en un mundo mágico de realidad aumentada',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+7 day")),
                'post_type_id' => 1,
                'status_id' => 2,
                'brand_id' => 1,
                'category_id' => 2,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Harina para hornear donas',
                'copy' => 'Las Donas son el producto estrella que toda panadería debe tener para ofrecer a todos sus clientes. Nuestras harinas hacen que ese producto sea una realidad',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+8 day")),
                'post_type_id' => 1,
                'status_id' => 2,
                'brand_id' => 4,
                'category_id' => 4,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Nuevo saborizante tutifruti',
                'copy' => 'Te imaginas un pan sabor a manzana, uva, piña o cereza. Ven y conoce nuestra linea de nuevos saborizantes a frutas',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+4 day")),
                'post_type_id' => 1,
                'status_id' => 3,
                'brand_id' => 4,
                'category_id' => 4,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'La ruleta de la suerte',
                'copy' => 'Falta poco para que termine esta gran promoción, compra cualquier producto de la familia tradipan y registra tu ticket de compra en nuestro sitio Web para participar y ganar grandes premios',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+8 day")),
                'post_type_id' => 1,
                'status_id' => 1,
                'brand_id' => 6,
                'category_id' => 4,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Harina para hotcakes',
                'copy' => 'Conoce nuestra nueva linea de harinas para HotCakes en presentación sobre de 700gr.',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+6 day")),
                'post_type_id' => 1,
                'status_id' => 2,
                'brand_id' => 4,
                'category_id' => 4,
                'user_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Tienda Atlas ahora en Marina Puerto Cancún ',
                'copy' => 'Bienvenido tiendas Atlas al centro comercial de Marina Puerto Cancún.',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+2 day")),
                'post_type_id' => 1,
                'status_id' => 1,
                'brand_id' => 8,
                'category_id' => 6,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Minicancha de Futbol',
                'copy' => 'Ven a Marina Puerto Cancún a divertirte con las familias en nuestra nueva cancha de minifutbol.',
                'url_resource' => 'http://placeimg.com/400/300/any',
                'published_at' => date('Y-m-d', strtotime("+7 day")),
                'post_type_id' => 1,
                'status_id' => 2,
                'brand_id' => 7,
                'category_id' => 6,
                'user_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('posts')->insertBatch($data);
    }
}
