<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Eventcategory;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function eventCreate()
    {
        $user = Auth::user();
        $category = Eventcategory::all();
        $place = Place::all();
        return view('event.create', compact('category','place', 'user'));
    }

    /**
     * Display a listing of the resource.
     */
    public function backTop()
    {
        $reserve = session('reserve');
        
        $user = Auth::user();
        // データベース内のすべてのEventを取得し、event変数に代入

        $events = Event::paginate(6);

        $start_daze = array();
        $end_daze = array();
        foreach( $events as $event ){
            $start_daze[] = date("Y年m月d日", strtotime($event->start_time));
            $end_daze[] = date("Y年m月d日", strtotime($event->end_time));
        }

        //　`Event`フォルダ内の`index`viewファイルに返す。
        // その際にview内で使用する変数を代入します。
        return view('top', compact('events', 'user', 'start_daze', 'end_daze', 'reserve'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event/create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ディレクトリ名
        $dir = "images";

        // アップロードされたファイル名を取得
        $filename = $request->file("image")->getClientOriginalName();
        $save_filename = date("YmdHis").$filename;

        // imagesディレクトリに取得したファイル名で画像を保存
        $request->file("image")->storeAs("public/" . $dir, $save_filename);


        // 新しいEventを作成
        $event = new Event;
        // dd($request);

        // 写真情報をDBに保存
        $event->img_name = $save_filename;
        $event->img_path = 'storage/'. $dir . '/' . $save_filename;


        // フォームから送られてきたデータをそれぞれ代入
        $event->name = $request->name;

        $event->hall_name = $request->hall_name;
        $event->category_name = $request->category_name;
        $event->place_name = $request->place_name;
        $event->location_details = $request->location_details;
        
        $event->price = $request->price;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->info = $request->info;
        //データベースに保存
        $event->save();
        // indexページに遷移
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $user = Auth::user();
        return view('event.show', compact('event', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $user = Auth::user();
        $category = Eventcategory::all();
        $place = Place::all();
        return view('event.edit', compact('event','category','place', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // ディレクトリ名
        $dir = "images";

        // 新しいEventを作成
        $event = Event::find($event->id);
        // dd($request);

        // アップロードされたファイル名を取得
        if(!is_null($request->file("image"))){
            $filename = $request->file("image")->getClientOriginalName();
            $save_filename = date("YmdHis").$filename;
            // imagesディレクトリに取得したファイル名で画像を保存
            $request->file("image")->storeAs("public/" . $dir, $save_filename);
            // 写真情報をDBに保存
            $event->img_name = $save_filename;
            $event->img_path = 'storage/'. $dir . '/' . $save_filename;
        }

        // フォームから送られてきたデータをそれぞれ代入
        $event->name = $request->name;
        
        $event->hall_name = $request->hall_name;
        $event->category_name = $request->category_id;
        $event->place_name = $request->place_id;
        $event->location_details = $request->location_details;
        
        $event->price = $request->price;
        
        if(!is_null($request->start_time)){
            $event->start_time = $request->start_time;
        }
        if(!is_null($request->end_time)){
            $event->end_time = $request->end_time;
        }

        
        $event->info = $request->info;
        //データベースに保存
        $event->save();
        // indexページに遷移
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/');
    }
}
