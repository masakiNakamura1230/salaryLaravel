<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function show(){

        $talents = Talent::all();

        return view('talents/list', [
            'talents' => $talents,
        ]);
    }
}
