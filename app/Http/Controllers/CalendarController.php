<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function google_calendar(Request $request ) {

        
        $startTime = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $request->start_time,
        );

        $endTime = Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $request->end_time,
        );
        
        $event = new Event;
        $event->name = $request->event_name;
        $event->startDateTime = $startTime;
        $event->endDateTime = $endTime;
        $event->description = "イベント詳細\n".$request->info;
        $new_event = $event->save();

        $calendar = new calendar;
        $calendar->calendar_id = $new_event->id;

        return redirect('/');

    }
}
