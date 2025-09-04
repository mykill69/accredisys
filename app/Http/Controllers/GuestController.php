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

// public function verifyGuestCode(Request $request, $token)
// {
//     $program = Program::where('guest_token', $token)->firstOrFail();

//     if ($request->code === $program->code) {
//         // Fetch only areas for this program’s survey visit level
//         $areas = Area::with(['parameters.files' => function ($query) use ($program) {
//             $query->where('program_id', $program->id);
//         }])
//         ->where('survey_visit_id', $program->level)
//         ->get();

//         // Fetch folders linked to the same survey_visit
//         $folders = LevelFolder::where('survey_visit_id', $program->level)->get();

//         return view('guest.guestArea', compact('program', 'areas', 'folders'));
//     }

//     return back()->withErrors(['code' => 'Invalid code. Please try again.']);
// }
public function verifyGuestCode(Request $request, $token)
{
    $program = Program::where('guest_token', $token)->firstOrFail();

    // Check if program is Active
    if (strtolower($program->status) !== 'active') {
        return back()->withErrors(['code' => 'This program is not active. Access denied.']);
    }

    // Validate code
    if ($request->code === $program->code) {
        // Fetch only areas for this program’s survey visit level
        $areas = Area::with(['parameters.files' => function ($query) use ($program) {
            $query->where('program_id', $program->id);
        }])
        ->where('survey_visit_id', $program->level)
        ->get();

        // Fetch folders linked to the same survey_visit
        $folders = LevelFolder::where('survey_visit_id', $program->level)->get();

        return view('guest.guestArea', compact('program', 'areas', 'folders'));
    }

    return back()->withErrors(['code' => 'Invalid code. Please try again.']);
}
public function guestProgramAreas($token, $areaId)
{
    $program = Program::where('guest_token', $token)->firstOrFail();

    // Load the area with its parameters and files, filtered by this program
    $area = Area::where('survey_visit_id', $program->level)
        ->with(['parameters.files' => function ($query) use ($program) {
            $query->where('program_id', $program->id);
        }])
        ->findOrFail($areaId);

    return view('guest.guestParameters', compact('program', 'area'));
}

}
