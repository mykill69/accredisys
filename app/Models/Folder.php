<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['name', 'description'];

    public function subFolders()
    {
        return $this->hasMany(SubFolder::class);
    }
}