<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersMeeting extends Model
{
    protected $table                = 'users_meeting';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['users_id', 'meeting_id'];

    // Dates
    protected $useTimestamps        = false;

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
