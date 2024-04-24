<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function videos(Request $request)
    {
        $videos = \App\Models\History::where('user_id', $request->userid)->get();
        return response()->json($videos);
    }
}