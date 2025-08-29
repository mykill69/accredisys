<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeExtension extends Model
{
    use HasFactory;
    
      protected $table = 'colleges';
    protected $fillable = ['col_name', 'cam_id'];

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'cam_id');
    }
}
