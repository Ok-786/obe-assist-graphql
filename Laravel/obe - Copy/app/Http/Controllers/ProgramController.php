<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'program_id' => 'required|integer',
            'program_name' => 'required|string|max:255',
        ]);

        $query = "INSERT INTO program (program_id, program_name) VALUES (:program_id, :program_name)";
        DB::insert($query, [
            'program_id' => $validatedData['program_id'],
            'program_name' => $validatedData['program_name'],
        ]);

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit($program_id)
    {
        $program = DB::selectOne('SELECT * FROM program WHERE program_id = ?', [$program_id]);

        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $program_id)
{
    $validatedData = $request->validate([
        'program_id' => 'required',
        'program_name' => 'required',
    ]);

    $query = "UPDATE program SET program_name = :program_name WHERE program_id = :program_id";
    DB::update($query, [
        'program_id' => $program_id,
        'program_name' => $validatedData['program_name'],
    ]);

    return redirect()->route('programs.index')
                     ->with('success', 'Program updated successfully');
}

public function delete($program_id)
{
    // Find the program to delete
    $program = DB::table('program')->where('program_id', $program_id)->first();

    // If program does not exist, return error response
    if (!$program) {
        return redirect()->back()->with('error', 'Program not found.');
    }

    // Delete the program
    DB::table('program')->where('program_id', $program_id)->delete();

    // Redirect back to programs index page with success message
    return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
}

public function destroy($id)
{
    $program = DB::table('program')->where('program_id', $id)->first();

    if (!$program) {
        abort(404);
    }

    DB::table('program')->where('program_id', $id)->delete();

    return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
}



}
