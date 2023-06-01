<?php

namespace App\Http\Controllers;

use App\Models\Peo;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeoController extends Controller
{
    public function index()
    {
        $peos = Peo::all();
        return view('peo.index', compact('peos'));
    }

    public function create($program_id)
{
    $programs = Program::all();

    return view('peo.create', ['program_id' => $program_id, 'programs']);
}

public function store(Request $request)
    {
        $validatedData = $request->validate([
            'peo_id' => 'required|integer',
            'peo_description' => 'required|string',
            'program_id' => 'required|string',
            'schema_id' => 'required|string',
        ]);

        $query = "INSERT INTO peo (peo_id, peo_description, program_id, schema_id) VALUES (:peo_id, :peo_description, :program_id, :schema_id)";
        DB::insert($query, [
            'peo_id' => $validatedData['peo_id'],
            'peo_description' => $validatedData['peo_description'],
            'program_id' => $validatedData['program_id'],
            'schema_id' => $validatedData['schema_id'],
        ]);

        return redirect()->route('peo.index')->with('success', 'PEO created successfully.');
    }

    public function edit($peo_id)
    {


        return view('peo.edit')->with('peo_id', $peo_id);
    }

    public function update($peo_id, Request $request)
    {
        // Validate the request data if needed
        $request->validate([
            'peo_description' => 'required|string',
            'schema_id' => 'required|string',
        ]);

        // Update the peo_description in the peo table
        DB::table('peo')
            ->where('peo_id', $peo_id)
            ->update([
                'peo_description' => $request->input('peo_description'),
                'schema_id' => $request->input('schema_id'),
            ]);

        // Redirect or return a response as needed
        return redirect()->route('peo.index')->with('success', 'PEO description updated successfully.');
    }

    public function destroy($peo_id)
{
    Peo::destroy($peo_id);

    return redirect()->route('peo.index')->with('success', 'PEO deleted successfully.');
}

}
