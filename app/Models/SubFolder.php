<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFolder extends Model
{
    protected $table = 'sub_folders';
    protected $fillable = ['folder_id', 'name', 'description'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function programs()
{
    return $this->hasMany(Program::class, 'sub_folder_id');
}
    use HasFactory;
}