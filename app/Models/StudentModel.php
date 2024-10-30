<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = ['firstname', 'lastname', 'photo', 'date_of_birth'];

    public function get_students()
    {
        return $this->findAll();
    }

}
