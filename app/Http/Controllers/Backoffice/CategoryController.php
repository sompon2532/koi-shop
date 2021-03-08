<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get()->toTree();

        return view('backoffice.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->toTree();

        return view('backoffice.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->all());
        // dd($category);
        // Cover
        if ($request->hasFile('cover')) {
            $category->addMedia($request->file('cover'))->toMediaCollection('category');
        }

        // dd(array_get($request->all(), 'videos'));
        // Video
        foreach (array_get($request->all(), 'videos') as $index => $video) {
            if ($video) {
                // dd($video);
                $category->videos()->create([
                    'video' => $video,
                    'date' => $request->get('date_videos')[$index] ? Carbon::createFromFormat('d/m/Y', $request->get('date_videos')[$index]) : null
                ]);
            }
        }

        return redirect()
                ->route('category.edit', ['category' => $category->id])
                ->with(['success' => 'Create category success']);
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
    public function edit(Category $category)
    {
        $category->load('media');
        $categories = Category::get()->toTree();

        return view('backoffice.category.update', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        // Cover
        if ($request->hasFile('cover')) {
            $category->clearMediaCollection('category');
            $category->addMedia($request->file('cover'))->toMediaCollection('category');
        }

        return redirect()
                ->route('category.edit', ['category' => $category->id])
                ->with(['success' => 'Update category success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return;
    }
}
