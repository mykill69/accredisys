<?php

namespace App\Http\Controllers;

use App\Models\CollegeExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SurveyVisit;
use App\Models\Campus;
use App\Models\Area;
use App\Models\Parameters;
use App\Models\Program;


class PagesController extends Controller
{
    //
    public function home()
    {
        return view('pages.home');
    }

    
    public function manageContent()
    {
        $surveyVisits = SurveyVisit::all();
        $collegeExtensions = CollegeExtension::with('campus')->get();
        $campuses     = Campus::all();
        $areas              = Area::with(['surveyVisit', 'parameters'])->get();
        return view('pages.manageContent', compact('surveyVisits', 'collegeExtensions', 'campuses', 'areas'));
    }

    public function surveyStore(Request $request)
    {
        $request->validate([
            'visit_level' => 'required|string|max:255',
        ]);

        SurveyVisit::create($request->all());

        return redirect()->back()->with('success', 'Survey Visit Level added successfully.');
    }

    public function CollegeExtStore(Request $request)
    {
       $request->validate([
        'col_name' => 'required|string|max:255',
        'cam_id'   => 'required|exists:campus,id', // ✅ validate campus
    ]);

    CollegeExtension::create($request->all());

        return redirect()->back()->with('success', 'College & Extension added successfully!');
    }

    public function AreaStore(Request $request)
    {
        $request->validate([
            'area_name' => 'required|string|max:255',
            'survey_visit_id' => 'required|exists:survey_visit,id',
        ]);

        Area::create($request->all());

        return redirect()->back()->with('success', 'Area added successfully!');
    }
    public function ParameterStore(Request $request)
    {
        $request->validate([
            'param_name' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'description' => 'nullable|string',
        ]);

        Parameters::create($request->all());

        return redirect()->back()->with('success', 'Parameter added successfully!');
    }
public function programList()
{
    $programs = Program::with(['subFolder', 'campusRelation'])->get();
    return view('pages.programList', compact('programs'));
}
}
