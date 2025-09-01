<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_name',
        'survey_visit_id',
    ];

    // ✅ Each Area belongs to one SurveyVisit
    public function surveyVisit()
    {
        return $this->belongsTo(SurveyVisit::class, 'survey_visit_id');
    }
    public function parameters()
{
    return $this->hasMany(Parameters::class, 'area_id');
}
public function program()
{
    return $this->belongsTo(Program::class, 'survey_visit_id', 'level');
}
public function files()
{
    return $this->hasMany(AreaFile::class, 'area_id');
}
}
