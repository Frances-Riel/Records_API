<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{

    public function index(){
        return response()->json(Record::all());
    }

    // Assuming you have a Record model

    public function record(Request $request){

        $credentials = $request->only('name', 'age', 'address', 'gender');

        if (count(array_filter($credentials)) == count($credentials)) {
            // Insert data into the 'records' table
            Record::create($credentials);

            return response([
                'message' => 'Input Success'
            ]);
        } else {
            return response([
                'message' => 'Input Failed'
            ], 401);
        }
    }

}
