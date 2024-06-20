<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZooLocation;


class GrapfController extends Controller
{
    public function findShortestRoute(Request $request)
    {
        // Ambil titik asal dan tujuan dari request
        $source = $request->input('source');
        $destination = $request->input('destination');

        // Dapatkan semua lokasi kebun binatang dari database
        $locations = ZooLocation::all();

        // Lakukan logika Dijkstra untuk menemukan rute terpendek

        // Return rute terpendek
    }
}
