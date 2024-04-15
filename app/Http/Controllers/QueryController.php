<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;
use Inertia\Inertia; // Asegúrate de importar Inertia

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
            $scriptRoutine = base_path('app/Scripts/YoutubeCall.py');
            try {
                $captionsMessage = shell_exec("python3 $scriptRoutine " . $video_id);
                Session::flash('captionsMessage', $captionsMessage);
                // Crear un nuevo registro en la tabla 'history'
                \App\Models\History::create([
                    'user_id' => $userId,
                    'title' => 'Some title', // Reemplaza esto con el título que desees
                    'description' => $captionsMessage,
                    'url' => $videoUrl
                ]);
            } catch (Exception $e) {
                Session::flash('status', "Youtube ID not found");
            }
        } else {
            Session::flash('status', "error: user not authenticated!");
        }
        return redirect()->route('welcome');
        // Retorna la vista con los props
        /*         return Inertia::render('Welcome', [
            'captionsMessage' => Session::get('captionsMessage'),
        ]); */
    }
}