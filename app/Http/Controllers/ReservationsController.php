<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EventsController;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::latest()->where('user_id', $user->id)->get();
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
        
        $calendar = Calendar::select('calendar_id')->where('reserve_id', '=', $id)->first();
        if (!empty($calendar)) {
            $calendar_id = $calendar->calendar_id;
        }
        Reservation::where('id',$id)->delete();
        if (empty($calendar_id)) {
            return redirect('/reservation');
        } else {
            return redirect()->route('delCalendar')->with(compact('calendar_id'));
        }

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

        $reserve_id = $reservation->id;
        $reserve = $event;

        return redirect()->route('top')->with(compact('reserve', 'reserve_id'));

        // $user = Auth::user();
        // // データベース内のすべてのEventを取得し、event変数に代入

        // $events = Event::paginate(6);

        // $start_daze = array();
        // $end_daze = array();
        // foreach( $events as $event ){
        //     $start_daze[] = date("Y年m月d日", strtotime($event->start_time));
        //     $end_daze[] = date("Y年m月d日", strtotime($event->end_time));
        // }

        // //　`Event`フォルダ内の`index`viewファイルに返す。
        // // その際にview内で使用する変数を代入します。
        // return view('top', compact('events', 'user', 'start_daze', 'end_daze', 'reserve'));
    }
}