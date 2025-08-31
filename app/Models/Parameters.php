<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameters extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'param_name',
        'description',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function files()
{
    return $this->hasMany(AreaFile::class, 'param_id');
}
}
