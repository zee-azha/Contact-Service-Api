<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact extends Model{
   
    protected $table            = 'contact';
    protected $primaryKey       = 'contact_id';
    protected $allowedFields    = ['phone_number','name'];
}
