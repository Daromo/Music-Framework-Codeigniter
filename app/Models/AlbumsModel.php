<?php namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table = 'albums';
    protected $returnType    = 'App\Entities\Album';
    protected $allowedFields = ['name','author','genre_id'];
}
