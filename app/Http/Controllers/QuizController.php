<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\City;
use App\Models\District;
use App\Models\Postcode;

class QuizController extends Controller
{
    public function index()
    {
        $data['regions'] = Region::get();

        return view('quiz', $data);
    }

    public function fetchRegion(Request $request)
    {
        $data['cities'] = City::where("region_id", $request->region_id)
            ->get(["city_id", "city"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['districts'] = District::where("city_id", $request->city_id)
            ->get(["district_code", "district"]);                   
        return response()->json($data);
    }

    public function fetchDistrict(Request $request)
    {
        $data['postcodes'] = Postcode::where('district_code', $request->district_code)
            ->get(["entity_id", "postcode"]);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $formInput = $request->all();

        return response()->json(['message' => 'Your form was created successfully!']);
    }


}
