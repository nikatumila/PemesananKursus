<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\Course;
use App\Models\Instructor;

class QualificationController extends Controller
{
    public function index()
    {
        $qualifications = Qualification::with(['course', 'instructors'])->get();
        return view('qualifications.index', compact('qualifications'));
    }

    public function create()
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('qualifications.create', compact('courses', 'instructors'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'topicID' => 'required',
                'instructorIDs' => 'required|array',
                'instructorIDs.*' => 'exists:instructors,id',
            ]);

            $topicID = $request->input('topicID');
            $instructorIDs = $request->input('instructorIDs');

            $qualification = Qualification::create([
                'topicID' => $topicID,
            ]);

            $qualification->instructors()->attach($instructorIDs);

            return redirect()->route('qualifications.index')
                ->with('success', 'Qualifications created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('qualifications.create')
                ->with('error', 'Error creating qualifications: ' . $e->getMessage());
        }
    }

    public function edit(Qualification $qualification)
    {
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('qualifications.edit', compact('qualification', 'courses', 'instructors'));
    }

    public function update(Request $request, Qualification $qualification)
    {
        $request->validate([
            'topicID' => 'required',
            'instructorIDs' => 'required|array',
            'instructorIDs.*' => 'exists:instructors,id',
        ]);

        $qualification->topicID = $request->input('topicID');
        $qualification->save();

        $qualification->instructors()->sync($request->input('instructorIDs'));

        return redirect()->route('qualifications.index')
            ->with('success', 'Qualification updated successfully.');
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return redirect()->route('qualifications.index')
            ->with('success', 'Qualification deleted successfully.');
    }
}
