<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelFile extends Model
{
     protected $table = 'level_files';

    protected $fillable = [
        'folder_id',
        'file_name',
        'file_path',
        'description',
    ];

    public function folder()
    {
        return $this->belongsTo(LevelFolder::class, 'folder_id');
    }
}
