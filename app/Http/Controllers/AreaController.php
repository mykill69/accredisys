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
use App\Models\AreaFile;
use App\Models\LevelFolder;
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
//    public function show($programId)
// {
//     $program = Program::with(['areas.parameters.files'])->findOrFail($programId);

//     // Extract the areas from the program
//     $areas = $program->areas;

//     return view('area.areaContent', compact('program', 'areas'));
// }
public function show($programId, $areaId)
{
    // Load program and specific area with parameters + files
    $program = Program::findOrFail($programId);

    $area = $program->areas()
        ->with(['parameters.files' => function ($query) use ($programId) {
            $query->where('program_id', $programId);
        }])
        ->findOrFail($areaId);

    return view('area.areaContent', compact('program', 'area'));
}



    public function store(Request $request, $paramId, $programId)
{
    $request->validate([
        'file' => 'required|mimes:pdf|max:20480',
    ]);

    $file = $request->file('file');
    $fileName = $file->getClientOriginalName();
    $path = $file->storeAs('area_files', $fileName, 'public');

    $areaFile = AreaFile::create([
        'param_id'   => $paramId,
        'program_id' => $programId,
        'file_name'  => $fileName,
        'file_path'  => $path,
    ]);

    return response()->json(['success' => true, 'file' => $areaFile]);
}

public function storeMultiple(Request $request)
{
    $uploadedFiles = [];
    $programId = $request->input('program_id');
    $areaId = $request->input('area_id'); // 👈 add hidden area input

    foreach ($request->file('files', []) as $paramId => $files) {
        if (!$files) continue;

        foreach ((array) $files as $file) {
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('area_files', $fileName, 'public');

            $areaFile = AreaFile::create([
                'param_id'   => $paramId,
                'program_id' => $programId,
                'area_id'    => $areaId, // 👈 include area
                'file_name'  => $fileName,
                'file_path'  => $path,
            ]);

            $uploadedFiles[] = $areaFile;
        }
    }

    return response()->json(['success' => true, 'files' => $uploadedFiles]);
}


    public function destroy($id)
{
    $file = AreaFile::find($id);

    if (!$file) {
        return redirect()->back()->with('error', 'File not found.');
    }

    // Delete from storage
    if (Storage::disk('public')->exists($file->file_path)) {
        Storage::disk('public')->delete($file->file_path);
    }

    // Delete DB record
    $file->delete();

    return redirect()->back()->with('success', 'File deleted successfully.');
}

    public function update(Request $request, $id)
    {
        $file = AreaFile::findOrFail($id);
        $file->update([
            'description' => $request->description
        ]);

        return response()->json(['success' => true, 'file' => $file]);
    }

    
public function levelFolders()
{
    $folders = LevelFolder::with(['files'])->get();

    return view('level_folders.levelFiles', compact('folders'));
}

}
