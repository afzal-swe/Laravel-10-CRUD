<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        // $subcategory = DB::table('subcategories')->get();
        // $subcategory = DB::table('subcategories')->leftjoin('categories', 'subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();
        $subcategory = Subcategory::all();
        return view('admin.subcategory.index', compact('subcategory'));
    }
    public function create()
    {
        // $category = DB::table('categories')->get();

        $category = Category::all();
        return view('admin.subcategory.create', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories',
        ]);

        // SQL Insert Data

        // $subcategory = array(
        //     'category_id' => $request->category_id,
        //     'subcategory_name' => $request->subcategory_name,
        //     'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        // );
        // DB::table('subcategories')->insert($subcategory); // sql insert data

        // Model insert section //
        // Subcategory::insert([
        //     'category_id' => $request->category_id,
        //     'subcategory_name' => $request->subcategory_name,
        //     'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        // ]);


        // dd($request);

        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification = array('messege' => 'Successfully Uploaded!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        // $category = DB::table('categories')->get();
        // $subcategories = DB::table('subcategories')->where('id', $id)->first();

        $category = Category::all();
        $subcategories = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('category', 'subcategories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories',
        ]);
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        // $category->update([
        //     $category->name = $request->name,
        //     $category->slug = Str::of($request->name)->slug('-'),
        // ]);

        $notification = array('messege' => 'Successfully Update!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        // DB::table('subcategories')->where('id', $id)->delete();

        // $subcategory = Subcategory::find($id);
        // $subcategory->delete();

        Subcategory::destroy($id);

        $notification = array('messege' => 'Successfully Deleted!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
}
