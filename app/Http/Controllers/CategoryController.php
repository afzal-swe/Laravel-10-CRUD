<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = DB::table('categories')->get(); // SQL command
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        // SQL Insert Data

        // $category = array(
        //     'name' => $request->name,
        //     'slug' => Str::of($request->name)->slug('-'),
        // );
        // DB::table('categories')->insert($category); // sql insert data

        // Model insert section //
        // Category::insert([
        //     'name' => $request->name,
        //     'slug' => Str::of($request->name)->slug('-'),
        //]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->save();

        $notification = array('messege' => 'Successfully Uploaded!', 'alert-type' => "success");
        return redirect()->back()->with($notification);

        // return redirect()->back()->with('success', 'successfully inserted!');
    }
    public function edit($id)
    {
        // $edit = DB::table('categories')->where('id', $id)->first();
        $edit = Category::find($id);
        return view('admin.category.edit', compact('edit'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->save();

        // $category->update([
        //     $category->name = $request->name,
        //     $category->slug = Str::of($request->name)->slug('-'),
        // ]);

        $notification = array('messege' => 'Successfully Update!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        // DB::table('categories')->where('id', $id)->delete();

        // $category = Category::find($id);
        // $category->delete();

        Category::destroy($id);

        $notification = array('messege' => 'Successfully Deleted!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
}
