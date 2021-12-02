<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryLanguage;
use App\Models\Language;
use App\Models\Property;
use App\Models\PropertyLanguage;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $categories = Category::all();

        foreach ($categories as $category) {
            $data[] = array(
                'id' => $category->id,
                'lang' => $category->get_data()
            );
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //        $upload = new Upload($request);
        $id = Str::uuid()->toString();
        $upload = "test";
        $category = new Category();
        $category->id = $id;
        $category->image = $upload;
        $category->save();

        $languages = new Language();

        foreach ($request->category as $key => $value) {
            $categorylanguage = new CategoryLanguage();
            $categorylanguage->id = Str::uuid()->toString();
            $categorylanguage->category_id = $id;
            $categorylanguage->lang_id = $key;
            $categorylanguage->slug = Str::slug($value);
            $categorylanguage->title = $value;
            $categorylanguage->save();
        }

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::all();
        return response()->json($category, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
        $data['categorylanguage'] = CategoryLanguage::where('category_id',$id)->get();
        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //        $upload = new Upload($request);
        $upload = "test";
        $category = Category::find($request->category_id);
        $category->image = $upload;
        $category->save();


        $languages = new Language();
        CategoryLanguage::where('category_id', $request->category_id)->delete();
        $i = 0;
        foreach ($request->category as $key => $value) {
            $categorylanguage = new CategoryLanguage();
            $categorylanguage->id = Str::uuid()->toString();
            $categorylanguage->category_id = $request->category_id;
            $categorylanguage->lang_id = $key;
            $categorylanguage->slug = Str::slug($value);
            $categorylanguage->title = $value;
            $categorylanguage->save();
            $i++;
        }

        return response()->json($category, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json("Başarılı", 200);

    }
}
