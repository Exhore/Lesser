<?php

/* Controlador para las subscripciones a la newsletter */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* modelo para los registros de email para newsletter */
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions, email'
        ]);

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();

        return response()->json([
            'message' => 'Gracias por suscribirte a nuestra newsletter!'
        ], 200);
    }
}
