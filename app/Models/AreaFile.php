<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaFile extends Model
{
    use HasFactory;

    protected $table = 'area_files';

    protected $fillable = [
    'area_id',
    'param_id',
    'program_id',
    'file_name',
    'file_path',
];



   
    public function area()
{
    return $this->belongsTo(Area::class, 'area_id');
}

public function program()
{
    return $this->belongsTo(Program::class, 'program_id');
}

public function parameter()
{
    return $this->belongsTo(Parameters::class, 'param_id');
}

}
