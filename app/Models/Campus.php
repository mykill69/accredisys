<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $table = 'campus';
    protected $fillable = ['cam_name'];

    public function collegeExtensions()
    {
        return $this->hasMany(CollegeExtension::class, 'cam_id');
    }
}
