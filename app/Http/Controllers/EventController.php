<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function index()
    {
        $events = DB::table('events')->get();

        $events = Event::orderBy('created_at', 'desc')->paginate(5);


        return view('index', ['events' => $events]);
    }

    public function create()
    {
        $users = User::all();
        return view('create', compact('users'));
    }

    public function show($id)
    {
        /* eloquent */

        $event = Event::with("attendees")->findOrFail($id);

        /* $event = Event::find($id); */
        return view('show', compact('event'));
    }

    /* public function edit($id)
    {
        $event = Event::find($id);
        $users = User::all();
        return view('edit', compact('event', 'users'));
    } */

    public function edit($id)
    {
        $event = Event::with("attendees")->findOrFail($id);
        $users = User::all();
        return view('edit', ['event' => $event, 'users' => $users]);
    }
    public function store(Request $request)
    {
        /* UserEventsAttendee::where("event_id", $id)->delete(); */

        $user = $request->user();
        $event = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->user_id = $user->id;
        $event->date = $request->date;

        $event->save();

        if ($request->has('users')) {
            $event->attendees()->sync($request->users);
        }

        return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {

        UserEventsAttendee::where("event_id", $id)->delete();

        $user = $request->user();
        $event = Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->user_id = $user->id;
        $event->date = $request->date;

        $event->save();

        $users = $request->input('attendees', []);

        if ($users) {
            $event->attendees()->sync($users);
        }

        return redirect()->route('index', $event->id);
    }



    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->attendees()->detach();

        $event->delete();

        return redirect()->route('index')->with('success', 'Evento eliminado correctamente');
    }
}
