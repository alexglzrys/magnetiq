<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Es necesario hacer más enfasis en el producto',
                'post_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Reemplazar la imagen adjunta por slack',
                'post_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Retirar el #muebles',
                'post_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Felicidades, nos encantó este posteo',
                'post_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Retirar la campaña de #hashTags y centrarse en lo que puede hacer el App',
                'post_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Favor de cambiar la imagen por la guitarra en realidad aumentada',
                'post_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Favor de agregar la campaña #todoscontradipan',
                'post_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Cambiar la palabra pan por panadería',
                'post_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Cambiar la imagen por la adjunta por correo electrónico',
                'post_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Pueden reprograar este posteo para el siguiente día.',
                'post_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Excelente, posteo aprobado para su publicación',
                'post_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                // Status: Borrador, Revisión, Aprobado
                'content' => 'Colocar que solo es para clientes en cuyas compras sean de $1000 o más',
                'post_id' => '12',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        $this->db->table('comments')->insertBatch($data);
    }
}
