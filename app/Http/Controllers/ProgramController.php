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

class ProgramController extends Controller
{
    public function programSettings()
{
    $folders = Folder::with('subFolders')->get(); // eager load subfolders
    return view('pages.programSetting', compact('folders'));
}

public function storeFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:folders,name',
            'description' => 'nullable|string',
        ]);

        Folder::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Folder created successfully!');
    }

public function showFolder($id)
{
    $folder = Folder::with('subFolders')->findOrFail($id);
    return view('pages.subFolders', compact('folder'));
}

public function storeSubFolder(Request $request, $folderId)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:sub_folders,name',
        'description' => 'nullable|string',
    ]);

    SubFolder::create([
        'folder_id'   => $folderId,
        'name'        => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->back()->with('success', 'Subfolder created successfully!');
}
public function showSubFolder($id)
{
    $subFolder = SubFolder::findOrFail($id);
    $campuses = Campus::all();
    $visit_levels = SurveyVisit::all();
    return view('pages.subFolderDetail', compact('subFolder', 'campuses', 'visit_levels'));
}

public function updateProgram(Request $request, $id)
{
    $program = Program::findOrFail($id);

    $program->update([
        'prog_name' => $request->prog_name ?? $program->prog_name,
        'campus'    => $request->campus ?? $program->campus,
        'level'     => $request->level ?? $program->level,
        'status'    => $request->status ?? $program->status,
        'code'      => $request->code ?? $program->code ?? rand(100000, 999999),
    ]);

    return redirect()->back()->with('success', 'Program updated successfully!');
}



public function storeProgram(Request $request, $subFolderId)
{
    $request->validate([
        'prog_name'  => 'required|string|max:255',
        'campus'     => 'required|exists:campus,id',
        'level'      => 'required|exists:survey_visit,id',
        'status'     => 'required|string|max:50',
    ]);

    Program::create([
        'sub_folder_id' => $subFolderId,
        'prog_name'     => $request->prog_name,
        'campus'        => $request->campus,
        'level'         => $request->level,
        'status'        => $request->status,
    ]);

    return redirect()->back()->with('success', 'Program added successfully!');
}

// public function showProgram($id)
// {
//     $program = Program::with(['campusRelation', 'levelRelation'])->findOrFail($id);
//     // ✅ Fetch only areas that match this program's survey visit level
//     $areas = Area::where('survey_visit_id', $program->level)->get();
//     return view('pages.programDetail', compact('program', 'areas'));
// }
// public function showProgram($id)
// {
//     $program = Program::with(['campusRelation', 'levelRelation', 'levelFolders'])->findOrFail($id);

//     // Fetch only areas for this program's survey visit level
//     $areas = Area::where('survey_visit_id', $program->level)->get();

//     // Fetch folders linked to the same survey_visit
//     $folders = LevelFolder::where('survey_visit_id', $program->level)->get();

//     return view('pages.programDetail', compact('program', 'areas', 'folders'));
// }
public function showProgram($id)
{
    $program = Program::with(['campusRelation', 'levelRelation', 'levelFolders'])->findOrFail($id);

    // Fetch only areas for this program’s survey visit level
    $areas = Area::with(['parameters.files' => function ($query) use ($program) {
        // Ensure files are only loaded if they belong to this program
        $query->where('program_id', $program->id);
    }])
    ->where('survey_visit_id', $program->level)
    ->get();

    // Fetch folders linked to the same survey_visit
    $folders = LevelFolder::where('survey_visit_id', $program->level)->get();

    return view('pages.programDetail', compact('program', 'areas', 'folders'));
}



}
