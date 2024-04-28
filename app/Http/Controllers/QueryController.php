<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;

class QueryController extends Controller
{
    public function handleQuery(Request $request)
    {
        /* regex for validate multiple youtube URLs that can be inserted */
        $validated = $request->validate([
            'videoUrl' => ['required', 'url', 'regex:/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube(-nocookie)?\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|live\/|v\/)?)([\w\-]+)(\S+)?$/']
        ]);
        $videoUrl = $validated['videoUrl'];
        // Extraer la ID del video de la URL
        if (preg_match('/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube(-nocookie)?\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|live\/|v\/)?)([\w\-]+)(\S+)?$/', $videoUrl, $matches)) {
            $video_id = $matches[6];
        }
        if (Auth::check()) {
            $videoUrl = $request->input('videoUrl');
            $userId = Auth::id();
            Session::flash('status', 'Task was successful!');
            /* scripts execution */
            $scriptRoutineYoutube = base_path('app/Scripts/YoutubeCall.py');
            $scriptRoutineYoutubeTitle = base_path('app/Scripts/YoutubeCallTitle.py');
            $scriptRoutineChatGPT = base_path('app/Scripts/ChatGPTCall.py');
            try {
                $captionsMessage = shell_exec("python3 $scriptRoutineYoutube " . $video_id);
                $videoTitleMessage = shell_exec("python3 $scriptRoutineYoutubeTitle " . $video_id . " title");
                $summarizeMessage = shell_exec("python3 $scriptRoutineChatGPT \"" . $captionsMessage . "\"");
                Session::flash('captionsMessage', $summarizeMessage);
                // Creates a new register in table History. If it already exists, it doesnt create again
                \App\Models\History::firstOrCreate(
                    [
                        'url' => $videoUrl,
                        'user_id' => $userId
                    ],
                    [
                        'title' => $videoTitleMessage,
                        'description' => $summarizeMessage
                    ]
                );
            } catch (Exception $e) {
                Session::flash('status', "Youtube ID not found");
            }
        } else {
            Session::flash('status', "error: user not authenticated!");
        }
        return redirect()->route('welcome');
    }
}