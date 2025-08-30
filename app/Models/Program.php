<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';
    protected $fillable = [
        'prog_name',
        'sub_folder_id',
        'campus',
        'level',
        'status'
    ];

    public function subFolder()
    {
        return $this->belongsTo(SubFolder::class);
    }
    public function levelRelation()
    {
        return $this->belongsTo(SurveyVisit::class, 'level');
    }
    public function campusRelation()
    {
        return $this->belongsTo(Campus::class, 'campus');
    }
}

