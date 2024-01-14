<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index()
    {
        return view('record');
        //$records = Record::all();
        //return response($records);
    }
}
