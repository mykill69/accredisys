<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaFile extends Model
{
    use HasFactory;

    protected $table = 'area_files';

    protected $fillable = [
        'param_id',
        'file_name',
        'file_path',
        'description',
    ];

   
    public function program()
{
    return $this->belongsTo(Program::class, 'program_id');
}
public function parameter()
{
    return $this->belongsTo(Parameters::class, 'param_id');
}

}
