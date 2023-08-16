<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuitarController extends Controller
{
    public function index()
    {
        $guitars = Guitar::all(); //returns all the data

        if ($guitars->count() > 0) {
            $data = [
                'status' => 200,
                'guitars' => $guitars
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'guitars' => "No response"],
                404
            ); //same format as above

        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'manufacturer' => 'required|string|max:191',
            'number_of_strings' => 'required|integer|max:191',
            'type' => 'required|string|max:191',
            'model' => 'required|string|max:191',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422); //422 means input error
        } else { //if validation is ok then create a new guitar instance with data from request
            $guitar = Guitar::create([
                'manufacturer' => $request->manufacturer,
                'number_of_strings' => $request->number_of_strings,
                'type' => $request->type,
                'model' => $request->model,

            ]);

            if ($guitar) {
                return response()->json(['message' => 'Guitar created successfully'], 200);
            } else {
                return response()->json(['message' => 'Guitar not created!'], 500);
            }
        }
    }

    public function show($id)
    {
        $guitar = Guitar::find($id);
        if ($guitar) {
            return response()->json([$guitar], 200); //return the guitar object in json format and status code of 200
        } else {
            return response()->json(['message' => 'Guitar not found!'], 500);
        }
    }
}
