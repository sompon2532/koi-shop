<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Koi\CreateKoiRequest;
use App\Http\Requests\Koi\UpdateKoiRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Strain;
use App\Models\Farm;
use App\Models\Event;
use App\Models\Koi;
use App\User;

class KoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kois = Koi::all();

        return view('backoffice.koi.index', compact('kois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->group('koi')->get()->toTree();
        $events = Event::active()->get();
        $strains = Strain::active()->get();
        $farms = Farm::active()->get();
        $users = User::get();

        return view('backoffice.koi.create', compact('categories', 'strains', 'events', 'farms', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKoiRequest $request)
    {
        $koi = Koi::create($request->all());

        // Remark
        foreach (array_get($request->all(), 'remarks') as $remark) {
            if ($remark) {
                $koi->remarks()->create(['remark' => $remark]);
            }
        }

        // Size
        foreach (array_get($request->all(), 'sizes') as $size) {
            if ($size) {
                $koi->sizes()->create(['size' => $size]);
            }
        }

        // Contest
        foreach (array_get($request->all(), 'contests') as $contest) {
            if ($contest) {
                $koi->contests()->create(['contest' => $contest]);
            }
        }

        // Video
        foreach (array_get($request->all(), 'videos') as $video) {
            if ($video) {
                $koi->videos()->create(['video' => $video]);
            }
        }

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $koi->addMedia($image)->toMediaCollection('koi');
            }
        }

        return redirect()
                ->route('koi.edit', ['koi' => $koi->id])
                ->with(['success' => 'Create koi success']);
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
    public function edit(Koi $koi)
    {
        $koi->load(['remarks', 'contests', 'sizes', 'videos', 'media', 'user']);

        $categories = Category::active()->group('koi')->get()->toTree();
        $events = Event::active()->get();
        $strains = Strain::active()->get();
        $farms = Farm::active()->get();
        $users = User::get();

        return view('backoffice.koi.update', compact('koi', 'categories', 'events', 'strains', 'farms', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKoiRequest $request, Koi $koi)
    {
        $inputs = $request->all();

        if (! $request->has('certificate')) {
            $inputs['certificate'] = 0;
        }

        $koi->update($inputs);

        // Remark
        $koi->remarks()->delete();
        foreach (array_get($request->all(), 'remarks') as $remark) {
            if ($remark) {
                $koi->remarks()->create(['remark' => $remark]);
            }
        }

        // Size
        $koi->sizes()->delete();
        foreach (array_get($request->all(), 'sizes') as $size) {
            if ($size) {
                $koi->sizes()->create(['size' => $size]);
            }
        }

        // Contest
        $koi->contests()->delete();
        foreach (array_get($request->all(), 'contests') as $contest) {
            if ($contest) {
                $koi->contests()->create(['contest' => $contest]);
            }
        }

        // Video
        $koi->videos()->delete();
        foreach (array_get($request->all(), 'videos') as $video) {
            if ($video) {
                $koi->videos()->create(['video' => $video]);
            }
        }

        $remove_images = array_get($request->all(), 'remove_images', []);

        $koi->getMedia('koi')->filter(function($image) use ($remove_images) {
            return in_array($image->id, $remove_images);
        })->map(function($image) { $image->delete(); });

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $koi->addMedia($image)->toMediaCollection('koi');
            }
        }

        return redirect()
                ->route('koi.edit', ['koi' => $koi->id])
                ->with(['success' => 'Update koi success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koi $koi)
    {
        $koi->delete();

        return;
    }
}
