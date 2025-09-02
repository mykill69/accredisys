<?php

namespace App\Http\Controllers;

use App\Models\CollegeExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SurveyVisit;
use App\Models\Campus;
use App\Models\Area;
use App\Models\Parameters;
use App\Models\Folder;
use App\Models\SubFolder;
use App\Models\Program;
use App\Models\LevelFolder;

class GuestController extends Controller
{
    
    public function guestProgram($token)
{
    $program = Program::where('guest_token', $token)->firstOrFail();
    return view('guest.guestLayout', compact('program'));
}


}
