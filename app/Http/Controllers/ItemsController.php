<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\{Item, ItemType};
use DB;


class ItemsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::with(['itemTypes', 'itemCategories'])->get();

        if($request->ajax())
        {
            return ItemResource::collection($items);
        }

    return view('staff.items.items');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:categories,name'],  'description' => ['required']
        ]);
        $category = Category::create([  'name' => $request->name,  
                                'description' => $request->description,  
                                'updated_at' => now(),
                                'created_at' => now()
                            ]);
    return response()->json(['success' => true, 'msg' => 'Category has been created successfully','category' => $category]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if($request->name){
            $request->validate([
             'name' => ['required'],
         ]);
        }elseif(($request->name)){
            $request->validate([
             'description' => ['required'],
         ]);
        }
        $category = Category::findorFail($id);
        $inputs = $request->except(['url', 'method', 'csrfToken']);
        $category->fill($inputs)->save();
    return response()->json(['success' => true,'msg' => 'Category has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorFail($id);
        $category->delete($id);
    return response()->json(['success' => true, 'msg' => 'Category has been deleted']);
    }
}
