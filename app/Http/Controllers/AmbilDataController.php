<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmbilDataController extends Controller
{
    public function index()
    {
        $response = Http::get('https://vpic.nhtsa.dot.gov/api/vehicles/getallmanufacturers?format=json');
        $result = json_decode($response);
        return view('index')->with('result', $result);
    }
}
