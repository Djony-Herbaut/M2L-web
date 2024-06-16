<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('events.event', ['events'=>Event::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'cover' => 'required|image'
        ]);

        $nouveau_poste = new Event;
        $nouveau_poste->title = $request->title;
        $nouveau_poste->description = $request -> description;
        $nouveau_poste->cover = $request->cover->store('images', 'public');

        $nouveau_poste->save();

        return view ('events.store',);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', [
            'event'=> $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'cover' => 'nullable|image'
        ]);

        $event->title = $request->title;
        $event->description = $request->description;
        
        if ($request->hasFile('cover')) {
            $event->cover = $request->cover->store('images', 'public');
        }

        $event->save();

        return redirect()->route('events.show', $event)->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.event')->with('success', 'Event deleted successfully.');
    }
}
