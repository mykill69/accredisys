<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelFolder extends Model
{
    use HasFactory;

    protected $fillable = ['survey_visit_id', 'folder_name'];

    public function surveyVisit()
    {
        return $this->belongsTo(SurveyVisit::class, 'survey_visit_id');
    }

    // Get all programs under the same survey visit level
    public function programs()
    {
        return $this->hasMany(Program::class, 'level', 'survey_visit_id');
    }
    public function files()
{
    return $this->hasMany(LevelFile::class, 'folder_id');
}
}