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
use Illuminate\Support\Facades\Storage;

class AreaController extends Controller
{
    public function show($id)
{
    $area = Area::with(['program', 'parameters.files'])->findOrFail($id);

    return view('area.areaContent', compact('area'));
}
    public function store(Request $request, $paramId)
{
    $request->validate([
        'file' => 'required|mimes:pdf|max:20480',
    ]);

    $file = $request->file('file');
    $fileName = $file->getClientOriginalName();

    // Save to storage/app/public/area_files
    $path = $file->storeAs('area_files', $fileName, 'public');

    $areaFile = AreaFile::create([
        'param_id'   => $paramId,
        'file_name'  => $fileName,
        'file_path'  => $path,
        'description'=> '',
    ]);

    return response()->json([
        'success' => true,
        'file' => $areaFile
    ]);
}
public function storeMultiple(Request $request)
{
    $uploadedFiles = [];

    foreach ($request->file('files', []) as $paramId => $files) {
        if (!$files) continue;

        // Ensure $files is always an array
        foreach ((array) $files as $file) {
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('area_files', $fileName, 'public');

            $areaFile = AreaFile::create([
                'param_id'  => $paramId,
                'file_name' => $fileName,
                'file_path' => $path,
                'description'=> '',
            ]);

            $uploadedFiles[] = $areaFile;
        }
    }

    return response()->json([
        'success' => true,
        'files' => $uploadedFiles
    ]);
}



    public function destroy($id)
    {
        $file = AreaFile::findOrFail($id);

        // delete file from storage
        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $file = AreaFile::findOrFail($id);
        $file->update([
            'description' => $request->description
        ]);

        return response()->json(['success' => true, 'file' => $file]);
    }
}
