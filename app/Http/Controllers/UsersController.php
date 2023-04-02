<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Event;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $reservations = Reservation::where('user_id', $user->id)->get();
        // dd($reservations);

        $events = array();
        foreach( $reservations as $reservation ){
            $events[] = Event::find($reservation->event_id);
        }

        $array = [
            $reservations, $events
        ];
        
        return view('reservation.index', compact('user','reservations', 'events', 'array'));
    }

}
