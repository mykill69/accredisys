<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyVisit extends Model
{
    use HasFactory;

    protected $table = 'survey_visit'; // ✅ matches migration

    protected $fillable = ['visit_level'];

    public function areas()
    {
        return $this->hasMany(Area::class, 'survey_visit_id');
    }
    public function levelFolders()
{
    return $this->hasMany(LevelFolder::class, 'survey_visit_id');
}

}
