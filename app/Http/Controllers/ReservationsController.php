<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        if(is_null($user->id)){
            return redirect('/');
        }
        $event = Event::find($request->event_id);
        return view('reservation.create', compact('user', 'event'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reservation::where('id',$id)->delete();
        return redirect('/reservation');
    }

    /**
     * credit cards move + event_id & user_id
     */
    public function purchaseGet (Request $request) {
        $user = Auth::user();
        $event = Event::find($request->event_id);
        
        return view('back.purchase', compact('user', 'event'));
    }

    public function purchasePost (Request $request) {
        
        $event = Event::find($request->event_id);

        // クレジットカード処理
        $request->user()->charge(
            $event->price, $request->paymentMethodId
        );


        $reservation = new RESERVATION;

        $reservation->user_id = $request->user_id;
        $reservation->event_id = $request->event_id;
        //データベースに保存
        $reservation->save();

        return redirect('/');
    }
}
