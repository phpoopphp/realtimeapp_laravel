<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['only' => ['store','update','destroys']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->get();
        return CategoryResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category=new Category();
        $category->name=$request->get('name');
        $category->slug=str_slug($request->get('name'));
        $category->save();
        return response()->json(['message'=>'Category created',Response::HTTP_CREATED]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }


    public function update(Request $request, Category $category)
    {

        $category->name=$request->get('name');
        $category->slug=str_slug($request->get('name'));
        $category->save();
        return response()->json(['message'=>'Category Updated',Response::HTTP_ACCEPTED]);
    }


    public function destroy(Category $category)
    {
        $category->questions()->delete();
        $category->delete();
        return \response()->json(['message'=>'Category deleted'],202);
    }
}
