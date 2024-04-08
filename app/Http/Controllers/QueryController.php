<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
    public function handleQuery(Request $request)
    {
        if (Auth::check()) {
            $videoUrl = $request->input('videoUrl');
            $userId = Auth::id();

            if (empty($videoUrl)) {
                return response()->json([
                    'message' => 'Video URL is required'
                ], 400);
            } else {
                return response()->json([
                    'message' => 'Query handled successfully',
                    'videoUrl' => $videoUrl
                ]);
            }
        } else {
            return response()->json([
                'message' => 'You must be logged in to perform this action'
            ], 401);
        }
    }
}