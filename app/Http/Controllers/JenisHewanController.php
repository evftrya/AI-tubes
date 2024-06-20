<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenisHewan;

class JenisHewanController extends Controller
{
    public function all(){
        $all = JenisHewan::all();
        return $all;
    }
    public function index()
    {
        return view('tambahJenis');
    }
    public function store(Request $request)
    {
        
        // dd($request->garisx1);
        // Simpan hanya nama dan jarak dalam database
        // $request->validate([
        //     'jenis' => 'required',

        // ]);
        $titik = new jenisHewan();
        $titik->Jenis = $request->jenis;
        $titik->save();

        return redirect('/jenis');
    }
}
