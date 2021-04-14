<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();

        return view('shop.admin.categories.categories-list', ['categories' => $categories]);
    }

    //Lista todas as categorias
    public function list(){
        $categories = DB::table('categories')->get();

        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.categories.categories-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ]);

        if($validator->fails()){
            return redirect()->route('categories.create')->withErrors($validator)->withInput();
        }

        DB::table('categories')->insert([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', '=', $id)->first();

        return view('shop.admin.categories.categories-edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
        ]);

        if($validator->fails()){
            return redirect()->route('categories.edit', $category->id)->withErrors($validator)->withInput();
        }

        DB::table('categories')->where('id', $category->id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        DB::table('categories')->delete($categories->id);

        return redirect()->route('categories.index');
    }
}
