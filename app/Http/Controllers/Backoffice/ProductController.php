<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('backoffice.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->group('product')->get()->toTree();

        return view('backoffice.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->all());

        // Remark
        foreach (array_get($request->all(), 'remarks') as $remark) {
            if ($remark) {
                $product->remarks()->create(['remark' => $remark]);
            }
        }

        // Video
        foreach (array_get($request->all(), 'videos') as $video) {
            if ($video) {
                $product->videos()->create(['video' => $video]);
            }
        }

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $product->addMedia($image)->toMediaCollection('product');
            }
        }

        return redirect()
                ->route('product.edit', ['product' => $product->id])
                ->with(['success' => 'Create product success']);
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
    public function edit(Product $product)
    {
        $categories = Category::active()->group('product')->get()->toTree();

        $product->load('remarks', 'videos', 'media');

        return view('backoffice.product.update', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        // Remark
        $product->remarks()->delete();
        foreach (array_get($request->all(), 'remarks') as $remark) {
            if ($remark) {
                $product->remarks()->create(['remark' => $remark]);
            }
        }

        // Video
        $product->videos()->delete();
        foreach (array_get($request->all(), 'videos') as $video) {
            if ($video) {
                $product->videos()->create(['video' => $video]);
            }
        }

        $remove_images = array_get($request->all(), 'remove_images', []);

        $product->getMedia('product')->filter(function($image) use ($remove_images) {
            return in_array($image->id, $remove_images);
        })->map(function($image) { $image->delete(); });

        // Image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $product->addMedia($image)->toMediaCollection('product');
            }
        }

        return redirect()
                ->route('product.edit', ['product' => $product->id])
                ->with(['success' => 'Update product success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
