<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index() {

        return view('station.index');

    }

    public function list(Request $request)
    {
        if($request->filled('keyword')) {

            return Station::where('name', 'LIKE', '%'. $request->keyword .'%')
                ->take(5)
                ->get()
                ->map(function($station){ // leaflet-search 用にデータを加工する

                    return [
                        'loc' => [
                            $station->latitude,
                            $station->longitude
                        ],
                        'title' => $station->name
                    ];

                });

        }

        return [];
    }
}