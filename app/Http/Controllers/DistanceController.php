<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distance;

class DistanceController extends Controller
{
    public function index()
    {
        return view('calculate_distance');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $distance_cm = $this->calculateDistance($request->input('points'));

        Distance::create([
            'name' => $name,
            'distance_cm' => $distance_cm,
        ]);

        return redirect('/calculate-distance')->with('success', 'Distance calculated and saved successfully.');
    }

    private function calculateDistance($points)
    {
        // Implement your distance calculation logic here
        // For simplicity, let's assume points are in a format like [[x1, y1], [x2, y2], ...]
        $total_distance = 0;
        $num_points = count($points);
        for ($i = 0; $i < $num_points - 1; $i++) {
            $x1 = $points[$i][0];
            $y1 = $points[$i][1];
            $x2 = $points[$i + 1][0];
            $y2 = $points[$i + 1][1];
            $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
            $total_distance += $distance;
        }

        return $total_distance; // Distance in cm
    }
}
