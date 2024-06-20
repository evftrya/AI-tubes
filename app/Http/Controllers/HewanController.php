<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hewan;
use App\Http\Controllers\JenisHewanController;

class HewanController extends Controller
{
    public function index()
    {
        // $jenis = (JenisHewanController::class, 'all');
        // dd(Hewan::all());
        $jhk = new JenisHewanController();
        $jenis = $jhk->all();
        return view('tambahHewan',['jenis'=>$jenis]);
    }

    public function all(){
        $hewan = Hewan::all();
        return $hewan;
    }
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->garisx1);
        // Simpan hanya nama dan jarak dalam database
        $request->validate([
            'Hewan' => 'required'

        ]);
        // dd($request);
        $titik = new Hewan();
        $titik->namaHewan = $request->Hewan;
        // $titik->Jenis = $request->jenis;
        $titik->save();

        return redirect('/hewan');
    }
}
