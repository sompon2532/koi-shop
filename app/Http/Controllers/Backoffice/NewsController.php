<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();

        return view('backoffice.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $start_datetime = $request->start_date . ' ' . $request->start_time;
        $end_datetime = $request->end_date . ' ' . $request->end_time;

        $input = $request->all();

        $input['start_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $start_datetime);
        $input['end_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $end_datetime);

        $news = News::create($input);

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $news->addMedia($image)->toMediaCollection('news');
            }
        }

        // Cover
        if ($request->hasFile('cover')) {
            $news->addMedia($request->file('cover'))->toMediaCollection('news-cover');
        }

        // Video
        foreach (array_get($request->all(), 'videos') as $video) {
            if ($video) {
                $news->videos()->create(['video' => $video]);
            }
        }

        return redirect()
            ->route('news.edit', ['news' => $news->id])
            ->with(['success' => 'Create news success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $news->load('media');

        return view('backoffice.news.update', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $start_datetime = $request->start_date . ' ' . $request->start_time;
        $end_datetime = $request->end_date . ' ' . $request->end_time;

        $input = $request->all();

        if (! $request->has('config')) {
            $input['config'] = 0;
        }

        $input['start_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $start_datetime);
        $input['end_datetime'] = Carbon::createFromFormat('d/m/Y H:i', $end_datetime);

        $news->update($input);

        $remove_images = array_get($request->all(), 'remove_images', []);

        $news->getMedia('news')->filter(function($image) use ($remove_images) {
            return in_array($image->id, $remove_images);
        })->map(function($image) { $image->delete(); });

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $news->addMedia($image)->toMediaCollection('news');
            }
        }

        // Cover
        if ($request->hasFile('cover')) {
            $news->clearMediaCollection('news-cover');
            $news->addMedia($request->file('cover'))->toMediaCollection('news-cover');
        }

        // Video
        $news->videos()->delete();
        foreach (array_get($request->all(), 'videos') as $video) {
            if ($video) {
                $news->videos()->create(['video' => $video]);
            }
        }

        return redirect()
            ->route('news.edit', ['news' => $news->id])
            ->with(['success' => 'Update news success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->clearMediaCollection('news');
        $news->clearMediaCollection('news-cover');
        $news->delete();

        return;
    }
}
