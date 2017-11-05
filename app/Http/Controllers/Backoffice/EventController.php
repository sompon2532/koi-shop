<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();

        return view('backoffice.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $start_datetime = $request->start_date . ' ' . $request->start_time;
        $end_datetime = $request->end_date . ' ' . $request->end_time;

        $input = $request->all();

        dd($input);

        if (! $request->has('config')) {
            $input['config'] = 0;
        }

        $input['start_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $start_datetime);
        $input['end_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $end_datetime);

        $event = Event::create($input);

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $event->addMedia($image)->toMediaCollection('event');
            }
        }

        // Cover
        if ($request->hasFile('cover')) {
            $event->addMedia($request->file('cover'))->toMediaCollection('event-cover');
        }

        return redirect()
                ->route('event.edit', ['event' => $event->id])
                ->with(['success' => 'Create event success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event->load('media', 'kois.media');

        return view('backoffice.event.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event->load('media');

        return view('backoffice.event.update', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $start_datetime = $request->start_date . ' ' . $request->start_time;
        $end_datetime = $request->end_date . ' ' . $request->end_time;

        $input = $request->all();

        if (! $request->has('config')) {
            $input['config'] = 0;
        }

        $input['start_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $start_datetime);
        $input['end_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $end_datetime);

        $event->update($input);

        $remove_images = array_get($request->all(), 'remove_images', []);

        $event->getMedia('event')->filter(function($image) use ($remove_images) {
            return in_array($image->id, $remove_images);
        })->map(function($image) { $image->delete(); });

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $event->addMedia($image)->toMediaCollection('event');
            }
        }

        // Cover
        if ($request->hasFile('cover')) {
            $event->clearMediaCollection('event-cover');
            $event->addMedia($request->file('cover'))->toMediaCollection('event-cover');
        }

        return redirect()
                ->route('event.edit', ['event' => $event->id])
                ->with(['success' => 'Update event success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->clearMediaCollection('event');
        $event->clearMediaCollection('event-cover');
        $event->delete();

        return;
    }
}
