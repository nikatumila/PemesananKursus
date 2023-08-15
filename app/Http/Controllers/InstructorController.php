<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'instructorName' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'expYear' => 'required|integer',
            'expDesc' => 'nullable|string',
        ]);

        Instructor::create([
            'instructorName' => $request->instructorName,
            'age' => $request->age,
            'gender' => $request->gender,
            'expYear' => $request->expYear,
            'expDesc' => $request->expDesc,
        ]);

        return redirect()->route('instructors.index')
            ->with('success', 'Instruktur berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'instructorName' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'expYear' => 'required|integer',
            'expDesc' => 'nullable|string',
        ]);

        $instructor = Instructor::findOrFail($id);
        $instructor->update([
            'instructorName' => $request->instructorName,
            'age' => $request->age,
            'gender' => $request->gender,
            'expYear' => $request->expYear,
            'expDesc' => $request->expDesc,
        ]);

        return redirect()->route('instructors.index')
            ->with('success', 'Instruktur berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return redirect()->route('instructors.index')
            ->with('success', 'Instruktur berhasil dihapus.');
    }
}
