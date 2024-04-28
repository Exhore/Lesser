<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CrudController extends Controller
{
    public function videos(Request $request)
    {
        $videos = \App\Models\History::where('user_id', $request->userid)->get();
        return response()->json($videos);
    }

    public function deleteVideo($id)
    {
        $video = \App\Models\History::find($id);

        if ($video) {
            $video->delete();
            return Session::flash('status', 'Video deleted successfully');
        } else {
            return Session::flash('status', 'Video not found');
        }
    }
}