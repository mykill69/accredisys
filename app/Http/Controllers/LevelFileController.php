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
use App\Models\LevelFile;
use Illuminate\Support\Facades\Storage;

class LevelFileController extends Controller
{
    public function storeMultiple(Request $request)
    {
        $uploadedFiles = [];

        foreach ($request->file('files', []) as $folderId => $files) {
            if (!$files) continue;

            foreach ((array) $files as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs('level_files', $fileName, 'public');

                $levelFile = LevelFile::create([
                    'folder_id'  => $folderId,   // ✅ links to LevelFolder
                    'file_name'  => $fileName,
                    'file_path'  => $path,
                    'description'=> '',
                ]);

                $uploadedFiles[] = $levelFile;
            }
        }

        return response()->json([
            'success' => true,
            'files' => $uploadedFiles
        ]);
    }

    public function destroy($id)
    {
        $file = LevelFile::findOrFail($id);

        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $file = LevelFile::findOrFail($id);
        $file->update([
            'description' => $request->description
        ]);

        return response()->json(['success' => true, 'file' => $file]);
    }
}
