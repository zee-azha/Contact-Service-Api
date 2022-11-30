<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contact extends Migration
{
    public function up()
    {
        $this->forge->addfield([
            'contact_id' => [
                'type' => 'INT',
                'constraint' => 8,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
                'null' => FALSE
                ],
                'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE
                ]
            ]);
                $this->forge->addKey('contact_id', TRUE);
                $this->forge->createTable('contact');
                
            }

    public function down()
    {
        $this->forge->dropTable('contact');
    }
}
