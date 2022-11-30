<?php
namespace App\Database\Seeds;
class ContactTableSeeder extends \CodeIgniter\Database\Seeder {
public function run() {
  $data = [
    [
     'phone_number' => '08823334521',
     'name' => 'faiz'
    
   ],
   [
    'phone_number' => '081233322312',
    'name' => 'zeezha'
  
  ]
   
   ];
$this->db->table('contact')->insertBatch($data);}}