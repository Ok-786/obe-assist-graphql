<?php

namespace App\Http\Controllers;

use App\Models\Clo;
use App\Models\Peo;
use App\Models\Mapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MappingController extends Controller
{
    public function index(){
        $mappings = Mapping::all();
        $clos = Clo::all();
        $peos = Peo::all();
        return view('mapping.index', compact('mappings'));
    }

    public function create(){
        $clos = Clo::all();
        $peos = Peo::all();
        return view('mapping.create', compact('clos', 'peos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'peo_id' => 'required|integer',
            'clo_id' => 'required|integer',
        ]);
        $table = 'peo-clo-Relation';
        $query = 'INSERT INTO "peo-clo-Relation" (peo_id, clo_id) VALUES (:peo_id, :clo_id)';
        DB::insert($query, [
            'peo_id' => $validatedData['peo_id'],
            'clo_id' => $validatedData['clo_id'],
        ]);

        return redirect()->route('mapping.index')->with('success', 'Program created successfully.');
    }
}
