<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Game\CreateGameRequest;
use App\Http\Requests\Game\UpdateGameRequest;
use App\Http\Controllers\Controller;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::get();

        return view('backoffice.game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGameRequest $request)
    {
        $game = Game::create($request->all());

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $game->addMedia($image)->toMediaCollection('game');
            }
        }

        return redirect()
                ->route('game.edit', ['game' => $game->id])
                ->with(['success' => 'Create game success']);
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
    public function edit(Game $game)
    {
        $game->load('media');

        return view('backoffice.game.update', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->all());

        $remove_images = array_get($request->all(), 'remove_images', []);

        $game->getMedia('game')->filter(function($image) use ($remove_images) {
            return in_array($image->id, $remove_images);
        })->map(function($image) { $image->delete(); });

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $game->addMedia($image)->toMediaCollection('game');
            }
        }

        return redirect()
                ->route('game.edit', ['koi' => $game->id])
                ->with(['success' => 'Update game success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->clearMediaCollection('game');
        $game->delete();

        return;
    }
}
