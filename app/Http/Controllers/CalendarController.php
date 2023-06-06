<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function google_calendar(Request $request) {
        

        $event = new Event;
        $event->name = $request->event_name;
        $event->startDateTime = new Carbon($request->start_time);
        $event->endDateTime = new Carbon($request->end_time);
        $event->description = "イベント詳細\n".$request->info;
        $new_event = $event->save();

        $calendar = new Calendar;
        $calendar->reserve_id = $request->reserve_id;
        $calendar->calendar_id = $new_event->id;
        $calendar->save();

        return redirect('/');

    }

    public function del_google_calendar() {
        $calendar_id = session('calendar_id');

        Calendar::where('calendar_id',$calendar_id)->delete();

        // dd($calendar_id);

        Event::find($calendar_id)->delete();

        return redirect('/reservation');
    }
}
